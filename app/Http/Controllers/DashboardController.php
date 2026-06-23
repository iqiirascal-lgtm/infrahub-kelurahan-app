<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\FacilityCategory; // ✅ TAMBAHKAN INI!
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Dashboard utama - redirect berdasarkan role
     */
    public function index()
    {
        $user = Auth::user();

        // Jika Admin, redirect ke adminDashboard
        if ($user->role === 'admin') {
            return $this->adminDashboard();
        }

        // Jika Warga
        $reports = Report::where('user_id', auth()->id())
            ->with('category')
            ->latest()
            ->get();
            
        return view('dashboard-warga', compact('reports'));
    }

    /**
     * Dashboard khusus Admin
     */
    public function adminDashboard()
    {
        $reports = Report::with(['user', 'category'])->latest()->get();
        
        $stats = [
            'total' => $reports->count(),
            'menunggu' => $reports->where('status', 'menunggu')->count(),
            'diproses' => $reports->where('status', 'diproses')->count(),
            'selesai' => $reports->where('status', 'selesai')->count(),
        ];

        $recentReports = $reports->take(5);

        return view('dashboard-admin', compact('stats', 'recentReports', 'reports'));
    }

    /**
     * Simpan laporan baru
     */
    public function storeReport(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'category' => 'required|string',
                'location_rtrw' => 'required|string|max:100',
                'description' => 'required|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Cari category by name
            $category = FacilityCategory::where('name', $validated['category'])->first();
            
            if (!$category) {
                return back()->withErrors(['category' => 'Kategori tidak ditemukan.'])->withInput();
            }

            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('reports', 'public');
            }

            Report::create([
                'user_id' => auth()->id(),
                'facility_category_id' => $category->id,
                'title' => $validated['title'],
                'description' => $validated['description'],
                'location_rtrw' => $validated['location_rtrw'],
                'photo' => $photoPath,
                'status' => 'menunggu',
                'upvotes_count' => 0,
            ]);

            return redirect()->route('dashboard')->with('success', 'Laporan berhasil dikirim! Tim kami akan segera menindaklanjuti.');
            
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Update status laporan
     */
    public function updateStatus(Request $request, Report $report)
    {
        $request->validate(['status' => 'required|in:menunggu,diproses,selesai']);
        $report->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui!');
    }

    /**
     * Upvote laporan
     */
    public function upvote(Report $report)
    {
        $report->increment('upvotes_count');
        return redirect()->back()->with('success', 'Terima kasih atas dukungan Anda!');
    }

    /**
     * Mark all notifications as read
     */
    public function markAllRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return back()->with('success', 'Semua notifikasi telah ditandai sebagai dibaca.');
    }

    /**
     * Manage reports (untuk admin)
     */
    public function manageReports()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard');
        }

        $reports = Report::with(['user', 'category'])->latest()->paginate(10);
        $categories = FacilityCategory::orderBy('name')->get();
        
        return view('admin.reports.index', compact('reports', 'categories'));
    }
}