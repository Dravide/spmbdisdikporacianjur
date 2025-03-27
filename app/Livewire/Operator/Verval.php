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
    public $jalur;
    public $search = '';
    public $filterSekolah = '';
    public $sekolahList = [];
    public $showSearchModal = false;
    
    public $searchFields = [
        'username' => false,
        'nisn' => false,
        'nama' => true,
        'asal_sekolah' => false,
        'jalur' => false
    ];

    // Remove these lines
    // public $filterJalur = '';
    // public $jalurList = [];
    public $filterStatus = '';

    // Add status update methods
    public function updatedFilterStatus()
    {
        $this->resetPage();
    }
    
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

    public function resetAllFilters()
    {
        $this->reset(['search', 'filterSekolah', 'filterStatus', 'searchFields']);
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
            
        // Remove this line
        // $this->jalurList = \App\Models\Jalur::orderBy('nama_jalur')->get();
    }

    public function getStatusCounts()
    {
        return [
            'total' => ModelsDataPendaftar::where('id_sekolah', $this->id)
                ->where('id_jalur', $this->jalur)
                ->count(),
            'belum_verifikasi' => ModelsDataPendaftar::where('id_sekolah', $this->id)
                ->where('id_jalur', $this->jalur)
                ->where('verval', '0')
                ->count(),
            'perbaikan' => ModelsDataPendaftar::where('id_sekolah', $this->id)
                ->where('id_jalur', $this->jalur)
                ->where('verval', '2')
                ->count(),
            'selesai' => ModelsDataPendaftar::where('id_sekolah', $this->id)
                ->where('id_jalur', $this->jalur)
                ->where('verval', '1')
                ->count(),
        ];
    }

    public function render()
    {
        $query = ModelsDataPendaftar::with(['users', 'dapodik', 'asal_sekolah', 'jalur'])
            ->where('id_sekolah', $this->id)
            ->where('id_jalur', $this->jalur);
            
        if (!empty($this->filterSekolah)) {
            $query->whereHas('asal_sekolah', function($q) {
                $q->where('id', $this->filterSekolah);
            });
        }

        // Remove this block
        // if (!empty($this->filterJalur)) {
        //     $query->where('id_jalur', $this->filterJalur);
        // }

        // Add filter for status
        if (!empty($this->filterStatus)) {
            switch ($this->filterStatus) {
                case 'belum_verifikasi':
                    $query->where('verval', '0');
                    break;
                case 'perbaikan':
                    $query->where('verval', '2');
                    break;
                case 'selesai':
                    $query->where('verval', '1');
                    break;
            }
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
            'datapendaftar' => $datapendaftar,
            'statusCounts' => $this->getStatusCounts() // Add this line
        ]);
    }

    public function getStatusHtml($pendaftar)
    {
        if ($pendaftar->verval == '0') {
            return '<i class="mdi mdi-checkbox-blank-circle text-warning me-1"></i> Belum Verifikasi';
        } elseif ($pendaftar->verval == '2') {
            return '<i class="mdi mdi-checkbox-blank-circle text-danger me-1"></i> Perbaikan';
        } else {
            return '<i class="mdi mdi-check-decagram-outline text-success me-1"></i> Selesai';
        }
    }
}
