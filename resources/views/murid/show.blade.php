@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Murid</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $murid->id_murid }}</p>
            <p><strong>Nama Lengkap:</strong> {{ $murid->nama_lengkap_murid }}</p>
            <p><strong>Kelas:</strong> {{ $murid->kelas }}</p>
            <p><strong>Asal Sekolah:</strong> {{ $murid->asal_sekolah }}</p>
            <p><strong>Alamat:</strong> {{ $murid->alamat_murid }}</p>
            <p><strong>No HP Murid:</strong> {{ $murid->no_hp_murid }}</p>
            <p><strong>Nama Orang Tua:</strong> {{ $murid->nama_orang_tua }}</p>
            <p><strong>No HP Orang Tua:</strong> {{ $murid->no_hp_orang_tua }}</p>
            <p><strong>Paket Awal:</strong> Rp {{ number_format($murid->paket_awal, 2) }}</p>
            <p><strong>Pilihan Paket:</strong> {{ $murid->pilihan_paket }}</p>
            <p><strong>Tahun Masuk:</strong> {{ $murid->tahun_masuk }}</p>
            <p><strong>Status Pembayaran:</strong> {{ ucfirst($murid->status_pembayaran) }}</p>
            <p><strong>Total Piutang:</strong> Rp {{ number_format($murid->total_piutang, 2) }}</p>
            <p><strong>Total Uang Muka:</strong> Rp {{ number_format($murid->total_uang_muka, 2) }}</p>
        </div>
    </div>

    <a href="{{ route('murid.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection