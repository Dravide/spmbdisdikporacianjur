<?php

namespace App\Livewire\Operator;

use App\Models\DataPendaftar;
use App\Models\Jalur;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Home extends Component
{
    public $totalPendaftar;
    public $totalTerverifikasi;
    public $totalBelumTerverifikasi;
    public $jalurData;
    public $chartData;
    public $pendaftarTerbaru;
    
    public function mount()
    {
        $this->loadDashboardData();
    }
    
    public function loadDashboardData()
    {
        // Hitung total pendaftar untuk sekolah ini saja
        $this->totalPendaftar = DataPendaftar::where('id_sekolah', \Auth::user()->sekolah->id)->count();
        
        // Hitung total pendaftar yang sudah terverifikasi
        $this->totalTerverifikasi = DataPendaftar::where('id_sekolah', \Auth::user()->sekolah->id)
            ->where('verval', '1')
            ->count();
            
        // Hitung total pendaftar yang belum terverifikasi
        $this->totalBelumTerverifikasi = DataPendaftar::where('id_sekolah', \Auth::user()->sekolah->id)
            ->where('verval', '0')
            ->count();
        
        // Ambil data jalur dan jumlah pendaftar per jalur untuk sekolah ini saja
        $this->jalurData = Jalur::select('jalurs.id', 'jalurs.nama_jalur', 'jalurs.svg', DB::raw('COUNT(data_pendaftars.id) as jumlah_pendaftar'))
            ->leftJoin('data_pendaftars', 'jalurs.id', '=', 'data_pendaftars.id_jalur')
            ->where(function($query) {
                $query->whereNull('data_pendaftars.id_sekolah')
                      ->orWhere('data_pendaftars.id_sekolah', \Auth::user()->sekolah->id);
            })
            ->groupBy('jalurs.id', 'jalurs.nama_jalur', 'jalurs.svg')
            ->get();
        
        // Ambil data pendaftar per hari untuk 14 hari terakhir (hanya untuk sekolah ini)
        $startDate = Carbon::now()->subDays(13)->startOfDay();
        $endDate = Carbon::now()->endOfDay();
        
        $dailyRegistrations = DataPendaftar::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->where('id_sekolah', \Auth::user()->sekolah->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date')
            ->map(function ($item) {
                return $item->count;
            })
            ->toArray();
        
        // Buat array tanggal untuk 14 hari terakhir
        $dateRange = [];
        $countData = [];
        
        for ($i = 13; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $dateRange[] = Carbon::parse($date)->format('d M');
            $countData[] = $dailyRegistrations[$date] ?? 0;
        }
        
        $this->chartData = [
            'labels' => $dateRange,
            'data' => $countData
        ];
        
        // Ambil 10 pendaftar terbaru (hanya untuk sekolah ini)
        $this->pendaftarTerbaru = DataPendaftar::with(['users', 'jalur', 'dapodik', 'asal_sekolah', 'sekolah'])
            ->where('id_sekolah', \Auth::user()->sekolah->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        // Dispatch event untuk memperbarui chart
        $this->dispatch('dashboardUpdated');
    }
    
    public function render()
    {
        return view('livewire.operator.home');
    }
}
