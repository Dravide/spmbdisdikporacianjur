<?php

namespace App\Livewire\Live;

use App\Models\DataPendaftar;
use App\Models\Jalur;
use App\Models\Sekolah;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Statistics extends Component
{
    #[Layout('components.home.guest')]
    
    public $ulid;
    public $sekolah;
    public $totalPendaftar = 0;
    public $pendaftarPerJalur = [];
    public $pendaftarPerStatus = [];
    public $chartData = [];
    public $pendaftarTerbaru = [];
    
    public function mount($ulid)
    {
        $this->ulid = $ulid;
        
        // Find school by ULID
        $this->sekolah = Sekolah::where('ulid', $ulid)->first();
        
        if (!$this->sekolah) {
            abort(404, 'Sekolah tidak ditemukan');
        }
        
        $this->loadStatistics();
    }
    
    public function loadStatistics()
    {
        // Get total registrants for this school
        $this->totalPendaftar = DataPendaftar::where('id_sekolah', $this->sekolah->id)->count();
        
        // Get registrants grouped by jalur
        $jalurList = Jalur::all();
        $this->pendaftarPerJalur = [];
        foreach ($jalurList as $jalur) {
            $count = DataPendaftar::where('id_sekolah', $this->sekolah->id)
                ->where('id_jalur', $jalur->id)
                ->count();
            
            $this->pendaftarPerJalur[] = [
                'id' => $jalur->id,
                'nama' => $jalur->nama_jalur,
                'count' => $count,
                'icon' => 'mdi-flag'
            ];
        }
        
        // Get registrants grouped by status
        $this->pendaftarPerStatus = [
            'belum_konfirmasi' => DataPendaftar::where('id_sekolah', $this->sekolah->id)
                ->where('konfir', '0')
                ->where('verval', '0')
                ->count(),
            'siap_diperiksa' => DataPendaftar::where('id_sekolah', $this->sekolah->id)
                ->where('konfir', '1')
                ->where('verval', '0')
                ->count(),
            'perbaikan' => DataPendaftar::where('id_sekolah', $this->sekolah->id)
                ->where(function($q) {
                    $q->where(function($sq) {
                        $sq->where('konfir', '2')->where('verval', '2');
                    })->orWhere(function($sq) {
                        $sq->where('konfir', '1')->where('verval', '2');
                    });
                })
                ->count(),
            'selesai' => DataPendaftar::where('id_sekolah', $this->sekolah->id)
                ->where(function($q) {
                    $q->whereNotIn('konfir', ['0', '1', '2'])
                        ->orWhere(function($sq) {
                            $sq->whereNotIn('verval', ['0', '2']);
                        });
                })
                ->count()
        ];
        
        // Get chart data for the last 14 days
        $startDate = Carbon::now()->subDays(13)->startOfDay();
        $endDate = Carbon::now()->endOfDay();
        
        $pendaftarPerHari = DataPendaftar::where('id_sekolah', $this->sekolah->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->pluck('count', 'date')
            ->toArray();
        
        $dates = [];
        $counts = [];
        
        for ($date = $startDate->copy(); $date <= $endDate; $date->addDay()) {
            $dateStr = $date->toDateString();
            $dates[] = $date->format('d M');
            $counts[] = $pendaftarPerHari[$dateStr] ?? 0;
        }
        
        $this->chartData = [
            'labels' => $dates,
            'datasets' => [
                'label' => 'Pendaftar',
                'data' => $counts,
            ]
        ];
        
        // Get latest registrants
        $this->pendaftarTerbaru = DataPendaftar::where('id_sekolah', $this->sekolah->id)
            ->whereHas('dapodik')
            ->with(['users', 'dapodik', 'jalur'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
    }
    
    #[On('refreshStatistics')]
    public function refreshStatistics()
    {
        $this->loadStatistics();
        $this->dispatch('statisticsUpdated');
    }
    
    public function render()
    {
        return view('livewire.live.statistics');
    }
}