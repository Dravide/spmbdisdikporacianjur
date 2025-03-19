<?php

namespace App\View\Components\Pendaftaran;

use App\Models\DataPendaftar;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Batasusia extends Component
{
    public function render(): View
    {
        $datas = DataPendaftar::where('id_users', auth()->user()->id)->first();
        $datasiswa = json_decode($datas->data, true);
        if ($datasiswa == null) {
            $tahun = null;
        } else {
            if($datas->jenis == 'luar') {
                $tahun = Carbon::createFromFormat('Y-m-d', $datasiswa['tanggal_lahir'])->diff(Carbon::parse('01/07/2023')->format('d-m-Y'))->days;
                
            } else {
                $tahun = Carbon::createFromFormat('d/m/Y', $datasiswa['tanggal_lahir'])->diff(Carbon::parse('01/07/2023')->format('d-m-Y'))->days;
            }
            
        }

        if ($tahun > 5475) {
            $usia = 1;
        } else {
            $usia = 0;
        }
        return view('components.pendaftaran.batasusia')->with(compact('usia'));
    }
}
