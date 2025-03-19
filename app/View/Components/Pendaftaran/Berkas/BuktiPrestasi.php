<?php

namespace App\View\Components\Pendaftaran\Berkas;

use App\Models\Verval;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BuktiPrestasi extends Component
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function render(): View
    {
        $hasil = Verval::where('id', $this->id)->first();
        return view('components.pendaftaran.berkas.bukti-prestasi')->with(compact('hasil'));
    }
}
