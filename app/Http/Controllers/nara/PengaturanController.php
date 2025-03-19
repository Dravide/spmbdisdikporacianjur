<?php

namespace App\Http\Controllers\nara;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;

class PengaturanController extends Controller
{
    public function index()
    {
        $data = Pengaturan::get()->first();

        return view('nara.pengaturan.index')->with(compact('data'));
    }


}
