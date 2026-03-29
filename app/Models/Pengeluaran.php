<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'tr_pengeluaran';
    protected $fillable = ['keterangan', 'jumlah', 'tanggal'];
}