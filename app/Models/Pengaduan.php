<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';

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
        'tanggapan',
        'tanggal_tanggapan',
        'operator_id',
        'admin_id'
    ];

    protected $casts = [
        'tujuan_dinas' => 'boolean',
        'tanggal_tanggapan' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'tujuan_id');
    }

    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
