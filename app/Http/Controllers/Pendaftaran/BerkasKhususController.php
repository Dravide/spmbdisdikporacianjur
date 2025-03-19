<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Berkas;
use App\Models\Jalur;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class BerkasKhususController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {

        $berkastambahan = Berkas::where('jenis_berkas', 3)->get();

        if (Auth::user()->dataPendaftar['id_jalur'] == null) {
            $d = null;
        } else {

            $berkas = Jalur::find(auth()->user()->dataPendaftar->id_jalur)->berkas;
            $khusus = Berkas::where('jenis_berkas', 2)->get();
            $hasil = [];
            foreach ($khusus as $d) {
                $hasil[] = "$d->id";
            }

            $berkaskhusus = array_intersect($hasil, $berkas);
            $eh = [];
            foreach ($berkaskhusus as $key => $value) {
                $eh[] = $value;
            }
            $d = Berkas::whereIn('id', $eh)->get();
        }

        return view('pendaftaran.berkaskhusus')->with(compact('berkastambahan', 'd'));

    }
}
