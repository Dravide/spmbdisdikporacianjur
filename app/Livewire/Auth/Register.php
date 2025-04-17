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
    
    #[Rule('required', message: 'Captcha Tidak Boleh Kosong')]
    public $captcha;

    public ?string $captchaToken = null;

    public function mount()
    {
        $this->username = 'SPMB25' . Str::upper(Str::random(6));
        // Generate a fresh captcha on initial load
        captcha('math');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function refreshCaptcha()
    {
        $this->captcha = '';
        $this->dispatch('refreshCaptcha');
    }

    public function submit()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'captcha' => 'required|captcha'
        ], [
            'captcha.captcha' => 'Captcha tidak valid, silakan coba lagi.'
        ]);

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
