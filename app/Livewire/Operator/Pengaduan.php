<?php

namespace App\Livewire\Operator;

use App\Models\Pengaduan as ModelsPengaduan;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Pengaduan extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    #[Layout('components.operator.apps')]
    #[Title('Pengaduan')]  
    public $search = '';
    public $filterStatus = '';
    public $pengaduanId;
    public $tanggapan;
    public $showModal = false;
    public $currentPengaduan;
    
    protected $rules = [
        'tanggapan' => 'required|min:10',
    ];
    
    protected $messages = [
        'tanggapan.required' => 'Tanggapan harus diisi',
        'tanggapan.min' => 'Tanggapan minimal 10 karakter',
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
    
    public function openModal($id)
    {
        $this->pengaduanId = $id;
        $this->currentPengaduan = ModelsPengaduan::find($id);
        $this->tanggapan = $this->currentPengaduan->tanggapan ?? '';
        $this->showModal = true;
    }
    
    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['pengaduanId', 'tanggapan', 'currentPengaduan']);
    }
    
    public function submitTanggapan()
    {
        $this->validate();
        
        $pengaduan = ModelsPengaduan::find($this->pengaduanId);
        
        if ($pengaduan) {
            $pengaduan->update([
                'tanggapan' => $this->tanggapan,
                'status' => 'selesai',
                'tanggal_tanggapan' => now(),
                'operator_id' => Auth::id(),
            ]);
            
            $this->dispatch('alert', [
                'type' => 'success',
                'message' => 'Tanggapan berhasil dikirim!'
            ]);
            
            $this->closeModal();
        }
    }
    
    public function render()
    {
        $sekolahId = Auth::user()->sekolah->id;
        
        $query = ModelsPengaduan::where('tujuan_id', $sekolahId)
            ->where('tujuan_dinas', false)
            ->orderBy('created_at', 'desc');
        
        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%')
                  ->orWhere('subjek', 'like', '%' . $this->search . '%')
                  ->orWhere('pesan', 'like', '%' . $this->search . '%');
            });
        }
        
        if (!empty($this->filterStatus)) {
            $query->where('status', $this->filterStatus);
        }
        
        $pengaduan = $query->paginate(10);
        
        return view('livewire.operator.pengaduan', [
            'pengaduan' => $pengaduan
        ]);
    }
}