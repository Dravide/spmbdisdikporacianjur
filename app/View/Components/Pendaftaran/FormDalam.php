<?php

namespace App\View\Components\Pendaftaran;

use App\Models\DataPendaftar;
use App\Models\Jalur;
use App\Models\Tambahan;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormDalam extends Component
{
    public function render(): View
    {
        $pekerjaan = Tambahan::where('key', 'pekerjaan')->get();
        $penghasilan = Tambahan::where('key', 'penghasilan')->get();
        $jalur = Jalur::all();

        $datas = DataPendaftar::where('id_users', auth()->user()->id)->first();
        $datasiswa = json_decode($datas->data, true);
        return view('components.pendaftaran.form-dalam')->with(compact(['pekerjaan', 'penghasilan', 'jalur', 'datasiswa', 'datas']));
    }
}
