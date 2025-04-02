<?php

namespace App\Livewire\Home;

use App\Models\DataPendaftar;
use App\Models\Sekolah;
use App\Models\Jalur;
use App\Models\Berita; // Add this import
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('components.home.guest')]
    public $totalPendaftar;
    public $totalSekolah;
    public $totalJalur;
    public $sekolahTerdaftar;
    public $jalurPendaftaran;
    public $chartData;
    public $berita; // Add this property
    
    public function mount()
    {
        $this->loadHomeData();
    }
    
    public function loadHomeData()
    {
        // Hitung total pendaftar
        $this->totalPendaftar = DataPendaftar::count();
        
        // Hitung total sekolah yang terdaftar
        $this->totalSekolah = Sekolah::count();
        
        // Hitung total jalur pendaftaran
        $this->totalJalur = Jalur::count();
        
        // Ambil data sekolah yang terdaftar
        $this->sekolahTerdaftar = Sekolah::withCount('dataPendaftar')
            ->orderBy('data_pendaftar_count', 'desc')
            ->where('status_online', 'online')
            ->get();
        
        // Ambil data jalur pendaftaran dengan jumlah pendaftar
        $this->jalurPendaftaran = Jalur::select('jalurs.id', 'jalurs.nama_jalur', 'jalurs.svg', DB::raw('COUNT(data_pendaftars.id) as jumlah_pendaftar'))
            ->leftJoin('data_pendaftars', 'jalurs.id', '=', 'data_pendaftars.id_jalur')
            ->groupBy('jalurs.id', 'jalurs.nama_jalur', 'jalurs.svg')
            ->orderBy('jumlah_pendaftar', 'desc')
            ->get();
        
        // Ambil data berita terbaru
        $this->berita = Berita::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        
        // Ambil data pendaftar per hari untuk 14 hari terakhir
        $startDate = Carbon::now()->subDays(13)->startOfDay();
        $endDate = Carbon::now()->endOfDay();
        
        $dailyRegistrations = DataPendaftar::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
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
        
        // Dispatch event untuk memperbarui chart
        $this->dispatch('homeDataUpdated');
    }
    
    public function render()
    {
        return view('livewire.home.index');
    }
}
