<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // 1. Menampilkan daftar laporan dengan filter status
    public function index(Request $request)
    {
        $query = Report::query()->latest();

        // Filter berdasarkan status jika ada input
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $reports = $query->paginate(10);
        return view('admin.reports.index', compact('reports'));
    }

    // 2. Update Status Laporan
    public function updateStatus(Request $request, Report $report)
    {
        $request->validate(['status' => 'required|in:menunggu,diproses,selesai']);
        
        $report->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui!');
    }
}