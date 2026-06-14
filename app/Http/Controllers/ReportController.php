<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Notifications\ReportStatusUpdated;

class ReportController extends Controller
{
    public function updateStatus(Request $request, $id)
    {
        // 1. Cari data laporan
        $report = Report::findOrFail($id);

        // 2. Update status
        $report->status = $request->status;
        $report->save();

        // 3. Kirim notifikasi ke user (pelapor)
       // $report->user->notify(new ReportStatusUpdated($report));

        // 4. Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Status laporan berhasil diperbarui!');
    }
}