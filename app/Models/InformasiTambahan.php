<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiTambahan extends Model
{
    protected $table = 'informasi_tambahan';
    protected $fillable = ['id_sekolah', 'content'];
}
