<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $fillable = [
        'judul',
        'tahun_pelajaran',
        'status_Pendaftaran',
        'tanggal_buka',
        'tanggal_tutup',
    ];

    protected $casts = [
        'tanggal_buka' => 'datetime',
        'tanggal_tutup' => 'datetime',
    ];
}
