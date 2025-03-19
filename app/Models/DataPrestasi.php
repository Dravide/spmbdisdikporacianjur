<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataPrestasi extends Model
{
    protected $fillable = [
        'juara',
        'tingkat',
        'lomba',
        'verval_id',
        'data'
    ];

    public function verval(): BelongsTo
    {
        return $this->belongsTo(Verval::class);
    }

    public function Ttingkat()
    {
        return $this->hasOne(Tambahan::class, 'id', 'tingkat');
    }
}
