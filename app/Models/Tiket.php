<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_tiket',
        'deskripsi',
        'nisn',
        'nama_siswa',
        'status',
        'operator_id',
        'sekolah_id',
        'admin_id',
        'catatan_admin',
        'processed_at',
        'completed_at'
    ];

    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}