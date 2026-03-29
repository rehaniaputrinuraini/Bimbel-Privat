@extends('layouts.app')

@section('title', 'Edit Data Murid')

@section('content')
<div style="margin-bottom: 25px;">
    <h1 style="font-size: 24px; font-weight: 600; color: #111827;">Edit Data Murid</h1>
</div>

<div class="content-card" style="border: 1px solid #D1D5DB; border-radius: 15px; padding: 40px; background: white; height: auto; overflow: visible;">
    <form action="{{ route('murid.update', $murid->id_murid) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 20px;">
            <label style="font-weight: 500; display: block; margin-bottom: 8px;">Nama Lengkap</label>
            <input type="text" name="nama_lengkap_murid" value="{{ old('nama_lengkap_murid', $murid->nama_lengkap_murid) }}" class="form-input" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="font-weight: 500; display: block; margin-bottom: 8px;">Kelas</label>
            <input type="text" name="kelas" value="{{ old('kelas', $murid->kelas) }}" class="form-input" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="font-weight: 500; display: block; margin-bottom: 8px;">Asal Sekolah</label>
            <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $murid->asal_sekolah) }}" class="form-input" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
        </div>

        <div style="margin-bottom: 25px;">
            <label style="font-weight: 500; display: block; margin-bottom: 8px;">Alamat</label>
            <input type="text" name="alamat_murid" value="{{ old('alamat_murid', $murid->alamat_murid) }}" class="form-input" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 20px;">
            <div>
                <label style="font-weight: 500; display: block; margin-bottom: 8px;">No HP Siswa</label>
                <input type="text" name="no_hp_murid" value="{{ old('no_hp_murid', $murid->no_hp_murid) }}" class="form-input" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
            </div>
            <div>
                <label style="font-weight: 500; display: block; margin-bottom: 8px;">Paket Awal</label>
                <input type="text" name="paket_awal" value="{{ old('paket_awal', $murid->paket_awal) }}" class="form-input" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 20px;">
            <div>
                <label style="font-weight: 500; display: block; margin-bottom: 8px;">Nama Orang Tua</label>
                <input type="text" name="nama_orang_tua" value="{{ old('nama_orang_tua', $murid->nama_orang_tua) }}" class="form-input" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
            </div>
            <div>
                <label style="font-weight: 500; display: block; margin-bottom: 8px;">Pilihan Paket</label>
                <input type="text" name="pilihan_paket" value="{{ old('pilihan_paket', $murid->pilihan_paket) }}" class="form-input" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 40px;">
            <div>
                <label style="font-weight: 500; display: block; margin-bottom: 8px;">No HP Ortu</label>
                <input type="text" name="no_hp_orang_tua" value="{{ old('no_hp_orang_tua', $murid->no_hp_orang_tua) }}" class="form-input" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
            </div>
            <div>
                <label style="font-weight: 500; display: block; margin-bottom: 8px;">Tahun Masuk</label>
                <input type="text" name="tahun_masuk" value="{{ old('tahun_masuk', $murid->tahun_masuk) }}" class="form-input" style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #E5E7EB; background: #F9FAFB;">
            </div>
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 15px;">
            <a href="{{ route('murid.index') }}" style="padding: 12px 50px; border: 2px solid #5D10A2; border-radius: 12px; color: #5D10A2; text-decoration: none; font-weight: 600; text-align: center;">Keluar</a>
            <button type="submit" style="padding: 12px 50px; border-radius: 12px; background: #5D10A2; color: white; border: none; font-weight: 600; cursor: pointer;">Simpan</button>
        </div>
    </form>
</div>
@endsection