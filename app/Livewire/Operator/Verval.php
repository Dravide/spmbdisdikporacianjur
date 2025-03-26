<?php

namespace App\Livewire\Operator;

use Livewire\Component;
use App\Models\DataPendaftar as ModelsDataPendaftar;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Verval extends Component
{
    use WithPagination, WithoutUrlPagination;
    
    protected $paginationTheme = 'bootstrap';
    
    public $id;
    public $search = '';
    public $filterSekolah = '';
    public $sekolahList = [];
    public $showSearchModal = false;
    public $jalur;
    
    public $searchFields = [
        'username' => false,
        'nisn' => false,
        'nama' => true,
        'asal_sekolah' => false,
        'jalur' => false
    ];

    public $filterJalur = '';
    public $jalurList = [];

    public function updatedFilterSekolah()
    {
        $this->resetPage();
    }
    
    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    public function updatedSearchFields()
    {
        $this->resetPage();
    }

    public function updatedFilterJalur()
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

    public function mount()
    {
        $this->sekolahList = ModelsDataPendaftar::where('id_sekolah', $this->id)
            ->select('id_sekolah_asals')
            ->distinct()
            ->with('asal_sekolah')
            ->get()
            ->pluck('asal_sekolah');
            
        $this->jalurList = \App\Models\Jalur::orderBy('nama_jalur')->get();
    }

    public function render()
    {
        $query = ModelsDataPendaftar::with(['users', 'dapodik', 'asal_sekolah', 'jalur'])
            ->where('id_sekolah', $this->id)
            ->where('id_jalur', $this->jalur)
            ->where('verval', '!=', '1'); 
            // Add this line

            // Add this line to check the generated SQL query
                
        if (!empty($this->filterSekolah)) {
            $query->whereHas('asal_sekolah', function($q) {
                $q->where('id', $this->filterSekolah);
            });
        }
        
        
        if (!empty($this->search)) {
            $query->where(function($q) {
                if ($this->searchFields['username']) {
                    $q->orWhereHas('users', function($subq) {
                        $subq->where('username', 'like', '%' . $this->search . '%');
                    });
                }
                
                if ($this->searchFields['nisn']) {
                    $q->orWhere('nisn', 'like', '%' . $this->search . '%');
                }
                
                if ($this->searchFields['nama']) {
                    $q->orWhereHas('dapodik', function($subq) {
                        $subq->where('nama', 'like', '%' . $this->search . '%');
                    });
                }
                
                if ($this->searchFields['asal_sekolah']) {
                    $q->orWhereHas('asal_sekolah', function($subq) {
                        $subq->where('nama', 'like', '%' . $this->search . '%');
                    });
                }
                
    
            });
        }
        
        $datapendaftar = $query->paginate(25);
        
        return view('livewire.operator.verval', [
            'datapendaftar' => $datapendaftar
        ]);
    }
}
