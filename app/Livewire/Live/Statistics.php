<?php

namespace App\Livewire\Live;

use App\Models\DataPendaftar;
use App\Models\Jalur;
use App\Models\Sekolah;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Statistics extends Component
{
    #[Layout('components.home.guest')]
    #[Title('Live Statistik')]
    
    public $ulid;
    public $sekolah;
    public $totalPendaftar = 0;
    public $pendaftarPerJalur = [];
    public $pendaftarPerStatus = [];
    public $chartData = [];
    public $pendaftarTerbaru = [];
    public $lastUpdated;
    
    protected $listeners = ['refreshStatistics' => 'refreshStatistics'];
    
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
        
        // Get registrants grouped by jalur with custom icons
        $jalurList = Jalur::all();
        $this->pendaftarPerJalur = [];
        
        // Define custom icons for different jalur types
        $jalurIcons = [
            'Zonasi' => 'mdi-map-marker-radius',
            'Afirmasi' => 'mdi-account-heart',
            'Prestasi' => 'mdi-trophy',
            'Perpindahan' => 'mdi-account-switch',
            'default' => 'mdi-flag-outline'
        ];
        
        foreach ($jalurList as $jalur) {
            $count = DataPendaftar::where('id_sekolah', $this->sekolah->id)
                ->where('id_jalur', $jalur->id)
                ->count();
            
            // Determine the appropriate icon based on jalur name
            $icon = $jalurIcons['default'];
            foreach ($jalurIcons as $key => $value) {
                if (stripos($jalur->nama_jalur, $key) !== false) {
                    $icon = $value;
                    break;
                }
            }
            
            $this->pendaftarPerJalur[] = [
                'id' => $jalur->id,
                'nama' => $jalur->nama_jalur,
                'count' => $count,
                'icon' => $icon,
                'percentage' => $this->totalPendaftar > 0 ? round(($count / $this->totalPendaftar) * 100, 1) : 0
            ];
        }
        
        // Sort jalur by count (highest first)
        usort($this->pendaftarPerJalur, function($a, $b) {
            return $b['count'] - $a['count'];
        });
        
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
        
        // Get chart data for the last 14 days with improved formatting
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
            $dates[] = $date->locale('id')->isoFormat('D MMM');
            $counts[] = $pendaftarPerHari[$dateStr] ?? 0;
        }
        
        $this->chartData = [
            'labels' => $dates,
            'datasets' => [
                'label' => 'Pendaftar',
                'data' => $counts,
            ]
        ];
        
        // Get latest registrants with more details
        $this->pendaftarTerbaru = DataPendaftar::where('id_sekolah', $this->sekolah->id)
            ->whereHas('dapodik')
            ->with(['users', 'dapodik', 'jalur'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
            
        // Set last updated time
        $this->lastUpdated = Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
    }
    
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