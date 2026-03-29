<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\VerificationCodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Halaman Utama (Menggunakan file landing.blade.php)
Route::get('/', function () {
    return view('companyprofile.landing'); 
});

// 2. Dashboard (Hanya bisa diakses setelah Login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. Route untuk verifikasi email (milik kamu - tanpa middleware auth, karena user belum login)
Route::get('/verify-email', [VerificationCodeController::class, 'create'])
    ->name('verification.notice');
Route::post('/verify-email', [VerificationCodeController::class, 'store'])
    ->name('verification.verify');

// 4. Grup Route untuk Profile (Bawaan Laravel Breeze) - milik bersama
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 5. MENGAKTIFKAN FITUR LOGIN & REGISTER (WAJIB ADA)
require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {
    Route::middleware('role:superadmin')->prefix('superadmin')->group(function () {
        Route::get('/dashboard', [SuperAdminDashboard::class, 'index'])->name('superadmin.dashboard');
    });
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    });
});