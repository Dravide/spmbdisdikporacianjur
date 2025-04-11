<?php

namespace App\Livewire\Home;

use App\Models\Pengaduan as ModelsPengaduan;
use App\Models\Sekolah;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Pengaduan extends Component
{
    #[Layout('components.home.guest')]
    #[Title('Pengaduan')]

    public $nama;
    public $email;
    public $no_telepon;
    public $subjek;
    public $pesan;
    public $tujuan = 'dinas'; // Default to dinas
    public $captcha;
    public $captchaImage;
    
    public $successMessage = '';
    public $errorMessage = '';
    public $sekolahList = [];
    public $tujuanOptions = [];

    protected $rules = [
        'nama' => 'required|min:3|max:100',
        'email' => 'required|email|max:100',
        'no_telepon' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'subjek' => 'required|min:5|max:100',
        'pesan' => 'required|min:20',
        'tujuan' => 'required',
        'captcha' => 'required|captcha',
    ];

    protected $messages = [
        'nama.required' => 'Nama harus diisi',
        'nama.min' => 'Nama minimal 3 karakter',
        'email.required' => 'Email harus diisi',
        'email.email' => 'Format email tidak valid',
        'no_telepon.required' => 'Nomor telepon harus diisi',
        'no_telepon.regex' => 'Format nomor telepon tidak valid',
        'no_telepon.min' => 'Nomor telepon minimal 10 digit',
        'subjek.required' => 'Subjek harus diisi',
        'subjek.min' => 'Subjek minimal 5 karakter',
        'pesan.required' => 'Pesan harus diisi',
        'pesan.min' => 'Pesan minimal 20 karakter',
        'tujuan.required' => 'Silakan pilih tujuan pengaduan',
        'captcha.required' => 'Captcha harus diisi',
        'captcha.captcha' => 'Captcha tidak valid',
    ];

    public function mount()
    {
        // Get only online schools
        $this->sekolahList = Sekolah::where('status_online', 'online')
            ->orderBy('nama_sekolah')
            ->get();
            
        // Create dropdown options
        $this->tujuanOptions = [
            'dinas' => 'Dinas Pendidikan, Kepemudaan dan Olahraga Cianjur'
        ];
        
        // Add schools to options
        foreach ($this->sekolahList as $sekolah) {
            $this->tujuanOptions['sekolah_' . $sekolah->id] = $sekolah->nama_sekolah;
        }
            
        // Pre-fill form if user is logged in
        if (Auth::check()) {
            $user = Auth::user();
            $this->nama = $user->name;
            $this->email = $user->email;
        }
    }
    
    // Remove the refreshCaptcha method as we're handling it with direct AJAX
    
    public function submitForm()
    {
        $this->validate();

        try {
            // Parse tujuan value to determine if it's dinas or a school
            $isDinas = $this->tujuan === 'dinas';
            $sekolahId = null;
            
            if (!$isDinas) {
                // Extract school ID from the tujuan value (format: 'sekolah_ID')
                $parts = explode('_', $this->tujuan);
                if (count($parts) === 2) {
                    $sekolahId = $parts[1];
                }
            }
            
            ModelsPengaduan::create([
                'nama' => $this->nama,
                'email' => $this->email,
                'no_telepon' => $this->no_telepon,
                'subjek' => $this->subjek,
                'pesan' => $this->pesan,
                'tujuan_id' => $sekolahId,
                'tujuan_dinas' => $isDinas,
                'user_id' => Auth::id(),
                'status' => 'pending',
            ]);

            $this->reset(['subjek', 'pesan', 'tujuan', 'captcha']);
            $this->tujuan = 'dinas'; // Reset to default
            $this->successMessage = 'Pengaduan Anda telah berhasil dikirim. Kami akan menindaklanjuti secepatnya.';
            
            // Keep user info if logged in
            if (Auth::check()) {
                $user = Auth::user();
                $this->nama = $user->name;
                $this->email = $user->email;
            }
            
            // Refresh captcha via JavaScript
            $this->dispatchBrowserEvent('refresh-captcha');
        } catch (\Exception $e) {
            $this->errorMessage = 'Terjadi kesalahan saat mengirim pengaduan. Silakan coba lagi.';
        }
    }

    public function render()
    {
        return view('livewire.home.pengaduan');
    }
}
