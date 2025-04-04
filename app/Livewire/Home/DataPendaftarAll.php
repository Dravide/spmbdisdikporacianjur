<?php

namespace App\Livewire\Home;

use App\Models\DataPendaftar as ModelsDataPendaftar;
use App\Models\Sekolah;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class DataPendaftarAll extends Component
{
    use WithPagination, WithoutUrlPagination;
    
    #[Layout('components.home.guest')]
    #[Title('Data Pendaftar')]
    
    protected $paginationTheme = 'bootstrap';
    
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
        ];
        $this->resetPage();
    }

    public $filterJalur = '';
    public $jalurList = [];

    public function updatedFilterJalur()
    {
        $this->resetPage();
    }
    
    public $filterStatus = '';
    
    public function updatedFilterStatus()
    {
        $this->resetPage();
    }
    
    public function resetAllFilters()
    {
        $this->reset(['search', 'filterSekolah', 'filterJalur', 'filterStatus', 'searchFields']);
    }
    
    public function mount()
    {
        // Get all schools
        $this->sekolahList = Sekolah::where('status_online', 'online')->orderBy('nama_sekolah')->get();
            
        // Get unique jalur options
        $this->jalurList = \App\Models\Jalur::orderBy('nama_jalur')->get();
    }

    public function render()
    {
        $query = ModelsDataPendaftar::with(['users', 'dapodik', 'asal_sekolah', 'jalur', 'sekolah']);
            
        if (!empty($this->filterSekolah)) {
            $query->where('id_sekolah', $this->filterSekolah);
        }
        
        // Add filter for jalur
        if (!empty($this->filterJalur)) {
            $query->where('id_jalur', $this->filterJalur);
        }
        
        // Add filter for status
        if (!empty($this->filterStatus)) {
            switch ($this->filterStatus) {
                case 'belum_konfirmasi':
                    $query->where('konfir', '0')->where('verval', '0');
                    break;
                case 'siap_diperiksa':
                    $query->where('konfir', '1')->where('verval', '0');
                    break;
                case 'perbaikan':
                    $query->where(function($q) {
                        $q->where(function($sq) {
                            $sq->where('konfir', '2')->where('verval', '2');
                        })->orWhere(function($sq) {
                            $sq->where('konfir', '1')->where('verval', '2');
                        });
                    });
                    break;
                case 'selesai':
                    $query->where(function($q) {
                        $q->where(function($sq) {
                            $sq->whereNotIn('konfir', ['0', '1', '2'])
                               ->orWhere(function($ssq) {
                                   $ssq->whereNotIn('verval', ['0', '2']);
                               });
                        });
                    });
                    break;
            }
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
        
        $datapendaftar = $query->orderBy('created_at', 'desc')->paginate(25);
        
        // Get statistics
        $totalPendaftar = ModelsDataPendaftar::count();
        $totalSekolah = Sekolah::where('status_online', 'online')->count();
        $totalJalur = \App\Models\Jalur::count();
        
    
        return view('livewire.home.data-pendaftar-all', [
            'datapendaftar' => $datapendaftar,
            'totalPendaftar' => $totalPendaftar,
            'totalSekolah' => $totalSekolah,
            'totalJalur' => $totalJalur
        ]);
    }

    public function getStatusHtml($pendaftar)
    {
        if($pendaftar->konfir == '0' && $pendaftar->verval == '0') {
            return '<i class="mdi mdi-checkbox-blank-circle text-danger me-1"></i> Belum Konfimasi';
        } elseif ($pendaftar->konfir == '1' && $pendaftar->verval == '0') {
            return '<i class="mdi mdi-checkbox-blank-circle text-success me-1"></i> Siap Diperiksa';
        } elseif ($pendaftar->konfir == '2' && $pendaftar->verval == '2') {
            return '<i class="mdi mdi-checkbox-blank-circle text-warning me-1"></i> Perbaikan';
        } elseif ($pendaftar->konfir == '1' && $pendaftar->verval == '2') {
            return '<i class="mdi mdi-checkbox-blank-circle text-warning me-1"></i> Perbaikan';
        } else {
            return '<i class="mdi mdi-check-decagram-outline text-info me-1"></i> Selesai';
        }
    }
}