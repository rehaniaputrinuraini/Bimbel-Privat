@extends('layouts.admin')

@section('title', 'Harga Paket')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manajemen Harga Paket</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Harga Paket</th>
                                <th>Tingkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pakets as $index => $paket)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>PK{{ str_pad($paket->id_paket, 4, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ number_format($paket->harga, 0, ',', '.') }}</td>
                                <td>{{ $paket->tingkat }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEdit{{ $paket->id_paket }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('paket.destroy', $paket->id_paket) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Modal Edit --}}
                            <div class="modal fade" id="modalEdit{{ $paket->id_paket }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('paket.update', $paket->id_paket) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Paket</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Tingkat</label>
                                                    <select name="tingkat" class="form-control" required>
                                                        <option value="SD" {{ $paket->tingkat == 'SD' ? 'selected' : '' }}>SD</option>
                                                        <option value="SMP" {{ $paket->tingkat == 'SMP' ? 'selected' : '' }}>SMP</option>
                                                        <option value="SMA" {{ $paket->tingkat == 'SMA' ? 'selected' : '' }}>SMA</option>
                                                        <option value="Biaya Pendaftaran" {{ $paket->tingkat == 'Biaya Pendaftaran' ? 'selected' : '' }}>Biaya Pendaftaran</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Harga Paket</label>
                                                    <input type="number" name="harga" class="form-control" value="{{ $paket->harga }}" required step="1000">
                                                </div>
                                                <div class="form-group">
                                                    <label>Biaya Pendaftaran (opsional)</label>
                                                    <input type="number" name="biaya_pendaftaran" class="form-control" value="{{ $paket->biaya_pendaftaran }}" step="1000">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('paket.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Paket Baru</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tingkat</label>
                        <select name="tingkat" class="form-control" required>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="Biaya Pendaftaran">Biaya Pendaftaran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Paket</label>
                        <input type="number" name="harga" class="form-control" required step="1000">
                    </div>
                    <div class="form-group">
                        <label>Biaya Pendaftaran (opsional)</label>
                        <input type="number" name="biaya_pendaftaran" class="form-control" step="1000">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection