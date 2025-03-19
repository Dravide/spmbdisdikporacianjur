<?php

namespace App\View\Components\Pendaftaran;

use App\Models\Berkas;
use App\Models\Jalur;
use App\Models\Verval;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Verifikasi extends Component
{
    public function render(): View
    {
        if (Auth::user()->dataPendaftar != null) {
            if (Auth::user()->dataPendaftar['id_jalur'] == null) {
                $data = null;
            } else {
                $jalur = Jalur::where('id', Auth::user()->dataPendaftar['id_jalur'])->first();
                $data = Berkas::whereIn('id', $jalur->berkas)->get();
            }
        } else {
            $data = null;
        }

        foreach ($data as $oke) {
            $oke->status = Verval::where('id_pendaftar', Auth::user()->username)
                ->where('id_berkas', $oke->id)
                ->where('deleted_at', null)->first()->status;
        }
        return view('components.pendaftaran.verifikasi')->with(compact('data'));

    }
}
