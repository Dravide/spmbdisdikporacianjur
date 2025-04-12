<?php

namespace App\Livewire\Nara;

use App\Models\Tiket;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class TiketManager extends Component
{
    use WithPagination;
    
    #[Layout('components.nara.apps')]
    
    public $search = '';
    public $filterStatus = '';
    public $filterJenis = '';
    public $tiketId;
    public $catatan_admin;
    public $showModal = false;
    public $currentTiket;
    
    protected $rules = [
        'catatan_admin' => 'required|min:5',
    ];
    
    public function render()
    {
        $tikets = Tiket::query()
            ->when($this->search, function ($query) {
                return $query->where(function ($q) {
                    $q->where('nisn', 'like', '%' . $this->search . '%')
                      ->orWhere('nama_siswa', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->filterStatus, function ($query) {
                return $query->where('status', $this->filterStatus);
            })
            ->when($this->filterJenis, function ($query) {
                return $query->where('jenis_tiket', $this->filterJenis);
            })
            ->with('sekolah', 'operator')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('livewire.nara.tiket-manager', [
            'tikets' => $tikets
        ]);
    }
    
    public function resetFilters()
    {
        $this->reset(['search', 'filterStatus', 'filterJenis']);
    }
    
    public function viewTiket($id)
    {
        $this->currentTiket = Tiket::with(['sekolah', 'operator'])->find($id);
        $this->tiketId = $id;
        $this->catatan_admin = $this->currentTiket->catatan_admin;
        $this->showModal = true;
        $this->dispatch('openDetailModal');
    }
    
    public function processTiket()
    {
        $this->validate();
        
        $tiket = Tiket::find($this->tiketId);
        $tiket->update([
            'status' => 'process',
            'catatan_admin' => $this->catatan_admin,
            'processed_at' => now(),
            'admin_id' => Auth::id()
        ]);
        
        $this->showModal = false;
        $this->dispatch('closeDetailModal');
        
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Tiket berhasil diproses!'
        ]);
    }
    
    public function completeTiket()
    {
        $this->validate();
        
        $tiket = Tiket::find($this->tiketId);
        $tiket->update([
            'status' => 'completed',
            'catatan_admin' => $this->catatan_admin,
            'completed_at' => now(),
            'admin_id' => Auth::id()
        ]);
        
        $this->showModal = false;
        $this->dispatch('closeDetailModal');
        
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Tiket berhasil diselesaikan!'
        ]);
    }
    
    public function rejectTiket()
    {
        $this->validate();
        
        $tiket = Tiket::find($this->tiketId);
        $tiket->update([
            'status' => 'rejected',
            'catatan_admin' => $this->catatan_admin,
            'processed_at' => now(),
            'admin_id' => Auth::id()
        ]);
        
        $this->showModal = false;
        $this->dispatch('closeDetailModal');
        
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Tiket berhasil ditolak!'
        ]);
    }
}