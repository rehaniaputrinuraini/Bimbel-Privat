<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\MuridController; 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Halaman Utama
Route::get('/', function () {
    return view('companyprofile.landing'); 
});

// 2. Dashboard (Hanya bisa diakses setelah Login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. Route untuk verifikasi email
Route::get('/verify-email', [VerificationCodeController::class, 'create'])
    ->name('verification.notice');
Route::post('/verify-email', [VerificationCodeController::class, 'store'])
    ->name('verification.verify');

// 4. Grup Route yang Perlu Login (Auth)
Route::middleware('auth')->group(function () {
    
    // --- Route Profile ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- Route Murid ---
    Route::prefix('murid')->group(function () {
        Route::get('/', [MuridController::class, 'index'])->name('murid.index');
        Route::get('/tambah', [MuridController::class, 'create'])->name('murid.create');
        Route::post('/simpan', [MuridController::class, 'store'])->name('murid.store');
        Route::get('/{id}/edit', [MuridController::class, 'edit'])->name('murid.edit');
        Route::put('/{id}/update', [MuridController::class, 'update'])->name('murid.update');
        Route::delete('/{id}/hapus', [MuridController::class, 'destroy'])->name('murid.destroy');
    });

    // --- 5. Tambahan Route Harga Paket ---
    Route::get('/harga-paket', function () {
        return view('harga_paket'); // Pastikan nama file kamu: harga_paket.blade.php
    })->name('harga_paket.index');
    // Route untuk menampilkan form tambah harga paket
Route::get('/harga-paket/tambah', function () {
    return view('harga_paket_tambah');
})->name('harga_paket.create');

}); 

// 6. MENGAKTIFKAN FITUR LOGIN & REGISTER
require __DIR__.'/auth.php';