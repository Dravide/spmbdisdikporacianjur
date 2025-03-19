<?php

namespace App\View\Components\Pendaftaran\Berkas;

use App\Models\DataNilai;
use App\Models\Verval;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BuktiRanking extends Component{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function render(): View{
//        Data Awal
//        $datajson = Verval::where('id', $this->id)->first();
//        if ($datajson->data == null) {
//            return view('components.pendaftaran.berkas.bukti-ranking')->with(['hasil' => null]);
//        }
//        dd($datajson);
//        $hasil = [];
//        foreach (json_decode($datajson->data) as $d) {
//            $hasil[] = $d;
//        }
//
//        return view('components.pendaftaran.berkas.bukti-ranking')->with(compact('hasil'));

        // New Data
        $status5sm1 = DataNilai::where('verval_id', $this->id)->where('key', '5sm1')->first();
        $status5sm2 = DataNilai::where('verval_id', $this->id)->where('key', '5sm2')->first();
        $status6sm1 = DataNilai::where('verval_id', $this->id)->where('key', '6sm1')->first();

        $hasil5sm1 = $status5sm1 == null ? '' : $hasil5sm1 = $status5sm1->value;
        $hasil5sm2 = $status5sm2 == null ? '' : $hasil5sm2 = $status5sm2->value;
        $hasil6sm1 = $status6sm1 == null ? '' : $hasil6sm1 = $status6sm1->value;

        return view('components.pendaftaran.berkas.bukti-ranking')->with(compact('hasil5sm1', 'hasil5sm2', 'hasil6sm1'));
//        dd($status5sm1->value);
//        dd($this->id);
    }
}
