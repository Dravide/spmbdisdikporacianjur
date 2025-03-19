<?php

namespace App\View\Components\Pendaftaran\Berkas;

use App\Models\Verval;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Afirmasi extends Component
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function render(): View
    {
        $datajson = Verval::where('id', $this->id)->first();
        return view('components.pendaftaran.berkas.afirmasi')->with(['hasil' => $datajson->DataNilai->toArray()]);

    }

}
