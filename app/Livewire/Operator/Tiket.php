<?php

namespace App\Livewire\Operator;

use App\Models\Tiket as ModelsTiket;
use App\Models\DataPendaftar;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Tiket extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    #[Layout('components.operator.apps')]
    #[Title('Tiket')]  
    
    public $search = '';
    public $filterStatus = '';
    public $showModal = false;
    public $jenis_tiket = '';
    public $deskripsi = '';
    public $nisn = '';
    public $nama_siswa = '';
    public $tiketId;
    public $currentTiket;
    
    protected $rules = [
        'jenis_tiket' => 'required',
        'deskripsi' => 'required|min:10',
        'nisn' => 'required|digits:10',
        'nama_siswa' => 'required'
    ];
    
    protected $messages = [
        'jenis_tiket.required' => 'Jenis tiket harus dipilih',
        'deskripsi.required' => 'Deskripsi harus diisi',
        'deskripsi.min' => 'Deskripsi minimal 10 karakter',
        'nisn.required' => 'NISN harus diisi',
        'nisn.digits' => 'NISN harus 10 digit',
        'nama_siswa.required' => 'Nama siswa harus diisi',
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    public function updatedFilterStatus()
    {
        $this->resetPage();
    }
    
    public function resetFilters()
    {
        $this->reset(['search', 'filterStatus']);
        $this->resetPage();
    }
    
    // Update the openModal method
    public function openModal()
    {
        $this->reset(['jenis_tiket', 'deskripsi', 'nisn', 'nama_siswa']);
        $this->showModal = true;
        $this->dispatch('openModal');
    }
    
    // Update the closeModal method
    public function closeModal()
    {
        $this->showModal = false;
        $this->dispatch('closeModal');
    }
    
    // Update the createTiket method
    public function createTiket()
    {
        $this->validate();
        
        ModelsTiket::create([
            'jenis_tiket' => $this->jenis_tiket,
            'deskripsi' => $this->deskripsi,
            'nisn' => $this->nisn,
            'nama_siswa' => $this->nama_siswa,
            'status' => 'pending',
            'operator_id' => Auth::id(),
            'sekolah_id' => Auth::user()->sekolah->id
        ]);
    
        $this->reset(['jenis_tiket', 'deskripsi', 'nisn', 'nama_siswa']);
        $this->dispatch('closeModal');
        
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Tiket berhasil dibuat!'
        ]);
    }
    
    public function viewTiket($id)
    {
        $this->tiketId = $id;
        $this->currentTiket = ModelsTiket::find($id);
        $this->dispatch('openDetailModal');
    }
    
    public function cancelTiket($id)
    {
        $tiket = ModelsTiket::find($id);
        
        if ($tiket && $tiket->status === 'pending') {
            $tiket->update([
                'status' => 'rejected',
                'catatan_admin' => 'Dibatalkan oleh operator',
                'processed_at' => now()
            ]);
            
            $this->dispatch('alert', [
                'type' => 'success',
                'message' => 'Tiket berhasil dibatalkan!'
            ]);
        }
    }

    public function render()
    {
        $query = ModelsTiket::where('sekolah_id', Auth::user()->sekolah->id)
            ->orderBy('created_at', 'desc');
            
        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('nisn', 'like', '%' . $this->search . '%')
                  ->orWhere('nama_siswa', 'like', '%' . $this->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $this->search . '%');
            });
        }
        
        if (!empty($this->filterStatus)) {
            $query->where('status', $this->filterStatus);
        }
        
        $tikets = $query->paginate(10);
        
        // Get list of students for autocomplete
        $students = DataPendaftar::where('id_sekolah', Auth::user()->sekolah->id)
            ->with('dapodik')
            ->get();
        
        return view('livewire.operator.tiket', [
            'tikets' => $tikets,
            'students' => $students
        ]);
    }
}