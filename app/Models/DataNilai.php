<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataNilai extends Model
{
    protected $fillable = [
        'key',
        'value',
        'verval_id',
    ];

    public function verval(): BelongsTo
    {
        return $this->belongsTo(Verval::class);
    }
}
