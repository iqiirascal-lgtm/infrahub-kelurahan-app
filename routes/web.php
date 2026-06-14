<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/report', [DashboardController::class, 'storeReport'])->name('report.store');
    Route::patch('/report/{report}/status', [ReportController::class, 'updateStatus'])->name('report.status');
    Route::post('/report/{report}/upvote', [DashboardController::class, 'upvote'])->name('report.upvote');
    Route::post('/notifications/read-all', [DashboardController::class, 'markAllRead'])->name('notifications.read');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';