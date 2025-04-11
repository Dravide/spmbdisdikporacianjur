<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'no_telepon',
        'subjek',
        'pesan',
        'tujuan_id',
        'tujuan_dinas',
        'user_id',
        'status',
        'response',
        'responded_by',
        'responded_at'
    ];

    /**
     * Get the school this complaint is directed to.
     */
    public function tujuanSekolah()
    {
        return $this->belongsTo(Sekolah::class, 'tujuan_id');
    }

    /**
     * Get the user who submitted this complaint.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the admin who responded to this complaint.
     */
    public function responder()
    {
        return $this->belongsTo(User::class, 'responded_by');
    }
}
