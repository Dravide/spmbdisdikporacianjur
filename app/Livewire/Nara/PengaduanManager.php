<?php

namespace App\Livewire\Nara;

use App\Models\Pengaduan;
use App\Models\Sekolah;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class PengaduanManager extends Component
{
    use WithPagination;
    
    #[Layout('components.nara.apps')]
    
    public $search = '';
    public $filterStatus = '';
    public $filterTujuan = '';
    public $pengaduanId;
    public $tanggapan;
    public $showModal = false;
    public $currentPengaduan;
    public $confirmingDeletion = false;
    public $deleteId;
    
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
    
    public function updatedFilterTujuan()
    {
        $this->resetPage();
    }
    
    public function resetFilters()
    {
        $this->reset(['search', 'filterStatus', 'filterTujuan']);
        $this->resetPage();
    }
    
    public function openModal($id)
    {
        $this->pengaduanId = $id;
        $this->currentPengaduan = Pengaduan::with('sekolah')->find($id);
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
        
        $pengaduan = Pengaduan::find($this->pengaduanId);
        
        if ($pengaduan) {
            $pengaduan->update([
                'tanggapan' => $this->tanggapan,
                'status' => 'selesai',
                'tanggal_tanggapan' => now(),
                'admin_id' => Auth::id(),
            ]);
            
            session()->flash('message', 'Tanggapan berhasil dikirim!');
            
            $this->closeModal();
        }
    }
    
    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDeletion = true;
    }
    
    public function cancelDelete()
    {
        $this->confirmingDeletion = false;
        $this->deleteId = null;
    }
    
    public function deletePengaduan()
    {
        if ($this->deleteId) {
            Pengaduan::destroy($this->deleteId);
            session()->flash('message', 'Pengaduan berhasil dihapus!');
            $this->confirmingDeletion = false;
            $this->deleteId = null;
        }
    }
    
    public function render()
    {
        $query = Pengaduan::with('sekolah')
            ->orderBy('created_at', 'desc');
            
        if ($this->filterTujuan === 'dinas') {
            $query->where('tujuan_dinas', true);
        } elseif ($this->filterTujuan === 'sekolah') {
            $query->where('tujuan_dinas', false);
        }
        
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
        $sekolahList = Sekolah::pluck('nama_sekolah', 'id');
        
        return view('livewire.nara.pengaduan-manager', [
            'pengaduan' => $pengaduan,
            'sekolahList' => $sekolahList
        ]);
    }
}