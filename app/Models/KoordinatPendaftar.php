<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KoordinatPendaftar extends Model
{
    protected $fillable = [
        'id_users',
        'lat',
        'lon',
    ];
}
