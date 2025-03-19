<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $fillable = [
        'nama_berkas',
        'kode',
        'svg',
        'jenis_berkas',
    ];

    public function getVerval()
    {
        return $this->hasOne(Verval::class, 'id_berkas');
    }
}
