@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Murid</h1>

    <form action="{{ route('murid.update', $murid->id_murid) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_lengkap_murid" class="form-label">Nama Lengkap *</label>
            <input type="text" class="form-control @error('nama_lengkap_murid') is-invalid @enderror" id="nama_lengkap_murid" name="nama_lengkap_murid" value="{{ old('nama_lengkap_murid', $murid->nama_lengkap_murid) }}">
            @error('nama_lengkap_murid')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- sisanya sama seperti create, gunakan value="{{ old('field', $murid->field) }}" --}}
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('murid.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection