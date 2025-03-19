<?php

namespace App\Http\Controllers\operator;

use App\DataTables\DataPendaftarDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataPendaftar extends Controller
{
    public function index(DataPendaftarDataTable $dataTable)
    {
        return $dataTable
            ->with('id', Auth::user()->sekolah->id)
            ->render('operator.datapendaftar');
    }
}
