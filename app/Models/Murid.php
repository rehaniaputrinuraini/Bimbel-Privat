<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'ms_murid';
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
        'status_pembayaran',
        'total_piutang',
        'total_uang_muka',
    ];
}