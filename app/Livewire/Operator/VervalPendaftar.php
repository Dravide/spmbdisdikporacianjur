<?php

namespace App\Livewire\Operator;

use App\Jobs\SendWhatsApp;
use App\Models\Jalur;
use App\Models\Sekolah;
use App\Models\User;
use App\Models\Verval as OperatorVerval;
use App\Models\WhatsApp;
use App\Models\DataPendaftar;
use App\Services\DistanceCalculatorService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class VervalPendaftar extends Component
{

    #[Layout('components.operator.apps')]
    #[Title('Verval')]  
    public $nisn;
    public $data;
    public $distance;
    public $whatsapp;
    public $pesan = '';
    
    protected $distanceCalculator;
    
    public function boot(DistanceCalculatorService $distanceCalculator)
    {
        $this->distanceCalculator = $distanceCalculator;
    }
    
    public function mount($kode)
    {
        $this->nisn = $kode;
        $this->loadData();
    }
    
    public function loadData()
    {
        $this->data = DataPendaftar::where('nisn', $this->nisn)
            ->where('id_sekolah', Auth::user()->sekolah->id)
            ->first();
            
        if ($this->data) {
            if ($this->data->konfir == 0) {
                session()->flash('error', 'Siswa belum melakukan konfirmasi');
                return redirect()->route('operator.verval', $this->data->id_jalur);
            } else {
                $sekolahs = Sekolah::where('id', Auth::user()->sekolah->id)->first();
                
                $this->distance = $this->distanceCalculator->calculateDistance(
                    $sekolahs->lintang,
                    $sekolahs->bujur,
                    $this->data->koordinat->latitude,
                    $this->data->koordinat->longitude
                );
                
                $this->whatsapp = WhatsApp::where('nisn', $this->data->nisn)->get();
            }
        } else {
            session()->flash('error', 'Data Tidak Ditemukan');
            return redirect()->route('operator.home');
        }
    }
    
    public function update($id, $verval)
    {
        if ($verval == 'verifikasi') {
            $data = OperatorVerval::where('id', $id)->first();
            $data->update([
                'status' => 'terima'
            ]);
            
            $user = User::where('username', $data->id_pendaftar)->first();
            $verval = OperatorVerval::where('id_pendaftar', $data->id_pendaftar)
                ->where('deleted_at', null)
                ->where('status', 'terima')
                ->count();
                
            if ($verval == count($user->dataPendaftar->jalur->berkas)) {
                $datapendaftar = DataPendaftar::where('id_users', $user->id)
                    ->first();
                $datapendaftar->update([
                    'verval' => '1'
                ]);
                
                $updatedPhoneNumber = $this->formatPhoneNumber($datapendaftar->whatsapp);
                $pesan = "*📝 PPDB SMP DISDIKPORA CIANJUR 2024*\n\nSelamat, Calon Peserta Didik Baru dengan Nama *" . $datapendaftar->dapodik->nama . "* (" . $datapendaftar->dapodik->nisn . ") dan Nomor Peserta *" . $datapendaftar->users->username . "* telah diverifikasi dan dinyatakan Lengkap dan akan dilanjutkan ke Proses Pengolahan oleh " . $datapendaftar->sekolah->nama_sekolah . ", Silahkan *Download Bukti Pendaftaran* Pada Aplikasi PPDB SMP DISDIKPORA Cianjur 2024.\n\nPengumuman Hasil akan diumumkan pada tanggal 05 Juli 2024 Pukul 14.00 WIB pada laman https://hasil.ppdbsmpdisdikporacianjur.com\nTerima Kasih\nhttps://ppdbsmpdisdikporacianjur.com";
                dispatch(new SendWhatsApp($updatedPhoneNumber, $pesan));
            } elseif ($verval != count($user->dataPendaftar->jalur->berkas)) {
                $datapendaftar = DataPendaftar::where('id_users', $user->id)
                    ->first();
                $datapendaftar->update([
                    'verval' => '2'
                ]);
            }
            
            session()->flash('sukses', 'Verifikasi Berhasil');
            $this->loadData();
            
        } elseif ($verval == 'perbaikan') {
            $data = OperatorVerval::where('id', $id)->first();
            $data->update([
                'status' => 'tolak'
            ]);
            
            $user = User::where('username', $data->id_pendaftar)->first();
            $verval = OperatorVerval::where('id_pendaftar', $data->id_pendaftar)
                ->where('deleted_at', null)
                ->where('status', 'terima')
                ->count();
                
            if ($verval == count($user->dataPendaftar->jalur->berkas)) {
                $datapendaftar = DataPendaftar::where('id_users', $user->id)
                    ->first();
                $datapendaftar->update([
                    'verval' => '1'
                ]);
            } elseif ($verval != count($user->dataPendaftar->jalur->berkas)) {
                $datapendaftar = DataPendaftar::where('id_users', $user->id)
                    ->first();
                $datapendaftar->update([
                    'verval' => '2'
                ]);
            }
            
            session()->flash('sukses', 'Verifikasi Berhasil');
            $this->loadData();
        } else {
            session()->flash('error', 'Terjadi Kesalahan');
        }
    }
    
    public function kirimWhatsapp()
    {
        $pesan = "*📄 PPDB SMP DISDIKPORA CIANJUR 2024*\nPesan dari Operator *" . Auth::user()->sekolah->nama_sekolah . "*\n\n*_" . $this->pesan . "_*\n\nTerima Kasih\nhttps://ppdbsmpdisdikporacianjur.com";
        
        WhatsApp::create([
            'nisn' => $this->data->nisn,
            'receiver' => $this->data->whatsapp,
            'message' => $this->pesan
        ]);
        
        $updatedPhoneNumber = $this->formatPhoneNumber($this->data->whatsapp);
        dispatch(new SendWhatsApp($updatedPhoneNumber, $pesan));
        
        session()->flash('sukses', 'Pesan Berhasil di Kirim.');
        $this->pesan = '';
        $this->loadData();
    }
    
    public function resetData()
    {
        DataPendaftar::where('nisn', $this->data->nisn)->delete();
        session()->flash('sukses', 'Data Berhasil di Reset');
        return redirect()->route('operator.home');
    }
    
    private function formatPhoneNumber($phoneNumber)
    {
        return preg_replace('/^08/', '628', $phoneNumber);
    }
    
    public function getBerkas($id)
    {
        $data = OperatorVerval::where('id', $id)->first();
        $isiData = $data;
        
        return view('components.operator.offcanvas', compact(['data', 'isiData']));
    }
    
    public function render()
    {
        return view('livewire.operator.verval-pendaftar');
    }
}