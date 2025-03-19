<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Koordinat extends Model
{
    protected $fillable = [
        'nisn',
        'latitude',
        'longitude',
    ];

}
