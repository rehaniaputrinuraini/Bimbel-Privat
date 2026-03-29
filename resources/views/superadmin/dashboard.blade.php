@extends('layouts.app')

@section('title', 'Dashboard SuperAdmin')

@section('content')
<div style="margin-bottom: 25px;">
    <p style="color: #6B7280; font-size: 14px; margin-bottom: 5px;">Maret 2026</p>
    <h1 style="font-size: 32px; font-weight: 700; color: #111827; margin: 0;">Dashboard SuperAdmin</h1>
    <p style="color: #6B7280; margin-top: 5px;">Selamat Datang Rehania di Sistem Manajemen Pusat</p>
</div>

<div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 15px; margin-bottom: 30px;">    
    @php
        $stats = [
            ['title' => 'Total Murid', 'val' => '307', 'bg' => '#3A3AA7', 'icon' => 'icon_orang.png'],
            ['title' => 'Total Tentor', 'val' => '20', 'bg' => '#BE7E5E', 'icon' => 'icon_orang.png'],
            ['title' => 'Pemasukan', 'val' => 'Rp 500.000', 'bg' => '#0CCC0C', 'icon' => 'icon_pemasukan.png'],
            ['title' => 'Pengeluaran', 'val' => 'Rp 200.000', 'bg' => '#F14D4D', 'icon' => 'icon_pengeluaran.png'],
            ['title' => 'Laba Bersih', 'val' => 'Rp 300.000', 'bg' => '#E7C255', 'icon' => 'icon_lababersih.png'],
        ];
    @endphp

    @foreach($stats as $s)
    <div style="background: white; height: 180px; border-radius: 20px; position: relative; display: flex; flex-direction: column; align-items: center; justify-content: flex-end; box-shadow: 0 4px 15px rgba(0,0,0,0.08); padding: 25px;">
        <div style="position: absolute; top: 15px; left: 15px; background: {{ $s['bg'] }}; width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
            <img src="{{ asset('images/' . $s['icon']) }}" style="width: 30px; filter: brightness(0) invert(1);">
        </div>
        <h3 style="font-size: 22px; font-weight: 700; color: #111827; margin: 0;">{{ $s['val'] }}</h3>
        <p style="color: #6B7280; font-size: 13px; margin: 5px 0 0 0;">{{ $s['title'] }}</p>
    </div>
    @endforeach
</div>

<div style="background: white; border-radius: 20px; padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
    <div style="display: flex; justify-content: space-between; align-items: center; background-color: #F3E8FF; padding: 15px 25px; border-radius: 15px; margin-bottom: 20px;">
        <h2 style="font-size: 18px; font-weight: 700; color: #111827; margin: 0;">Rincian Keuangan Terakhir</h2>
        <a href="#" style="color: #5D10A2; text-decoration: none; font-weight: 700;">Lihat Semua</a>
    </div>
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 20px; background: #A3D1A3; color: black; border-radius: 12px; margin-bottom: 10px;">
        <span>Pembayaran Murid SD</span>
        <span style="background: #60A060; padding: 8px 15px; border-radius: 8px; font-weight: 700; color: white;">Rp. 5.000.000</span>
    </div>
</div>
@endsection