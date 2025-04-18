<?php

namespace App\Livewire\Operator;

use App\Models\Berkas;
use App\Models\DataPendaftar;
use App\Models\Jalur;
use App\Models\User;
use App\Models\Verval as OperatorVerval;
use App\Jobs\SendWhatsApp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VervalBerkas extends Component
{
    public $jalur;
    public $id;
    public $hasil = [];
    public $showOffcanvas = false;
    public $selectedBerkasId = null;
    public $berkasData = null;
    
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount($jalur, $id)
    {
        $this->jalur = $jalur;
        $this->id = $id;
        $this->loadBerkas();
    }
    
    public function loadBerkas()
    {
        $jalur = Jalur::find($this->jalur);
        $this->hasil = [];
        
        foreach ($jalur->berkas as $data) {
            $berkas = Berkas::find($data);
            $verval = OperatorVerval::where('id_berkas', $data)
                ->where('id_pendaftar', $this->id)
                ->first();
                
            $this->hasil[$berkas->nama_berkas] = $verval;
        }
    }
    
    public function verifikasi($id)
    {
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
        $this->loadBerkas();
    }
    
    public function perbaikan($id)
    {
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
        $this->loadBerkas();
    }
    
    public function showBerkas($id)
    {
        $this->selectedBerkasId = $id;
        $this->dispatch('showBerkasModal', ['berkasId' => $id]);
    }
    
    private function formatPhoneNumber($phoneNumber)
    {
        return preg_replace('/^08/', '628', $phoneNumber);
    }
    
    public function render()
    {
        return view('livewire.operator.verval-berkas');
    }
}