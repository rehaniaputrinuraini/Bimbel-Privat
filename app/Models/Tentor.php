<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentor extends Model
{
    protected $table = 'ms_tentor';
    protected $primaryKey = 'id_tentor'; // sesuaikan
    protected $fillable = ['nama_tentor', 'email', 'no_hp', 'alamat']; // sesuaikan
}