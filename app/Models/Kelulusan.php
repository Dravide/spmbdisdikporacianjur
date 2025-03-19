<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kelulusan extends Model
{

    protected $guarded = ['id'];

    public function users(): hasOne
    {
        return $this->hasONe(User::class, 'username', 'username');
    }
}
