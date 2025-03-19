<?php

namespace App\Imports;

use App\Models\Kelulusan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class HasilImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return Kelulusan
     */
    public function model(array $row)
    {
        return new Kelulusan([
            'sekolah_id'     => \Auth::user()->sekolah->id,
            'username'    => $row[1],
            'keterangan' => $row[6],
            'daftarulang' => $row[5]
        ]);
    }

    public function startRow(): int
    {
        return '9';
    }
}
