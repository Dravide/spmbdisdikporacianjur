<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sekolah extends Model
{

    protected $guarded = ['id'];

    public function users(): hasOne
    {
        return $this->hasOne(User::class, 'username', 'npsn');
    }
}
