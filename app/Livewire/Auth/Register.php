<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Str;

class Register extends Component
{
    #[Layout('components.auth.app')]
    #[Title('Registrasi Akun')]
    #[Rule('required', message: 'Username / No. Pendaftaran Tidak Boleh Kosong')]
    public $username;
    #[Rule('required', message: 'Password Tidak Boleh Kosong')]
    #[Rule('min:8', message: 'Password Minimal 8 Karakter')]
    public $password;
    #[Rule('required', message: 'Konfirmasi Password Tidak Boleh Kosong')]
    #[Rule('same:password', message: 'Konfirmasi Password Tidak Sama Dengan Password')]
    public $confirm_password;

    public ?string $captchaToken = null;

    public function mount()
    {
        $this->username = 'SPMB25' . Str::upper(Str::random(6));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function submit()
    {
        
        $this->validate();

//        $query = http_build_query([
//            'secret' => config('services.google_captcha.secret_key'),
//            'response' => $this->captchaToken,
//        ]);
//
//        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?' . $query);
//        $captchaLevel = $response->json('score');
//
//        throw_if($captchaLevel <= 0.5, ValidationException::withMessages([
//            'captchaToken' => __('Kesalahan pada verifikasi captcha. Silakan muat ulang halaman dan coba lagi.')
//        ]));

        User::create([
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'token' => \Illuminate\Support\Str::upper(Str::random(5)),
            'role' => 'cpdb',
        ]);

        Auth::attempt($this->only('username', 'password'));

        return redirect()->route('pendaftaran.beranda')->with('sukses', 'Selamat Datang di PPDB SMP DISDIKPORA Cianjur 2023');


    }
}
