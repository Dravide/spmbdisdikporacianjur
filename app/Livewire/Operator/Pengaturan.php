<?php

namespace App\Livewire\Operator;

use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\LivewireFilepond\WithFilePond;

class Pengaturan extends Component
{
    use WithFileUploads, WithFilePond;

    public $data;
    public $activeTab = 'identitas';

    // Identitas Sekolah properties
    public $nama_sekolah;
    public $npsn;
    public $img;
    public $lat;
    public $lon;
    public $telp;
    public $operator;
    public $alamat;
    public $pengumuman;
    public $linkPengumuman;

    // Password properties
    public $password;
    public $confirm_password;

    public function mount($data)
    {
        $this->data = $data;
        $this->nama_sekolah = $data->nama_sekolah;
        $this->npsn = $data->npsn;
        $this->lat = $data->lintang;
        $this->lon = $data->bujur;
        $this->telp = $data->telp;
        $this->operator = $data->operator;
        $this->alamat = $data->alamat_jalan;
        $this->pengumuman = $data->pengumuman == 1;
        $this->linkPengumuman = $data->link_pengumuman;
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function saveIdentitas()
    {
        $this->validate([
            'nama_sekolah' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'telp' => 'required',
            'operator' => 'required',
            'alamat' => 'required',
        ]);

        // Handle image upload if provided
        if ($this->img) {
            $imgPath = $this->img->store('public/logos');
            // Update image path in database
        }

        // Update school data in database
        $this->data->update([
            'nama_sekolah' => $this->nama_sekolah,
            'lintang' => $this->lat,
            'bujur' => $this->lon,
            'telp' => $this->telp,
            'operator' => $this->operator,
            'alamat_jalan' => $this->alamat,
            'pengumuman' => $this->pengumuman ? 1 : 0,
            'link_pengumuman' => $this->linkPengumuman,
        ]);

        session()->flash('message', 'Identitas sekolah berhasil diperbarui.');
    }

    public function updatePassword()
    {
        $this->validate([
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $user = auth()->user();
        $user->password = bcrypt($this->password);
        $user->save();

        $this->password = '';
        $this->confirm_password = '';

        session()->flash('password_message', 'Password berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.operator.pengaturan');
    }
}
