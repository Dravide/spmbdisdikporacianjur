<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesertaDidik extends Model
{
    protected $fillable = [
        'peserta_didik_id',
        'sekolah_id',
        'kode_wilayah',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'nik',
        'nisn',
        'alamat_jalan',
        'desa_kelurahan',
        'rt',
        'rw',
        'nama_dusun',
        'nama_ibu_kandung',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'nama_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_wali',
        'pekerjaan_wali',
        'penghasilan_wali',
        'kebutuhan_khusus',
        'no_KIP',
        'no_pkh',
        'lintang',
        'bujur',
    ];

    public function dataPendaftar()
    {
        return $this->belongsTo(DataPendaftar::class, 'nisn', 'nisn');
    }

    public function sekolahid()
    {
        return $this->hasOne(SekolahAsal::class, 'sekolah_id', 'sekolah_id');
    }

//    protected $casts = [
//        'tanggal_lahir' => 'date',
//    ];
//
}
