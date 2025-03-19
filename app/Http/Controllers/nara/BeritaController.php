<?php

namespace App\Http\Controllers\nara;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function berita() {
        $berita = Berita::all();
        $data = [
            'data' => $berita,
        ];
        return view('nara.berita')->with($data);
    }

    public function add_berita()
    {
        return view('nara.berita.add-berita');

    }
}
