<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable = ['code', 'name'];
    
    public function desas()
    {
        return $this->hasMany(Desa::class, 'kecamatan_code', 'code');
    }
}