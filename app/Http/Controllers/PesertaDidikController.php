<?php

namespace App\Http\Controllers;

use App\Models\PesertaDidik;
use Illuminate\Http\Request;

class PesertaDidikController extends Controller
{
    public function index()
    {
        return PesertaDidik::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'peserta_didik_id' => ['required'],
            'sekolah_id' => ['required'],
            'kode_wilayah' => ['required'],
            'nama' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required', 'date'],
            'nik' => ['required', 'integer'],
            'nisn' => ['required', 'integer'],
            'alamat_jalan' => ['required'],
            'desa_kelurahan' => ['required'],
            'rt' => ['required', 'integer'],
            'rw' => ['required'],
            'nama_dusun' => ['required'],
            'nama_ibu_kandung' => ['required'],
            'pekerjaan_ibu' => ['required'],
            'penghasilan_ibu' => ['required'],
            'nama_ayah' => ['required'],
            'pekerjaan_ayah' => ['required'],
            'penghasilan_ayah' => ['required'],
            'nama_wali' => ['required'],
            'pekerjaan_wali' => ['required'],
            'penghasilan_wali' => ['required'],
            'kebutuhan_khusus' => ['required'],
            'no_KIP' => ['required'],
            'no_pkh' => ['required'],
            'lintang' => ['required'],
            'bujur' => ['required'],
        ]);

        return PesertaDidik::create($request->validated());
    }

    public function show(PesertaDidik $pesertaDidik)
    {
        return $pesertaDidik;
    }

    public function update(Request $request, PesertaDidik $pesertaDidik)
    {
        $request->validate([
            'peserta_didik_id' => ['required'],
            'sekolah_id' => ['required'],
            'kode_wilayah' => ['required'],
            'nama' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required', 'date'],
            'nik' => ['required', 'integer'],
            'nisn' => ['required', 'integer'],
            'alamat_jalan' => ['required'],
            'desa_kelurahan' => ['required'],
            'rt' => ['required', 'integer'],
            'rw' => ['required'],
            'nama_dusun' => ['required'],
            'nama_ibu_kandung' => ['required'],
            'pekerjaan_ibu' => ['required'],
            'penghasilan_ibu' => ['required'],
            'nama_ayah' => ['required'],
            'pekerjaan_ayah' => ['required'],
            'penghasilan_ayah' => ['required'],
            'nama_wali' => ['required'],
            'pekerjaan_wali' => ['required'],
            'penghasilan_wali' => ['required'],
            'kebutuhan_khusus' => ['required'],
            'no_KIP' => ['required'],
            'no_pkh' => ['required'],
            'lintang' => ['required'],
            'bujur' => ['required'],
        ]);

        $pesertaDidik->update($request->validated());

        return $pesertaDidik;
    }

    public function destroy(PesertaDidik $pesertaDidik)
    {
        $pesertaDidik->delete();

        return response()->json();
    }
}
