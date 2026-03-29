@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div style="margin-bottom: 25px;">
    <p style="color: #6B7280; font-size: 14px; margin-bottom: 5px;">Maret 2026</p>
    <h1 style="font-size: 32px; font-weight: 700; color: #111827; margin: 0;">Dashboard Admin</h1>
    <p style="color: #6B7280; margin-top: 5px;">Selamat Datang di Sistem Manajemen Bimbel Privat</p>
</div>

<div class="stats-grid" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 15px; margin-bottom: 30px;">    
    @php
        $stats = [
            ['title' => 'Total Murid',   'val' => '307',        'bg' => '#3A3AA7', 'icon' => 'icon_orang.png',       'size' => '35px'],
            ['title' => 'Total Tentor',  'val' => '20',         'bg' => '#BE7E5E', 'icon' => 'icon_orang.png',       'size' => '35px'],
            ['title' => 'Pemasukan',     'val' => 'Rp 500.000', 'bg' => '#0CCC0C', 'icon' => 'icon_pemasukan.png',   'size' => '30px'],
            ['title' => 'Pengeluaran',   'val' => 'Rp 200.000', 'bg' => '#F14D4D', 'icon' => 'icon_pengeluaran.png', 'size' => '30px'],
            ['title' => 'Laba Bersih',   'val' => 'Rp 300.000', 'bg' => '#E7C255', 'icon' => 'icon_lababersih.png',  'size' => '30px'],
        ];
    @endphp

    @foreach($stats as $s)
    <div class="stat-box" style="background: white; height: 180px; border-radius: 20px; position: relative; display: flex; flex-direction: column; align-items: center; justify-content: flex-end; box-shadow: 0 4px 15px rgba(0,0,0,0.08); padding: 25px;">
        
        <div style="position: absolute; top: 15px; left: 15px; background: {{ $s['bg'] }}; width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
            <img src="{{ asset('images/' . $s['icon']) }}" style="width: {{ $s['size'] }}; height: {{ $s['size'] }}; object-fit: contain;">
        </div>

        <div style="height: 50px; display: flex; align-items: center; justify-content: center; width: 100%;">
            <h3 style="font-size: {{ str_contains($s['val'], 'Rp') ? '22px' : '38px' }}; font-weight: 700; color: #111827; margin: 0; line-height: 1; text-align: center;">
                {{ $s['val'] }}
            </h3>
        </div>

        <div style="height: 25px; display: flex; align-items: center; justify-content: center; width: 100%; margin-top: 5px;">
            <p style="color: #6B7280; font-size: 13px; font-weight: 500; margin: 0; white-space: nowrap; text-align: center;">
                {{ $s['title'] }}
            </p>
        </div>
    </div>
    @endforeach
</div>

<div class="finance-card" style="background: white; border-radius: 20px; padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
    
    <div style="display: flex; justify-content: space-between; align-items: center; background-color: #F3E8FF; padding: 15px 25px; border-radius: 15px; margin-bottom: 20px;">
        <h2 style="font-size: 18px; font-weight: 700; color: #111827; margin: 0;">Rincian Keuangan Terakhir</h2>
        <a href="#" style="color: #4F46E5; text-decoration: none; font-weight: 700; font-size: 14px;">Lihat Semua</a>
    </div>

    <div class="fin-item" style="display: flex; justify-content: space-between; align-items: center; padding: 15px 25px; background: #60A060; color: white; border-radius: 12px; margin-bottom: 12px; font-weight: 600; font-size: 14px;">
        <span>Pembayaran Murid SD</span>
        <span style="color: white; padding: 8px 18px; border-radius: 8px; font-size: 14px;">Rp. 5.000.000</span>
    </div>

    <div class="fin-item" style="display: flex; justify-content: space-between; align-items: center; padding: 15px 25px; background: #D74E4E; color: white; border-radius: 12px; margin-bottom: 12px; font-weight: 600; font-size: 14px;">
        <span>Bayar WiFi</span>
        <span style=" color: white; padding: 8px 18px; border-radius: 8px; font-size: 14px;">Rp. 100.000</span>
    </div>

    <div class="fin-item" style="display: flex; justify-content: space-between; align-items: center; padding: 15px 25px; background: #60A060; color: white; border-radius: 12px; margin-bottom: 12px; font-weight: 600; font-size: 14px;">
        <span>Pembayaran Murid SMA</span>
        <span style="color: white; padding: 8px 18px; border-radius: 8px; font-size: 14px;">Rp. 4.000.000</span>
    </div>
</div>
@endsection