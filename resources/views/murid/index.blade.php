@extends('layouts.app')

@section('content')
<div style="margin-bottom: 25px;">
    <p style="color: #6B7280; font-size: 13px;">Maret 2026</p>
    <h1 style="font-size: 24px; font-weight: 600;">Kelola Murid</h1>
    <p style="color: #6B7280; font-size: 13px;">Manajemen Data Murid</p>
</div>

<div class="content-card">
    <div class="filter-row">
        <select class="select-custom"><option>---Pilih Kelas---</option></select>
        <select class="select-custom"><option>---Status Pembayaran---</option></select>
        <select class="select-custom"><option>---Tahun Masuk---</option></select>
        <a href="{{ route('murid.create') }}" class="btn-add"><i class="fas fa-plus"></i> Tambah</a>
    </div>

    <div class="search-box">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Cari">
    </div>

    <div class="table-container">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>Asal Sekolah</th>
                    <th>No HP Siswa</th>
                    <th>Nama Orang Tua</th>
                    <th>No HP Ortu</th>
                    <th>Paket Awal</th>
                    <th>Pilihan Paket</th>
                    <th>Tahun Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($murids as $index => $m)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $m->nama_lengkap }}</td>
                    <td>{{ $m->kelas }}</td>
                    <td>{{ $m->asal_sekolah }}</td>
                    <td>{{ $m->no_hp_siswa }}</td>
                    <td>{{ $m->nama_orang_tua }}</td> <td>{{ $m->no_hp_ortu }}</td>   <td><input type="checkbox" checked disabled></td>
                    <td>{{ $m->pilihan_paket }}</td> <td>{{ $m->tahun_masuk }}</td>   <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('murid.edit', $m->id) }}" class="btn-edit" style="background:#5CB85C; color:white; padding:5px 10px; border-radius:5px; text-decoration:none; font-size:12px;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button class="btn-hapus" style="background:#D9534F; color:white; border:none; padding:5px 10px; border-radius:5px; cursor:pointer; font-size:12px;">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection