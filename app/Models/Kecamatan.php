<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kecamatan extends Model
{
    protected $fillable = [
        'code',
        'name'
    ];

    /**
     * Get the desas for the kecamatan.
     */
    public function desas(): HasMany
    {
        return $this->hasMany(Desa::class, 'kecamatan_code', 'code');
    }
}