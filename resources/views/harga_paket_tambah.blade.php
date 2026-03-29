@extends('layouts.app')

@section('title', 'Tambah Harga Paket')

@section('content')
<div style="margin-bottom: 25px;">
    <h1 style="font-size: 28px; font-weight: 700; color: #111827; margin: 0;">Input Harga Paket</h1>
</div>

<div style="background: white; border: 4px solid #3498db; border-radius: 20px; padding: 45px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
    <form action="#" method="POST">
        @csrf
        
        <div style="margin-bottom: 30px;">
            <label style="display: block; font-weight: 700; margin-bottom: 12px; color: #111827; font-size: 16px;">ID</label>
            <input type="text" name="id_paket" placeholder="Masukkan ID" 
                style="width: 100%; padding: 18px; border: 1px solid #D1D5DB; border-radius: 12px; background-color: #F9FAFB; font-size: 14px; outline: none; color: #6B7280;">
        </div>

        <div style="margin-bottom: 30px;">
            <label style="display: block; font-weight: 700; margin-bottom: 12px; color: #111827; font-size: 16px;">Harga Paket</label>
            <input type="text" name="harga" placeholder="Masukkan Harga Paket" 
                style="width: 100%; padding: 18px; border: 1px solid #D1D5DB; border-radius: 12px; background-color: #F9FAFB; font-size: 14px; outline: none; color: #6B7280;">
        </div>

        <div style="margin-bottom: 45px;">
            <label style="display: block; font-weight: 700; margin-bottom: 12px; color: #111827; font-size: 16px;">Tingkat</label>
            <input type="text" name="tingkat" placeholder="Masukkan Tingkat" 
                style="width: 100%; padding: 18px; border: 1px solid #D1D5DB; border-radius: 12px; background-color: #F9FAFB; font-size: 14px; outline: none; color: #6B7280;">
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 20px;">
            <a href="{{ route('harga_paket.index') }}" 
                style="text-decoration: none; padding: 14px 45px; border: 2px solid #5D10A2; color: #5D10A2; border-radius: 15px; font-weight: 700; text-align: center; transition: 0.3s; font-size: 16px;">
                Keluar
            </a>
            
            <button type="submit" 
                style="padding: 14px 55px; background-color: #5D10A2; color: white; border: none; border-radius: 15px; font-weight: 700; cursor: pointer; transition: 0.3s; box-shadow: 0 4px 12px rgba(93, 16, 162, 0.2); font-size: 16px;">
                Simpan
            </button>
        </div>
    </form>
</div>

<style>
    /* Efek hover untuk tombol agar lebih interaktif */
    a:hover {
        background-color: rgba(93, 16, 162, 0.05);
    }
    button:hover {
        background-color: #4a0d82;
        transform: translateY(-1px);
    }
</style>
@endsection