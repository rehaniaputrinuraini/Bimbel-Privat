@extends('layouts.app')

@section('title', 'Dashboard Tentor')

@section('content')
<div class="container-fluid px-3">
    {{-- Header Dashboard - Dibuat lebih elegan & proporsional --}}
    <div class="mt-2 mb-4">
        <p class="text-secondary mb-0" style="font-size: 0.8rem; letter-spacing: 0.5px;">{{ strtoupper($bulanSekarang) }}</p>
        <h4 class="fw-bold mb-1" style="color: #333;">Dashboard Tentor</h4>
        <div style="width: 40px; height: 3px; background-color: #5D10A2; border-radius: 10px; margin-bottom: 8px;"></div>
        <p class="text-muted small">Selamat Datang di Sistem Manajemen Bimbel Privat</p>
    </div>

    {{-- Statistik Cards - Ukuran col-md-4 agar ada ruang kosong di kanan sesuai Figma --}}
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box p-2 bg-light rounded-3">
                            <i class="fas fa-chalkboard-teacher text-dark" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0" style="font-size: 1.6rem;">{{ $totalHadir }} Kali</h3>
                            <p class="text-muted mb-0" style="font-size: 0.85rem;">Total Hadir Bulan Ini</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box p-2 bg-light rounded-3">
                            <i class="fas fa-history text-dark" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0" style="font-size: 1.6rem;">{{ $totalJam }} Jam</h3>
                            <p class="text-muted mb-0" style="font-size: 0.85rem;">Total Jam Mengajar Bulan Ini</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Status Presensi Section - Sesuai dengan estetika Group 33820.png --}}
    <div class="card border-0 shadow-sm mt-4" style="border-radius: 15px; background-color: #F8F3FF;">
        <div class="card-body p-0">
            {{-- Tab Indikator Status --}}
            <div class="d-flex gap-4 p-3 px-4 border-bottom border-white border-opacity-50">
                <div class="d-flex align-items-center gap-2">
                    <div class="status-dot" style="width: 16px; height: 16px; background-color: #FF0000; border-radius: 50%; {{ $status == 'belum_presensi' ? 'box-shadow: 0 0 10px #FF0000; border: 2px solid white;' : 'opacity: 0.3;' }}"></div>
                    <span class="small fw-bold {{ $status == 'belum_presensi' ? 'text-dark' : 'text-muted' }}">Belum Presensi</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <div class="status-dot" style="width: 16px; height: 16px; background-color: #EAB308; border-radius: 50%; {{ $status == 'sedang_mengajar' ? 'box-shadow: 0 0 10px #EAB308; border: 2px solid white;' : 'opacity: 0.3;' }}"></div>
                    <span class="small fw-bold {{ $status == 'sedang_mengajar' ? 'text-dark' : 'text-muted' }}">Sedang Mengajar</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <div class="status-dot" style="width: 16px; height: 16px; background-color: #22C55E; border-radius: 50%; {{ $status == 'selesai' ? 'box-shadow: 0 0 10px #22C55E; border: 2px solid white;' : 'opacity: 0.3;' }}"></div>
                    <span class="small fw-bold {{ $status == 'selesai' ? 'text-dark' : 'text-muted' }}">Selesai</span>
                </div>
            </div>

            {{-- Kotak Aksi Dinamis --}}
            <div class="bg-white m-3 p-4" style="border-radius: 12px; min-height: 120px; display: flex; align-items: center;">
                @if($status == 'belum_presensi')
                    <div class="ps-2">
                        <h5 class="mb-0 fw-bold text-danger">Silahkan lakukan presensi masuk terlebih dahulu</h5>
                        <p class="text-muted small mb-0 mt-1">Gunakan menu Presensi untuk memulai sesi mengajar Anda.</p>
                    </div>
                @elseif($status == 'sedang_mengajar')
                    <div class="w-100 ps-2">
                        <p class="text-muted small mb-1">Jam Masuk: <span class="fw-bold">{{ $presensiHariIni->jam_masuk ?? '--:--' }}</span></p>
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-stopwatch text-dark fs-5"></i>
                            <h4 class="fw-bold mb-0">00:25:10 / 01:30:00</h4>
                        </div>
                        <p class="text-danger small fw-bold mt-2 mb-0">
                            <i class="fas fa-exclamation-triangle me-1"></i> Sisa 64 menit
                        </p>
                    </div>
                @elseif($status == 'selesai')
                    <div class="ps-2">
                        <p class="text-muted small mb-0">Sesi Selesai</p>
                        <h5 class="fw-bold mb-1 text-success">Sesi 90 menit telah berakhir</h5>
                        <p class="text-danger small fw-bold mb-0">Silahkan segera lakukan presensi keluar.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    /* Halus-kan tampilan shadow */
    .card {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
    }
    .icon-box {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 50px;
        height: 50px;
    }
</style>
@endsection