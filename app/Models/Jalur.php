<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jalur extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'kode',
        'nama_jalur',
        'svg',
        'berkas'
    ];

    protected $casts = [
        'berkas' => 'array',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function dataPendaftar()
    {
        return $this->hasMany(DataPendaftar::class, 'id_jalur', 'id');
    }

    public function berkas()
    {
        return $this->hasMany(Berkas::class, 'id');
    }


}
