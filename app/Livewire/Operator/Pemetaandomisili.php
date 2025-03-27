<?php

namespace App\Livewire\Operator;

use Exception;
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
        // Mengambil data kecamatan dari database lokal
        $kecamatans = \App\Models\Kecamatan::all();
        $this->listKecamatan = $kecamatans->map(function($kecamatan) {
            return [
                'code' => $kecamatan->code,
                'name' => $kecamatan->name
            ];
        })->toArray();
    }

    public function refreshData()
    {
        // Mengambil data pemetaan domisili yang sudah ada
        $this->pemetaanDomisili = \App\Models\PemetaanDomisili::latest()->get();
    }

    public function updatedSelectedKecamatanCode($value)
    {
        $this->listDesa = [];
        
        // Simpan nilai desa saat ini jika dalam mode edit
        $currentDesa = $this->isEditing ? $this->desa : '';
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
            
            // Jika dalam mode edit dan nilai desa sebelumnya ada, coba pertahankan
            if ($this->isEditing && !empty($currentDesa)) {
                // Cek apakah desa ada dalam list baru
                $desaExists = collect($this->listDesa)->contains('name', $currentDesa);
                
                if (!$desaExists) {
                    // Jika tidak ada, tambahkan ke list
                    array_unshift($this->listDesa, ['code' => 'custom-'.time(), 'name' => $currentDesa]);
                }
                
                // Kembalikan nilai desa
                $this->desa = $currentDesa;
                $this->selectedDesaName = $currentDesa;
            }
        }
    }

    public function getDesa($kecamatanCode)
    {
        // Mengambil data desa dari database lokal
        $desas = \App\Models\Desa::where('kecamatan_code', $kecamatanCode)->get();
        $this->listDesa = $desas->map(function($desa) {
            return [
                'code' => $desa->code,
                'name' => $desa->name
            ];
        })->toArray();
        
        // Jika tidak ada data desa di database, tambahkan opsi untuk input manual
        if (count($this->listDesa) == 0) {
            $this->listDesa[] = ['code' => 'manual', 'name' => '-- Input Manual --'];
        }
    }

    public function updatedDesa($value)
    {
        $this->selectedDesaName = $value;
        
        // Jika user memilih input manual, tampilkan input field untuk nama desa
        if ($value === '-- Input Manual --') {
            $this->dispatch('showManualDesaInput');
        }
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
                
                // Get desa data - this will populate listDesa
                $this->getDesa($kecamatan['code']);
                
                // Check if the kelurahan exists in the list
                $desaExists = collect($this->listDesa)->contains('name', $kelurahanValue);
                
                if ($desaExists) {
                    // If it exists in the list, set it normally
                    $this->desa = $kelurahanValue;
                } else {
                    // If it doesn't exist in the list, we need to add it to the list
                    // Add the custom desa to the beginning of the array for better visibility
                    array_unshift($this->listDesa, ['code' => 'custom-'.time(), 'name' => $kelurahanValue]);
                    $this->desa = $kelurahanValue;
                }
                
                // Force update the selectedDesaName
                $this->selectedDesaName = $kelurahanValue;
                
                // Dispatch an event to ensure the UI updates correctly
                $this->dispatch('desaSelected', ['value' => $kelurahanValue]);
            }
            
            // Show the modal
            $this->dispatch('showFormModal');
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
        $this->selectedDesaName = '';
        $this->selectedKecamatanName = '';
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
    #[\Livewire\Attributes\On('delete')]
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
