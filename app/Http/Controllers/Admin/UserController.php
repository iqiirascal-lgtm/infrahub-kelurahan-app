<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;  
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    /**
     * Menampilkan daftar warga
     */
    public function index(Request $request)
    {
        $query = User::where('role', 'warga')->latest();

        // Search berdasarkan nama atau email
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $users = $query->paginate(10)->withQueryString();

        // Statistik
        $stats = [
            'total' => User::where('role', 'warga')->count(),
            'active' => User::where('role', 'warga')->where('is_active', true)->count(),
            'inactive' => User::where('role', 'warga')->where('is_active', false)->count(),
            'new_this_month' => User::where('role', 'warga')
                ->whereMonth('created_at', now()->month)
                ->count(),
        ];

        return view('admin.users.index', compact('users', 'stats'));
    }

    /**
     * Detail profil warga
     */
    public function show(User $user)
    {
        if ($user->role !== 'warga') {
            abort(404);
        }

        $user->load(['reports' => function ($query) {
            $query->latest()->take(10);
        }]);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Update status akun warga (aktif/non-aktif)
     */
    public function toggleStatus(User $user)
    {
        if ($user->role !== 'warga') {
            return redirect()->back()->with('error', 'User bukan warga.');
        }

        $user->is_active = !$user->is_active;
        $user->save();

        $status = $user->is_active ? 'diaktifkan' : 'dinonaktifkan';
        
        Log::info('Status akun warga diubah', [
            'user_id' => $user->id,
            'user_name' => $user->name,
            'admin_id' => auth()->id(),
            'new_status' => $user->is_active,
            'timestamp' => now(),
        ]);

        return redirect()->back()->with('success', "Akun warga berhasil {$status}.");
    }

    /**
     * Hapus akun warga
     */
    public function destroy(User $user)
    {
        if ($user->role !== 'warga') {
            return redirect()->back()->with('error', 'User bukan warga.');
        }

        // Check jika ada laporan, soft delete saja
        if ($user->reports()->count() > 0) {
            // Soft delete - set non-aktif dan hapus data sensitif
            $user->update([
                'is_active' => false,
                'phone' => null,
                'address' => null,
            ]);
            
            return redirect()->back()->with('warning', 'Akun dinonaktifkan dan data sensitif dihapus karena memiliki riwayat laporan.');
        }

        $user->delete();

        Log::info('Akun warga dihapus', [
            'user_id' => $user->id,
            'admin_id' => auth()->id(),
            'timestamp' => now(),
        ]);

        return redirect()->back()->with('success', 'Akun warga berhasil dihapus.');
    }
}