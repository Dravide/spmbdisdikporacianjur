<?php

namespace App\View\Components\Pendaftaran;

use App\Models\DataPendaftar;
use App\Models\Jalur;
use App\Models\Tambahan;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormLuar extends Component
{
    public function render(): View
    {
        $pekerjaan = Tambahan::where('key', 'pekerjaan')->get();
        $penghasilan = Tambahan::where('key', 'penghasilan')->get();
        $jalur = Jalur::all();
        $datas = DataPendaftar::where('id_users', auth()->user()->id)->first();
//        dd($datas->dapodik);
        return view('components.pendaftaran.form-luar')->with(compact(['pekerjaan', 'penghasilan', 'jalur', 'datas']));
    }
}
