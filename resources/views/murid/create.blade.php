@extends('layouts.app')

@section('title', 'Input Data Murid')

@section('content')
<div style="margin-bottom: 25px;">
    <h1 style="font-size: 24px; font-weight: 600; color: #111827;">Input Data Murid</h1>
</div>

<div class="content-card" style="border: 1px solid #D1D5DB; border-radius: 15px; padding: 40px;">
    <form action="{{ route('murid.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 20px;">
            <label class="form-label" style="font-weight: 500; display: block; margin-bottom: 8px;">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-input" placeholder="Masukkan Nama Lengkap" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label class="form-label" style="font-weight: 500; display: block; margin-bottom: 8px;">Kelas</label>
            <input type="text" name="kelas" class="form-input" placeholder="Masukkan Kelas" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label class="form-label" style="font-weight: 500; display: block; margin-bottom: 8px;">Asal Sekolah</label>
            <input type="text" name="asal_sekolah" class="form-input" placeholder="Masukkan Asal Sekolah" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;" required>
        </div>

        <div style="margin-bottom: 25px;">
            <label class="form-label" style="font-weight: 500; display: block; margin-bottom: 8px;">Alamat</label>
            <input type="text" name="alamat" class="form-input" placeholder="Masukkan Alamat" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 20px;">
            <div>
                <label class="form-label" style="font-weight: 500; display: block; margin-bottom: 8px;">No HP Siswa</label>
                <input type="text" name="no_hp_siswa" class="form-input" placeholder="Masukkan No HP" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
            </div>
            <div>
                <label class="form-label" style="font-weight: 500; display: block; margin-bottom: 8px;">Paket Awal</label>
                <input type="text" name="paket_awal" class="form-input" placeholder="Paket Awal" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 20px;">
            <div>
                <label class="form-label" style="font-weight: 500; display: block; margin-bottom: 8px;">Nama Orang Tua</label>
                <input type="text" name="nama_orang_tua" class="form-input" placeholder="Masukkan Orang Tua" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
            </div>
            <div>
                <label class="form-label" style="font-weight: 500; display: block; margin-bottom: 8px;">Pilihan Paket</label>
                <input type="text" name="pilihan_paket" class="form-input" placeholder="Pilihan Paket Selanjutnya" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 40px;">
            <div>
                <label class="form-label" style="font-weight: 500; display: block; margin-bottom: 8px;">No HP Ortu</label>
                <input type="text" name="no_hp_ortu" class="form-input" placeholder="Masukkan No HP" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
            </div>
            <div>
                <label class="form-label" style="font-weight: 500; display: block; margin-bottom: 8px;">Tahun Masuk</label>
                <input type="text" name="tahun_masuk" class="form-input" placeholder="Masukkan Tahun Masuk" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
            </div>
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 20px;">
            <a href="{{ route('murid.index') }}" style="padding: 12px 50px; border: 2px solid #5D10A2; border-radius: 12px; color: #5D10A2; text-decoration: none; font-weight: 600; text-align: center;">Keluar</a>
            <button type="submit" class="btn-add" style="padding: 12px 50px; border-radius: 12px; background: #5D10A2; color: white; border: none; font-weight: 600; cursor: pointer;">Simpan</button>
        </div>
    </form>
</div>
@endsection