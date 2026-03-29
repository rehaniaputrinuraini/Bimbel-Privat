<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'tr_pembayaran';
    protected $fillable = ['murid_id', 'jumlah', 'tanggal'];

    public function murid()
{
    // foreign_key nya id_murid, owner_key nya juga id_murid
    return $this->belongsTo(Murid::class, 'id_murid', 'id_murid');
}
}