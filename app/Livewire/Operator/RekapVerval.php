<?php

namespace App\Livewire\Operator;

use Livewire\Component;
use App\Models\DataPendaftar as ModelsDataPendaftar;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class RekapVerval extends Component
{
    use WithPagination, WithoutUrlPagination;
    
    protected $paginationTheme = 'bootstrap';
    
    public $id;
    public $search = '';
    public $filterSekolah = '';
    public $sekolahList = [];
    public $showSearchModal = false;
    
    // Advanced search fields
    public $searchFields = [
        'username' => false,
        'nisn' => false,
        'nama' => true, // Default selected
        'asal_sekolah' => false,
        'jalur' => false
    ];

    // Add this method to reset pagination when filter changes
    public function updatedFilterSekolah()
    {
        $this->resetPage();
    }
    
    // Reset pagination when search changes
    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    // Reset pagination when search fields change
    public function updatedSearchFields()
    {
        $this->resetPage();
    }
    
    public function openSearchModal()
    {
        $this->dispatch('openModal');
    }
    
    public function closeSearchModal()
    {
        $this->dispatch('closeModal');
    }
    
    public function applySearch()
    {
        $this->resetPage();
    }
    
    public function resetSearch()
    {
        $this->search = '';
        $this->searchFields = [
            'username' => false,
            'nisn' => false,
            'nama' => true,
            'asal_sekolah' => false,
            'jalur' => false
        ];
        $this->resetPage();
    }

    public $filterJalur = '';
    public $jalurList = [];

    public function updatedFilterJalur()
    {
        $this->resetPage();
    }

    public function mount()
    {
        // Get unique sekolah options
        $this->sekolahList = ModelsDataPendaftar::where('id_sekolah', $this->id)
            ->select('id_sekolah_asals')
            ->distinct()
            ->with('asal_sekolah')
            ->get()
            ->pluck('asal_sekolah');
            
        // Get unique jalur options
        $this->jalurList = \App\Models\Jalur::orderBy('nama_jalur')->get();
    }

    public function render()
    {
        $query = ModelsDataPendaftar::with(['users', 'dapodik', 'asal_sekolah', 'jalur'])
            ->where('id_sekolah', $this->id)
            ->where('verval', '1'); // Added filter for verval = 1
            
        if (!empty($this->filterSekolah)) {
            $query->whereHas('asal_sekolah', function($q) {
                $q->where('id', $this->filterSekolah);
            });
        }
        
        // Add filter for jalur
        if (!empty($this->filterJalur)) {
            $query->where('id_jalur', $this->filterJalur);
        }
        
        // Apply advanced search if search term is provided
        if (!empty($this->search)) {
            $query->where(function($q) {
                // Search in username
                if ($this->searchFields['username']) {
                    $q->orWhereHas('users', function($subq) {
                        $subq->where('username', 'like', '%' . $this->search . '%');
                    });
                }
                
                // Search in NISN
                if ($this->searchFields['nisn']) {
                    $q->orWhere('nisn', 'like', '%' . $this->search . '%');
                }
                
                // Search in nama
                if ($this->searchFields['nama']) {
                    $q->orWhereHas('dapodik', function($subq) {
                        $subq->where('nama', 'like', '%' . $this->search . '%');
                    });
                }
                
                // Search in asal sekolah
                if ($this->searchFields['asal_sekolah']) {
                    $q->orWhereHas('asal_sekolah', function($subq) {
                        $subq->where('nama', 'like', '%' . $this->search . '%');
                    });
                }
                
                // Search in jalur
                if ($this->searchFields['jalur']) {
                    $q->orWhereHas('jalur', function($subq) {
                        $subq->where('nama_jalur', 'like', '%' . $this->search . '%');
                    });
                }
            });
        }
        
        $datapendaftar = $query->paginate(25);
        
        return view('livewire.operator.rekap-verval')
            ->with([
                'datapendaftar' => $datapendaftar
            ]);
    }
}
