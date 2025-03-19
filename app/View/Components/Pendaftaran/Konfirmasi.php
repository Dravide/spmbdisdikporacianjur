<?php

namespace App\View\Components\Pendaftaran;

use App\Models\Jalur;
use App\Models\Verval;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Konfirmasi extends Component
{
    public $id;
    public $jalur;

    public function __construct($id, $jalur)
    {
        $this->id = $id;
        $this->jalur = $jalur;
    }

    public function render(): View
    {
        $data = Verval::where('id_pendaftar', $this->id)->
        where('deleted_at', null)
            ->get('id_berkas')->toArray();
        $jalur = Jalur::where('id', $this->jalur)->get('berkas')->toArray();
        foreach ($data as $value) {
            $hasil[$value['id_berkas']] = $value['id_berkas'];
        }
        foreach ($jalur as $value) {
            foreach ($value['berkas'] as $key => $value) {
                $ekor[$value] = $value;
            }
        }
        if (isset($ekor)) {
            $ekors = $ekor;
        } else {

            $ekors = [];
        }

        if (isset($hasil)) {
            $hasils = $hasil;
        } else {
            $hasils = [];
        }
        $jumlahberkas = count($ekors);
        $jumlah = count(array_intersect_key($hasils, $ekors));

        return view('components.pendaftaran.konfirmasi')->with(compact(['jumlah', 'jumlahberkas']));

    }
}
