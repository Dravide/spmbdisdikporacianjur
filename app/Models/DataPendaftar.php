<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPendaftar extends Model
{
    protected $fillable = [
        'id_users',
        'id_jalur',
        'id_sekolah',
        'data',
        'konfir',
        'verval',
        'jenis',
        'nisn',
        'whatsapp',
        'id_sekolah_asals'
    ];

    protected $hidden = ['data'];
    protected $casts = [
        'data' => 'array',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    public function jalur()
    {
        return $this->hasOne(Jalur::class, 'id', 'id_jalur');
    }

    public function dapodik()

    {
        return $this->hasOne(PesertaDidik::class, 'nisn', 'nisn');
    }

    public function asal_sekolah()
    {
        return $this->belongsTo(SekolahAsal::class, 'id_sekolah_asals', 'id');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah', 'id');
    }

    public function koordinat()
    {
        return $this->hasOne(Koordinat::class, 'nisn', 'nisn');
    }

}
