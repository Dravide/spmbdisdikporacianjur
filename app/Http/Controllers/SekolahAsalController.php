<?php

namespace App\Http\Controllers;

use App\Models\SekolahAsal;
use Illuminate\Http\Request;

class SekolahAsalController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;
            $data = SekolahAsal::where('nama', 'LIKE', "%$search%")
                ->get();
        }
        $hasil = [];
        foreach ($data as $key => $value) {
            $hasil[$key]['id'] = $value->id;
            $hasil[$key]['nama_sekolah'] = "" . $value->nama . " (" . ($value->npsn) . ")";
        }
        return response()->json($hasil);
    }


}
