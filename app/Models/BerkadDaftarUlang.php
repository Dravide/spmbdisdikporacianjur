<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkadDaftarUlang extends Model
{
    protected $table = 'berkas_daftar_ulang';
    protected $fillable = ['berkas', 'link', 'id_sekolah'];
}
