<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\FacilityCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    /**
     * Menampilkan daftar laporan dengan filter, search, dan pagination
     */
    public function index(Request $request)
    {
        // Query dasar dengan eager loading relasi (mencegah N+1 problem)
        $query = Report::query()->latest();

        // Cek apakah relasi ke FacilityCategory sudah ada (fallback untuk struktur lama)
        if (Schema::hasColumn('reports', 'facility_category_id')) {
            $query->with(['category']);
        }

        // 1. Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 2. Filter berdasarkan kategori (jika kolom baru ada)
        if ($request->filled('category') && Schema::hasColumn('reports', 'facility_category_id')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        // 3. Search berdasarkan judul, deskripsi, lokasi, atau nama pelapor
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location_rtrw', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($uq) use ($search) {
                      $uq->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // 4. Sorting (default: terbaru)
        if ($request->filled('sort')) {
            if ($request->sort === 'oldest') {
                $query->oldest();
            }
        }

        $reports = $query->paginate(10)->appends($request->query());

        // Ambil semua kategori untuk filter dropdown (jika tabel ada)
        $categories = \Illuminate\Support\Facades\Schema::hasTable('facility_categories') 
            ? \App\Models\FacilityCategory::orderBy('name')->get() 
            : collect(); 

        return view('admin.reports.index', compact('reports', 'categories'));
    }

    /**
     * Update status laporan (dengan audit trail sederhana)
     */
    public function updateStatus(Request $request, Report $report)
    {
        // Validasi input
        $validated = $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai',
            'admin_notes' => 'nullable|string|max:500',
        ]);

        // Simpan status lama untuk audit trail
        $oldStatus = $report->status;
        $newStatus = $validated['status'];

        // Update laporan
        $report->update([
            'status' => $newStatus,
            'admin_notes' => $validated['admin_notes'] ?? $report->admin_notes,
        ]);

        // Log aktivitas (bisa dikembangkan ke tabel activity_logs nanti)
        Log::info('Status laporan diubah', [
            'report_id' => $report->id,
            'admin_id' => Auth::id(),
            'admin_name' => Auth::user()->name,
            'old_status' => $oldStatus,
            'new_status' => $newStatus,
            'timestamp' => now(),
        ]);

        // Pesan sukses yang dinamis
        $statusLabel = [
            'menunggu' => 'Menunggu',
            'diproses' => 'Diproses',
            'selesai' => 'Selesai',
        ];

        return redirect()->back()->with('success', 
            "Status laporan #{$report->id} berhasil diubah menjadi <strong>{$statusLabel[$newStatus]}</strong>."
        );
    }

    /**
     * Detail laporan (opsional - untuk modal atau halaman terpisah)
     */
    public function show(Report $report)
    {
        $report->load(['user', 'category']);
        return view('admin.reports.show', compact('report'));
    }

    /**
     * Hapus laporan (hanya untuk admin)
     */
    public function destroy(Report $report)
    {
        // Hapus foto dari storage jika ada
        if ($report->photo && Storage::disk('public')->exists($report->photo)) {
            Storage::disk('public')->delete($report->photo);
        }

        $report->delete();

        // Log aktivitas
        Log::info('Laporan dihapus', [
            'report_id' => $report->id,
            'admin_id' => Auth::id(),
            'timestamp' => now(),
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
    }
}