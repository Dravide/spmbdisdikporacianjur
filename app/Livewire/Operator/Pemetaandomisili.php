<?php

namespace App\Livewire\Operator;

use Exception;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\PemetaanDomisiliImport;
use Maatwebsite\Excel\Facades\Excel;

class Pemetaandomisili extends Component
{
    use WithFileUploads;

    #[Rule('required', message: 'Kecamatan Tidak Boleh Kosong')]
    public $kecamatan;

    #[Rule('required', message: 'Desa Tidak Boleh Kosong')]
    public $desa;

    #[Rule('required', message: 'RT Tidak Boleh Kosong')]
    public $rt;

    #[Rule('required', message: 'RW Tidak Boleh Kosong')]
    public $rw;

    // Add file upload property
    #[Rule('required|mimes:xlsx,xls|max:2048', message: 'File harus berupa excel dan maksimal 2MB')]
    public $importFile;

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
    public $isImporting = false;

    public function mount()
    {
        // Mengambil data kecamatan saat komponen di-mount
        $this->getKecamatan();

        // Mengambil data pemetaan domisili yang sudah ada
        $this->refreshData();
    }

    public function getKecamatan()
    {
        // Mengambil data kecamatan dari database lokal khusus Kabupaten Cianjur
        // Kode untuk Kabupaten Cianjur adalah '32.03'
        $kecamatans = \App\Models\Kecamatan::where('code', 'like', '32.03.%')->get();
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
                
                // Dispatch events to ensure the UI updates correctly
                $this->dispatch('desaSelected', ['value' => $kelurahanValue]);
                
                // Add this line to force the select element to update with the correct value
                $this->dispatch('updateDesaSelect', ['value' => $kelurahanValue]);
            }
            
            // Show the modal
            $this->dispatch('showFormModal');
            
            // Add a small delay to ensure the DOM is ready before updating the select
            $this->dispatch('initializeSelects');
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
    
    // Add the missing resetForm method
    private function resetForm()
    {
        $this->isEditing = false;
        $this->editId = null;
        $this->reset(['rt', 'rw', 'desa']);
        $this->selectedKecamatanCode = '';
        $this->kecamatan = '';
        $this->selectedDesaName = '';
        $this->selectedKecamatanName = '';
        $this->listDesa = [];
        $this->isImporting = false;
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
    
    // Fix the save method to handle possible errors
    public function save()
    {
        try {
            // Only validate the form fields needed for saving, not importFile
            $this->validate([
                'kecamatan' => 'required',
                'desa' => 'required',
                'rt' => 'required',
                'rw' => 'required',
            ], [
                'kecamatan.required' => 'Kecamatan Tidak Boleh Kosong',
                'desa.required' => 'Desa Tidak Boleh Kosong',
                'rt.required' => 'RT Tidak Boleh Kosong',
                'rw.required' => 'RW Tidak Boleh Kosong',
            ]);
            
            // Debug information
            $userData = auth()->user() ? 'User authenticated' : 'User not authenticated';
            $sekolahData = auth()->user() && auth()->user()->sekolah ? 'Sekolah found' : 'Sekolah not found';
            
            // Log debug information
            \Illuminate\Support\Facades\Log::info("Save attempt: $userData, $sekolahData");
            \Illuminate\Support\Facades\Log::info("Form data: " . json_encode([
                'kecamatan' => $this->kecamatan,
                'desa' => $this->desa,
                'rt' => $this->rt,
                'rw' => $this->rw
            ]));
            
            // Check if auth()->user()->sekolah exists
            if (!auth()->user()) {
                throw new Exception('User tidak terautentikasi');
            }
            
            if (!auth()->user()->sekolah) {
                throw new Exception('Data sekolah tidak ditemukan untuk user ini');
            }
            
            // Create the record with detailed error handling
            $pemetaan = \App\Models\PemetaanDomisili::create([
                'npsn' => auth()->user()->sekolah->npsn,
                'kecamatan' => $this->kecamatan,
                'kelurahan' => $this->desa,
                'rt' => $this->rt,
                'rw' => $this->rw
            ]);
            
            if (!$pemetaan) {
                throw new Exception('Gagal membuat record baru');
            }

            session()->flash('success', 'Data berhasil disimpan');
            $this->resetForm();
            $this->refreshData();
            
            // Close the modal after successful save
            $this->dispatch('hideFormModal');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            $errorMessages = [];
            foreach ($e->errors() as $field => $messages) {
                // Map field names to more readable names
                $fieldName = match($field) {
                    'kecamatan' => 'Kecamatan',
                    'desa' => 'Desa/Kelurahan',
                    'rt' => 'RT',
                    'rw' => 'RW',
                    default => ucfirst($field)
                };
                
                // Replace generic validation messages with more specific ones
                $formattedMessages = array_map(function($message) use ($fieldName) {
                    if ($message === 'validation.required') {
                        return "$fieldName tidak boleh kosong";
                    }
                    return $message;
                }, $messages);
                
                $errorMessages[] = implode(', ', $formattedMessages);
            }
            session()->flash('error', 'Validasi gagal: ' . implode('; ', $errorMessages));
            \Illuminate\Support\Facades\Log::error('Validation error: ' . json_encode($e->errors()));
        } catch (Exception $e) {
            // Handle other exceptions
            session()->flash('error', 'Gagal menyimpan data: ' . $e->getMessage());
            \Illuminate\Support\Facades\Log::error('Save error: ' . $e->getMessage());
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
    
    // Add this method to handle file import
    public function importExcel()
    {
        $this->validate([
            'importFile' => 'required|mimes:xlsx,xls|max:2048'
        ]);

        try {
            Excel::import(new PemetaanDomisiliImport, $this->importFile);
            
            session()->flash('success', 'Data berhasil diimpor');
            $this->reset('importFile');
            $this->isImporting = false;
            $this->refreshData();
        } catch (Exception $e) {
            session()->flash('error', 'Gagal mengimpor data: ' . $e->getMessage());
        }
    }

    // Add this method to toggle import form
    public function toggleImportForm()
    {
        $this->isImporting = !$this->isImporting;
        $this->reset('importFile');
    }

    // Add this method to download template
    public function downloadTemplate()
    {
        return response()->download(public_path('templates/pemetaan_domisili_template.xlsx'));
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
