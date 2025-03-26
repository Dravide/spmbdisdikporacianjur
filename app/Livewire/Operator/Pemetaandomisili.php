<?php

namespace App\Livewire\Operator;

use Exception;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Pemetaandomisili extends Component
{
    #[Rule('required', message: 'Kecamatan Tidak Boleh Kosong')]
    public $kecamatan;

    #[Rule('required', message: 'Desa Tidak Boleh Kosong')]
    public $desa;

    #[Rule('required', message: 'RT Tidak Boleh Kosong')]
    public $rt;

    #[Rule('required', message: 'RW Tidak Boleh Kosong')]
    public $rw;

    public $listKecamatan = [];
    public $listDesa = [];
    public $selectedKecamatanCode = '';
    public $selectedKecamatanName = '';
    public $selectedDesaName = '';

    public $pemetaanDomisili = [];

    public function mount()
    {
        // Mengambil data kecamatan saat komponen di-mount
        $this->getKecamatan();

        // Mengambil data pemetaan domisili yang sudah ada
        $this->refreshData();
    }

    public function getKecamatan()
    {
        try {
            $response = Http::get('https://wilayah.id/api/districts/32.03.json');

            if ($response->successful()) {
                $this->listKecamatan = $response->json()['data'];
            }
        } catch (Exception $e) {
            session()->flash('error', 'Gagal mengambil data kecamatan: ' . $e->getMessage());
        }
    }

    public function refreshData()
    {
        // Mengambil data pemetaan domisili yang sudah ada
        $this->pemetaanDomisili = \App\Models\PemetaanDomisili::latest()->get();
    }

    public function updatedSelectedKecamatanCode($value)
    {
        $this->listDesa = [];
        $this->desa = '';

        if (!empty($value)) {
            // Mencari nama kecamatan berdasarkan kode yang dipilih
            $selectedKecamatan = collect($this->listKecamatan)->firstWhere('code', $value);
            if ($selectedKecamatan) {
                $this->selectedKecamatanName = $selectedKecamatan['name'];
                $this->kecamatan = $selectedKecamatan['name'];
            }

            // Mengambil data desa berdasarkan kode kecamatan
            $this->getDesa($value);
        }
    }

    public function getDesa($kecamatanCode)
    {
        try {
            $response = Http::get("https://wilayah.id/api/villages/{$kecamatanCode}.json");

            if ($response->successful()) {
                $this->listDesa = $response->json()['data'];
            }
        } catch (Exception $e) {
            session()->flash('error', 'Gagal mengambil data desa: ' . $e->getMessage());
        }
    }

    public function updatedDesa($value)
    {
        $this->selectedDesaName = $value;
    }

    public function render()
    {
        return view('livewire.operator.pemetaandomisili');
    }

    public function save()
    {
        $this->validate();

        try {
            \App\Models\PemetaanDomisili::create([
                'npsn' => auth()->user()->sekolah->npsn,
                'kecamatan' => $this->kecamatan,
                'kelurahan' => $this->desa,
                'rt' => $this->rt,
                'rw' => $this->rw
            ]);

            session()->flash('success', 'Data berhasil disimpan');

            // Reset form setelah berhasil disimpan
            $this->reset(['rt', 'rw']);
            $this->selectedKecamatanCode = '';
            $this->desa = '';
            $this->kecamatan = '';
            $this->listDesa = [];

            // Refresh data setelah penyimpanan
            $this->refreshData();
        } catch (Exception $e) {
            session()->flash('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }
}
