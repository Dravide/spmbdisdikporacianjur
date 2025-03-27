<?php

namespace App\Livewire\Operator;

use Livewire\Component;

class UnduhExcel extends Component
{
    public function downloadZonasi()
    {
        return redirect()->route('operator.excel.zonasi');
    }

    public function downloadRanking()
    {
        return redirect()->route('operator.excel.ranking');
    }

    public function downloadRaport()
    {
        return redirect()->route('operator.excel.raport');
    }

    public function downloadPana()
    {
        return redirect()->route('operator.excel.pana');
    }

    public function downloadTahfidz()
    {
        return redirect()->route('operator.excel.tahfidz');
    }

    public function downloadAfirmasi()
    {
        return redirect()->route('operator.excel.afirmasi');
    }

    public function downloadPindahTugas()
    {
        return redirect()->route('operator.excel.pindahtugas');
    }

    public function downloadAnakGuru()
    {
        return redirect()->route('operator.excel.anakguru');
    }

    public function render()
    {
        return view('livewire.operator.unduh-excel');
    }
}