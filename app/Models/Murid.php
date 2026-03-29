<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'ms_murid';
    // Primary key berubah kembali menjadi id_murid sesuai tabel baru
    protected $primaryKey = 'id_murid'; 
    public $timestamps = true;

    protected $fillable = [
        'nama_lengkap_murid',
        'kelas',
        'asal_sekolah',
        'alamat_murid',
        'no_hp_murid',
        'nama_orang_tua',
        'no_hp_orang_tua',
        'paket_awal',
        'pilihan_paket',
        'tahun_masuk',
    ];
}