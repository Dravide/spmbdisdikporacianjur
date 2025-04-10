<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class PemetaanDomisili extends Model
{
    protected $guarded = [
        'id'
    ];
    
    // Add table name explicitly to ensure correct table is used
    protected $table = 'pemetaan_domisilis';
}
