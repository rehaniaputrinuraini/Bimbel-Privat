<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\MuridController;

Route::resource('murid', MuridController::class);

use App\Http\Controllers\PaketController;

Route::resource('paket', PaketController::class);


use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ============================================
// ROUTE SEMENTARA UNTUK MENU YANG BELUM ADA
// ============================================

Route::get('/dashboard', function () {
    return redirect()->route('paket.index');
})->name('dashboard');

Route::get('/tentor', function () {
    return redirect()->route('paket.index');
})->name('tentor.index');

Route::get('/presensi', function () {
    return redirect()->route('paket.index');
})->name('presensi.index');

Route::get('/gaji', function () {
    return redirect()->route('paket.index');
})->name('gaji.index');

Route::get('/laporan', function () {
    return redirect()->route('paket.index');
})->name('laporan.index');

// Route logout (sementara)
Route::post('/logout', function () {
    return redirect('/');
})->name('logout');

Route::get('/pembayaran', function () {
    return redirect()->route('paket.index');
})->name('pembayaran.index');