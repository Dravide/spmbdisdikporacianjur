<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Desa extends Model
{
    protected $fillable = [
        'code',
        'name',
        'kecamatan_code'
    ];

    /**
     * Get the kecamatan that owns the desa.
     */
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_code', 'code');
    }
}