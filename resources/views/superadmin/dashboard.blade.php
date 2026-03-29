@extends('layouts.dashboard')

@section('title', 'Dashboard SuperAdmin')

@section('sidebar')
    <li><a href="{{ route('superadmin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-200 {{ request()->routeIs('superadmin.dashboard') ? 'bg-gray-200' : '' }}">Dashboard</a></li>
    <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-200">Kelola Tentor</a></li>
    <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-200">Kelola Admin</a></li>
    <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-200">Kelola Murid</a></li>
    <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-200">Harga Paket</a></li>
    <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-200">Riwayat Presensi</a></li>
    <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-200">Pembayaran</a></li>
    <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-200">Rekap Gaji</a></li>
    <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-200">Laporan Keuangan</a></li>
@endsection

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Dashboard SuperAdmin</h1>
        <p class="text-gray-600">Selamat Datang di Sistem Manajemen Bimbel Privat</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-gray-500 text-sm">Total Murid</p>
            <p class="text-2xl font-bold">{{ $totalMurid }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-gray-500 text-sm">Total Tentor</p>
            <p class="text-2xl font-bold">{{ $totalTentor }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-gray-500 text-sm">Pemasukan</p>
            <p class="text-2xl font-bold">Rp {{ number_format($pemasukan, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-gray-500 text-sm">Pengeluaran</p>
            <p class="text-2xl font-bold">Rp {{ number_format($pengeluaran, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-gray-500 text-sm">Laba Bersih</p>
            <p class="text-2xl font-bold">Rp {{ number_format($labaBersih, 0, ',', '.') }}</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold mb-4">Rincian Keuangan Terakhir</h2>
        <div class="space-y-3">
            @foreach($rincian as $item)
                <div class="flex justify-between border-b pb-2">
                    <span>{{ $item->keterangan }}</span>
                    <span class="font-medium">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</span>
                </div>
            @endforeach
        </div>
    </div>
@endsection