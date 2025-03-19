<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Verval extends Model
{

    protected $fillable = [
        'id_pendaftar',
        'id_berkas',
        'data_berkas',
        'status',
    ];

    public function berkas()
    {
        return $this->belongsTo(Berkas::class);
    }

    public function users()
    {
        return $this->hasOne(User::class, 'username', 'id_pendaftar');
    }

    public function DataNilai(): HasMany
    {
        return $this->hasMany(DataNilai::class);
    }

    public function DataAkreditasi(): HasOne
    {
        return $this->hasOne(DataNilai::class);
    }

    public function DataPrestasi(): HasMany
    {
        return $this->hasMany(DataPrestasi::class);
    }
}
