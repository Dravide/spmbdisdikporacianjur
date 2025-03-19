<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarUlang extends Model
{
    protected $table = 'daftar_ulang';
    protected $fillable = ['urutAwal', 'urutAkhir', 'waktuAwal', 'waktuAkhir', 'id_sekolah'];
}
