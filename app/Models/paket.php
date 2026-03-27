<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'ms_paket';
    protected $primaryKey = 'id_paket';
    public $timestamps = true;

    protected $fillable = [
        'tingkat',
        'harga',
        'biaya_pendaftaran',
    ];
}