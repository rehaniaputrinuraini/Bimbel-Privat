@extends('layouts.app')

@section('title', 'Manajemen Harga Paket')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px;">
    <div>
        <p style="color: #6B7280; font-size: 14px; margin-bottom: 5px;">Maret 2026</p>
        <h1 style="font-size: 32px; font-weight: 700; color: #111827; margin: 0;">Harga Paket</h1>
        <p style="color: #6B7280; margin-top: 5px;">Manajemen Harga Paket</p>
    </div>
    
    <a href="{{ route('harga_paket.create') }}" style="text-decoration: none;">
        <button style="background-color: #5D10A2; color: white; border: none; padding: 12px 25px; border-radius: 10px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 10px; box-shadow: 0 4px 10px rgba(93, 16, 162, 0.3);">
            <i class="fas fa-plus"></i> Tambah
        </button>
    </a>
</div>

<div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
    <table style="width: 100%; border-collapse: collapse; text-align: center;">
        <thead>
            <tr style="background-color: #F3E8FF; color: #111827; font-weight: 700;">
                <td style="padding: 20px;">No</td>
                <td style="padding: 20px;">ID</td>
                <td style="padding: 20px;">Harga Paket</td>
                <td style="padding: 20px;">Tingkat</td>
                <td style="padding: 20px;">Aksi</td>
            </tr>
        </thead>
        
        <tbody style="color: #111827; font-weight: 600;">
            @php
                $pakets = [
                    ['id' => 'PK0001', 'harga' => '120.000', 'tingkat' => 'SD'],
                    ['id' => 'PK0002', 'harga' => '150.000', 'tingkat' => 'SMP'],
                    ['id' => 'PK0003', 'harga' => '180.000', 'tingkat' => 'SMA'],
                    ['id' => 'PK0004', 'harga' => '100.000', 'tingkat' => 'Biaya Pendaftaran'],
                ];
            @endphp

            @foreach($pakets as $index => $p)
            <tr style="border-bottom: 1px solid #F3F4F6;">
                <td style="padding: 20px;">{{ $index + 1 }}</td>
                <td style="padding: 20px;">{{ $p['id'] }}</td>
                <td style="padding: 20px;">{{ $p['harga'] }}</td>
                <td style="padding: 20px;">{{ $p['tingkat'] }}</td>
                <td style="padding: 20px;">
                    <div style="display: flex; gap: 8px; justify-content: center;">
                        <button style="background-color: #5CB85C; color: white; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; font-size: 13px; display: flex; align-items: center; gap: 5px;">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button style="background-color: #D9534F; color: white; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; font-size: 13px; display: flex; align-items: center; gap: 5px;">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    tbody tr:hover {
        background-color: #F9FAFB;
        transition: 0.2s;
    }
</style>
@endsection