<?php

namespace App\Imports;

use App\Models\PemetaanDomisili;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Auth;

class PemetaanDomisiliImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new PemetaanDomisili([
            'npsn' => Auth::user()->sekolah->npsn,
            'kecamatan' => $row['kecamatan'],
            'kelurahan' => $row['kelurahan'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            'kecamatan.required' => 'Kecamatan tidak boleh kosong',
            'kelurahan.required' => 'Desa/Kelurahan tidak boleh kosong',
            'rt.required' => 'RT tidak boleh kosong',
            'rw.required' => 'RW tidak boleh kosong',
        ];
    }
}