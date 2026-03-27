@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Murid Baru</h1>

    <form action="{{ route('murid.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_lengkap_murid" class="form-label">Nama Lengkap *</label>
            <input type="text" class="form-control @error('nama_lengkap_murid') is-invalid @enderror" id="nama_lengkap_murid" name="nama_lengkap_murid" value="{{ old('nama_lengkap_murid') }}">
            @error('nama_lengkap_murid')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ old('kelas') }}">
        </div>

        <div class="mb-3">
            <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}">
        </div>

        <div class="mb-3">
            <label for="alamat_murid" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat_murid" name="alamat_murid" rows="2">{{ old('alamat_murid') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="no_hp_murid" class="form-label">No HP Murid</label>
            <input type="text" class="form-control" id="no_hp_murid" name="no_hp_murid" value="{{ old('no_hp_murid') }}">
        </div>

        <div class="mb-3">
            <label for="nama_orang_tua" class="form-label">Nama Orang Tua</label>
            <input type="text" class="form-control" id="nama_orang_tua" name="nama_orang_tua" value="{{ old('nama_orang_tua') }}">
        </div>

        <div class="mb-3">
            <label for="no_hp_orang_tua" class="form-label">No HP Orang Tua</label>
            <input type="text" class="form-control" id="no_hp_orang_tua" name="no_hp_orang_tua" value="{{ old('no_hp_orang_tua') }}">
        </div>

        <div class="mb-3">
            <label for="paket_awal" class="form-label">Paket Awal (Rp)</label>
            <input type="number" class="form-control" id="paket_awal" name="paket_awal" value="{{ old('paket_awal', 100000) }}" step="1000">
        </div>

        <div class="mb-3">
            <label for="pilihan_paket" class="form-label">Pilihan Paket</label>
            <select class="form-control" id="pilihan_paket" name="pilihan_paket">
                <option value="">-- Pilih --</option>
                <option value="SD" {{ old('pilihan_paket')=='SD' ? 'selected' : '' }}>SD</option>
                <option value="SMP" {{ old('pilihan_paket')=='SMP' ? 'selected' : '' }}>SMP</option>
                <option value="SMA" {{ old('pilihan_paket')=='SMA' ? 'selected' : '' }}>SMA</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
            <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" value="{{ old('tahun_masuk', date('Y')) }}" min="2000" max="{{ date('Y') }}">
        </div>

        <div class="mb-3">
            <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
            <select class="form-control" id="status_pembayaran" name="status_pembayaran">
                <option value="belum" {{ old('status_pembayaran')=='belum' ? 'selected' : '' }}>Belum</option>
                <option value="lunas" {{ old('status_pembayaran')=='lunas' ? 'selected' : '' }}>Lunas</option>
                <option value="tunggak" {{ old('status_pembayaran')=='tunggak' ? 'selected' : '' }}>Tunggak</option>
                <option value="uang_muka" {{ old('status_pembayaran')=='uang_muka' ? 'selected' : '' }}>Uang Muka</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="total_piutang" class="form-label">Total Piutang (Rp)</label>
            <input type="number" class="form-control" id="total_piutang" name="total_piutang" value="{{ old('total_piutang', 0) }}" step="1000">
        </div>

        <div class="mb-3">
            <label for="total_uang_muka" class="form-label">Total Uang Muka (Rp)</label>
            <input type="number" class="form-control" id="total_uang_muka" name="total_uang_muka" value="{{ old('total_uang_muka', 0) }}" step="1000">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('murid.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection