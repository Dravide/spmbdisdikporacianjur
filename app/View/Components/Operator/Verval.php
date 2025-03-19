<?php

namespace App\View\Components\Operator;

use App\Models\Berkas;
use App\Models\Jalur;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Verval extends Component
{
    public $jalur;
    public $id;

    public function __construct($jalur, $id)
    {
        $this->jalur = $jalur;
        $this->id = $id;
    }

    public function render(): View
    {
        $jalur = Jalur::find($this->jalur);
        $hasil = [];
        foreach ($jalur->berkas as $data) {
            $berkas = Berkas::find($data);
            $verval = \App\Models\Verval::where('id_berkas', $data)->where('id_pendaftar', $this->id)->first();
            $hasil[$berkas->nama_berkas] = \App\Models\Verval::where('id_berkas', $data)->where('id_pendaftar', $this->id)->first();
        }
        return view('components.operator.verval')->with(compact('hasil'));
    }
}
