<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'ms_murid';
    // Gunakan 'id' sebagai primary key sesuai yang terlihat di phpMyAdmin kamu
    protected $primaryKey = 'id'; 
    public $timestamps = true;

    // Daftar ini HARUS sama dengan kolom di phpMyAdmin kamu
    protected $fillable = [
        'nama_lengkap',
        'kelas',
        'asal_sekolah',
        'alamat',
        'no_hp_siswa',
        'nama_orang_tua',
        'no_hp_ortu',
        'paket_awal',
        'pilihan_paket',
        'tahun_masuk'
    ];
}