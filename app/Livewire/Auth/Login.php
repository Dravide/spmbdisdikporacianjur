<?php

namespace App\Livewire\Auth;

use Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{

    #[Layout('components.auth.app')]
    #[Title('Login Akun')]
    #[Rule('required', message: 'Username / No. Pendaftaran Tidak Boleh Kosong')]
    public $username;

    #[Rule('required', message: 'Password Tidak Boleh Kosong')]
    public $password;

    public function render()
    {
        return view('livewire.auth.login');
    }


    public function login()
    {
        $this->validate();

        if (auth()->attempt(['username' => $this->username, 'password' => $this->password])) {
            $role = Auth::user()->role;
            return match ($role) {
                'nara' => redirect()->route('nara.home'),
                'cpdb' => redirect()->route('pendaftaran.beranda'),
                'operator' => redirect()->route('operator.home'),
                default => redirect()->route('auth.login'),
            };
        } else {
            throw ValidationException::withMessages([
                'username' => 'Username dan Password tidak sesuai',
            ]);
        }

    }
}
