<?php

namespace App\Http\Controllers\Nara;

use App\Http\Controllers\Controller;
use App\Models\SekolahAsal;

class SekolahDasar extends Controller
{
    public function index()
    {
        $sekolahs = SekolahAsal::paginate('25');
        return view('nara.sekolah-dasar.index')->with(compact('sekolahs'));
    }
}
