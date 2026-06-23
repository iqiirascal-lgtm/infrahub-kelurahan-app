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
    $request->validate(['status' => 'required|in:menunggu,diproses,selesai']);
    
    $oldStatus = $report->status;
    $newStatus = $request->status;
    
    $report->update(['status' => $newStatus]);

    // Pesan yang berbeda untuk setiap status
    $messages = [
        'menunggu' => [
            'title' => 'Laporan Dikembalikan ke Status Menunggu',
            'message' => "Laporan #{$report->id} telah dikembalikan ke status menunggu untuk diverifikasi ulang."
        ],
        'diproses' => [
            'title' => 'Laporan Sedang Diproses',
            'message' => "Laporan #{$report->id} sedang ditangani oleh tim terkait."
        ],
        'selesai' => [
            'title' => 'Laporan Telah Selesai',
            'message' => "Laporan #{$report->id} telah selesai ditangani. Masalah telah diatasi."
        ]
    ];

    $statusMessage = $messages[$newStatus];

    return redirect()->back()->with([
        'success' => $statusMessage['message'],
        'status_title' => $statusMessage['title']
    ]);
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