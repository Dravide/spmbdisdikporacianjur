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
    
    // Variables for edit and delete functionality
    public $isEditing = false;
    public $editId = null;
    public $deleteId = null;

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

    public function edit($id)
    {
        $this->isEditing = true;
        $this->editId = $id;
        
        $pemetaan = \App\Models\PemetaanDomisili::find($id);
        if ($pemetaan) {
            $this->rt = $pemetaan->rt;
            $this->rw = $pemetaan->rw;
            
            // Store the kelurahan value for later use
            $kelurahanValue = $pemetaan->kelurahan;
            
            // Find kecamatan code based on name
            $kecamatan = collect($this->listKecamatan)->firstWhere('name', $pemetaan->kecamatan);
            if ($kecamatan) {
                // Set kecamatan first
                $this->selectedKecamatanCode = $kecamatan['code'];
                $this->kecamatan = $pemetaan->kecamatan;
                
                // Get desa data
                $this->getDesa($kecamatan['code']);
                
                // Check if the kelurahan exists in the list
                $desaExists = collect($this->listDesa)->contains('name', $kelurahanValue);
                
                if ($desaExists) {
                    // If it exists in the API response, set it normally
                    $this->desa = $kelurahanValue;
                } else {
                    // If it doesn't exist in the API response, we need to add it to the list
                    $this->listDesa[] = ['name' => $kelurahanValue];
                    $this->desa = $kelurahanValue;
                }
            }
        }
    }
    
    // Add this new method to force set the desa value
    public function setDesaValue($value)
    {
        $this->desa = $value;
        $this->selectedDesaName = $value;
    }
    
    public function cancelEdit()
    {
        $this->resetForm();
    }
    
    public function update()
    {
        $this->validate();
        
        try {
            $pemetaan = \App\Models\PemetaanDomisili::find($this->editId);
            if ($pemetaan) {
                $pemetaan->update([
                    'kecamatan' => $this->kecamatan,
                    'kelurahan' => $this->desa,
                    'rt' => $this->rt,
                    'rw' => $this->rw
                ]);
                
                session()->flash('success', 'Data berhasil diperbarui');
                $this->resetForm();
                $this->refreshData();
            }
        } catch (Exception $e) {
            session()->flash('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }
    

    
    // Add a new listener method for when delete is confirmed
    #[\Livewire\Attributes\On('deleteConfirmed')]
    public function deleteConfirmed($data)
    {
        try {
            $pemetaan = \App\Models\PemetaanDomisili::find($data['id']);
            if ($pemetaan) {
                $pemetaan->delete();
                session()->flash('success', 'Data berhasil dihapus');
                $this->refreshData();
            }
        } catch (Exception $e) {
            session()->flash('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
    
    // You can remove the original delete method if you're not using it anymore
    
    private function resetForm()
    {
        $this->isEditing = false;
        $this->editId = null;
        $this->reset(['rt', 'rw']);
        $this->selectedKecamatanCode = '';
        $this->desa = '';
        $this->kecamatan = '';
        $this->listDesa = [];
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
            $this->resetForm();

            // Refresh data setelah penyimpanan
            $this->refreshData();
        } catch (Exception $e) {
            session()->flash('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }
    
    // Remove this dispatch from render method as it's not needed with SweetAlert2
    public function render()
    {
        // Remove this line:
        // $this->dispatch('registerDeleteModalEvents');
        
        return view('livewire.operator.pemetaandomisili');
    }
    
    public function confirmDelete($id)
    {
        // Store the ID to be deleted
        $this->deleteId = $id;
        
        // Dispatch the event for SweetAlert2
        $this->dispatch('showDeleteConfirmation');
    }
    
    // Add a direct delete method that will be called from the frontend
    public function delete()
    {
        try {
            $pemetaan = \App\Models\PemetaanDomisili::find($this->deleteId);
            if ($pemetaan) {
                $pemetaan->delete();
                session()->flash('success', 'Data berhasil dihapus');
                $this->refreshData();
            }
        } catch (Exception $e) {
            session()->flash('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
