<?php

namespace App\View\Components\Pendaftaran;

use App\Models\Verval;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Berkas extends Component
{

    public $berkas;
    public $ekstensi;

    public $id;


    /**
     * Create a new component instance.
     */
    public function __construct($berkas, $ekstensi, $id)
    {
        $this->berkas = $berkas;
        $this->ekstensi = $ekstensi;
        $this->id = $id;


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|string
    {
        $data = Verval::where('id_pendaftar', auth()->user()->username)->where('id_berkas', $this->id)->first();
        return view('components.pendaftaran.berkas', compact('data'));
    }
}
