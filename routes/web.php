<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FacilityCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - InfraHub Kelurahan
|--------------------------------------------------------------------------
*/

// ============================================
// 1. ROUTE PUBLIK (Tanpa Login)
// ============================================
Route::get('/', function () {
    return view('landing');
})->name('landing');


// ============================================
// 2. ROUTE USER / WARGA (Wajib Login)
// ============================================
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Warga
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Laporan Warga
    Route::post('/report', [DashboardController::class, 'storeReport'])->name('report.store');
    Route::post('/report/{report}/upvote', [DashboardController::class, 'upvote'])->name('report.upvote');
    
    // Notifikasi
    Route::post('/notifications/read-all', [DashboardController::class, 'markAllRead'])->name('notifications.read');
    
    // Profile (Warga)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ============================================
// 3. ROUTE ADMIN (Wajib Login + Prefix 'admin')
// ============================================
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'manageReports'])->name('dashboard');
    
    // Manajemen Laporan
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/{report}', [ReportController::class, 'show'])->name('reports.show');
    Route::patch('/reports/{report}/status', [ReportController::class, 'updateStatus'])->name('reports.updateStatus');
    Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');
    
    // Manajemen Kategori Fasilitas
    Route::get('/kategori', [FacilityCategoryController::class, 'index'])->name('categories.index');
    Route::post('/kategori', [FacilityCategoryController::class, 'store'])->name('categories.store');
    Route::delete('/kategori/{id}', [FacilityCategoryController::class, 'destroy'])->name('categories.destroy');
    
    // Profile Admin (reuse controller ProfileController)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


// ============================================
// 4. INCLUDE ROUTE AUTHENTIKASI (Bawaan Breeze)
// ============================================
require __DIR__.'/auth.php';