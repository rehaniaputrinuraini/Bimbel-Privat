@extends('layouts.app')
@section('content')
    <h1>Daftar Murid</h1>
    @foreach($murids as $murid)
        <p>{{ $murid->nama_lengkap_murid }}</p>
    @endforeach
@endsection