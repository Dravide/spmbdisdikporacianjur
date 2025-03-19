<?php

namespace App\View\Components\Pendaftaran\Berkas;

use App\Models\Verval;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RaportKelas4161 extends Component
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function render(): View
    {
        $datajson = Verval::where('id', $this->id)->first();
        return view('components.pendaftaran.berkas.raport-kelas-41-61')->with(['hasil' => $datajson->DataNilai->toArray()]);

    }
}
