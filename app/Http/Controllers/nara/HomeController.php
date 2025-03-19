<?php

namespace App\Http\Controllers\nara;

use App\Http\Controllers\Controller;
use App\Models\Jalur;
use App\Models\Sekolah;
use App\Models\User;

class HomeController extends Controller
{
    public function __invoke()
    {
        $jalur = Jalur::count();
        $sekolah = Sekolah::count();
        $pendaftar = User::where('role', 'cpdb')->count();
        return view('nara.home', compact('jalur', 'sekolah', 'pendaftar'));
    }

}
