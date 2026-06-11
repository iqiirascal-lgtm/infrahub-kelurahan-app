<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Logika Percabangan Role
        if (Auth::user()->role === 'admin') {
            $reports = Report::with('user')->latest()->get();
            return view('dashboard-admin', compact('reports'));
        }

        $reports = Report::where('user_id', Auth::id())->latest()->get();
        return view('dashboard-warga', compact('reports'));
    }

    public function storeReport(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'location_rtrw' => 'required|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('reports', 'public');
            $validated['photo'] = $path;
        }

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'menunggu';

        Report::create($validated);

        return redirect()->route('dashboard')->with('success', 'Laporan Anda sukses dikirim ke kelurahan!');
    }

    public function updateStatus(Request $request, Report $report)
    {
        $request->validate(['status' => 'required|in:menunggu,diproses,selesai']);
        $report->update(['status' => $request->status]);

        return redirect()->route('dashboard')->with('success', 'Status perkembangan laporan berhasil diperbarui!');
    }

    public function upvote(Report $report)
    {
        $report->increment('upvotes_count');
        return redirect()->back()->with('success', 'Terima kasih! Dukungan Anda terhadap laporan ini telah dicatat.');
    }
}