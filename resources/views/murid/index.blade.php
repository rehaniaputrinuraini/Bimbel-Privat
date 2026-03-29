@extends('layouts.app')

@section('content')
<div style="margin-bottom: 25px;">
    <p style="color: #6B7280; font-size: 13px;">{{ date('F Y') }}</p>
    <h1 style="font-size: 24px; font-weight: 600;">Kelola Murid</h1>
    <p style="color: #6B7280; font-size: 13px;">Manajemen Data Murid</p>
</div>

<div class="content-card">
    <div class="filter-row" style="display: flex; align-items: center; gap: 10px;">
        <form action="{{ route('murid.index') }}" method="GET" style="display: flex; gap: 10px; flex-grow: 1;">
            <select name="kelas" class="select-custom" onchange="this.form.submit()" style="padding: 8px 15px; border-radius: 8px; border: 1px solid #E5E7EB; min-width: 150px;">
                <option value="">---Pilih Kelas---</option>
                @foreach($filter_kelas as $k)
                    <option value="{{ $k }}" {{ request('kelas') == $k ? 'selected' : '' }}>{{ $k }}</option>
                @endforeach
            </select>

            <select name="tahun" class="select-custom" onchange="this.form.submit()" style="padding: 8px 15px; border-radius: 8px; border: 1px solid #E5E7EB; min-width: 150px;">
                <option value="">---Tahun Masuk---</option>
                @foreach($filter_tahun as $t)
                    <option value="{{ $t }}" {{ request('tahun') == $t ? 'selected' : '' }}>{{ $t }}</option>
                @endforeach
            </select>

            @if(request('kelas') || request('tahun'))
                <a href="{{ route('murid.index') }}" style="font-size: 12px; color: #D9534F; text-decoration: none; align-self: center;">Reset</a>
            @endif
        </form>

        <a href="{{ route('murid.create') }}" class="btn-add" style="background: #5D10A2; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; display: flex; align-items: center; gap: 8px; white-space: nowrap;">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    <div class="search-box" style="margin-top: 20px; position: relative;">
        <i class="fas fa-search" style="position: absolute; left: 15px; top: 12px; color: #9CA3AF;"></i>
        <input type="text" name="search" placeholder="Cari" style="width: 100%; padding: 10px 40px; border: 1px solid #E5E7EB; border-radius: 8px;">
    </div>

    <div class="table-container" style="margin-top: 20px; overflow-x: auto;">
        <table class="table-custom" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #F9FAFB; text-align: left;">
                    <th style="padding: 12px; border-bottom: 1px solid #E5E7EB;">No</th>
                    <th style="padding: 12px; border-bottom: 1px solid #E5E7EB;">Nama Lengkap</th>
                    <th style="padding: 12px; border-bottom: 1px solid #E5E7EB;">Kelas</th>
                    <th style="padding: 12px; border-bottom: 1px solid #E5E7EB;">Asal Sekolah</th>
                    <th style="padding: 12px; border-bottom: 1px solid #E5E7EB;">No HP Siswa</th>
                    <th style="padding: 12px; border-bottom: 1px solid #E5E7EB;">Nama Orang Tua</th>
                    <th style="padding: 12px; border-bottom: 1px solid #E5E7EB;">No HP Ortu</th>
                    <th style="padding: 12px; border-bottom: 1px solid #E5E7EB;">Paket Awal</th>
                    <th style="padding: 12px; border-bottom: 1px solid #E5E7EB;">Pilihan Paket</th>
                    <th style="padding: 12px; border-bottom: 1px solid #E5E7EB;">Tahun Masuk</th>
                    <th style="padding: 12px; border-bottom: 1px solid #E5E7EB;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($murids as $index => $m)
                <tr style="border-bottom: 1px solid #F3F4F6;">
                    <td style="padding: 12px;">{{ $index + 1 }}</td>
                    <td style="padding: 12px;">{{ $m->nama_lengkap_murid }}</td>
                    <td style="padding: 12px;">{{ $m->kelas }}</td>
                    <td style="padding: 12px;">{{ $m->asal_sekolah }}</td>
                    <td style="padding: 12px;">{{ $m->no_hp_murid }}</td>
                    <td style="padding: 12px;">{{ $m->nama_orang_tua }}</td>
                    <td style="padding: 12px;">{{ $m->no_hp_orang_tua }}</td>
                    <td style="padding: 12px;">{{ $m->paket_awal }}</td>
                    <td style="padding: 12px;">{{ $m->pilihan_paket }}</td>
                    <td style="padding: 12px;">{{ $m->tahun_masuk }}</td>
                    <td style="padding: 12px;">
                        <div style="display: flex; gap: 8px;">
                            <a href="{{ route('murid.edit', $m->id_murid) }}" class="btn-edit" style="background:#5CB85C; color:white; padding:6px 12px; border-radius:6px; text-decoration:none; font-size:12px; display: flex; align-items: center; gap: 4px;">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <form action="{{ route('murid.destroy', $m->id_murid) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus" style="background:#D9534F; color:white; border:none; padding:6px 12px; border-radius:6px; cursor:pointer; font-size:12px; display: flex; align-items: center; gap: 4px;">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection