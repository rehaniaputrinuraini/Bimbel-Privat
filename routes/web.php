<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\MuridController; 
use App\Http\Controllers\Tentor\TentorController; // Import Controller Tentor kamu
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- 1. HALAMAN PUBLIK (Bisa diakses tanpa login) ---
Route::get('/', function () {
    return view('companyprofile.landing'); 
});

// --- 2. VERIFIKASI EMAIL ---
Route::get('/verify-email', [VerificationCodeController::class, 'create'])
    ->name('verification.notice');
Route::post('/verify-email', [VerificationCodeController::class, 'store'])
    ->name('verification.verify');


// --- 3. GRUP ROUTE TERPROTEKSI (Harus Login) ---
Route::middleware(['auth', 'verified'])->group(function () {

    // A. DASHBOARD UTAMA (Admin Rahmanda)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // B. DASHBOARD SUPERADMIN (Rehania)
    Route::get('/superadmin/dashboard', function () {
        return view('superadmin.dashboard');
    })->name('superadmin.dashboard');

    // C. DASHBOARD TENTOR (Tugas Kamu)
    Route::prefix('tentor')->group(function () {
        Route::get('/dashboard', [TentorController::class, 'index'])->name('tentor.dashboard');
        
        // Nanti tambah route presensi di sini:
        // Route::get('/presensi', [TentorController::class, 'presensi'])->name('tentor.presensi');
    });

    // D. KELOLA MURID
    Route::prefix('murid')->group(function () {
        Route::get('/', [MuridController::class, 'index'])->name('murid.index');
        Route::get('/tambah', [MuridController::class, 'create'])->name('murid.create');
        Route::post('/simpan', [MuridController::class, 'store'])->name('murid.store');
        Route::get('/{id}/edit', [MuridController::class, 'edit'])->name('murid.edit');
        Route::put('/{id}/update', [MuridController::class, 'update'])->name('murid.update');
        Route::delete('/{id}/hapus', [MuridController::class, 'destroy'])->name('murid.destroy');
    });

    // E. HARGA PAKET
    Route::get('/harga-paket', function () {
        return view('harga_paket');
    })->name('harga_paket.index');

    Route::get('/harga-paket/tambah', function () {
        return view('harga_paket_tambah');
    })->name('harga_paket.create');

    // F. PROFILE USER
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

}); 

// --- 4. FITUR LOGIN & REGISTER (Breeze/Auth) ---
require __DIR__.'/auth.php';