<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Rules\reCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
        // return view('tutup');
    }

    public function login(Request $request)
    {
        $this->validate(request(), [
            'username' => 'required|string',
            'password' => 'required|string'
        ], [
            'username.required' => 'Username / No. Pendaftaran Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
        ]);
        if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function username()
    {
        return 'username';
    }

    public function lupapassword()
    {
        return view('auth.lupapassword');
    }

    public function lupapasswordstore(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users',
            'token' => 'required|exists:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ], [
            'username.required' => 'Username / No. Pendaftaran Tidak Boleh Kosong',
            'username.exists' => 'Username / No. Pendaftaran Tidak Valid',
            'token.required' => 'Token Tidak Boleh Kosong',
            'token.exists' => 'Token Tidak Valid',
            'password.required' => 'Password Tidak Boleh Kosong',
            'password.min' => 'Password Minimal 8 Karakter',
            'confirm_password.required' => 'Konfirmasi Password Tidak Boleh Kosong',
            'confirm_password.min' => 'Konfirmasi Password Minimal 8 Karakter',
            'confirm_password.same' => 'Konfirmasi Password Tidak Sama Dengan Password',
            'g-recaptcha-response.required' => 'Captcha Tidak Boleh Kosong'
        ]);

        $user = \App\Models\User::where([
            'username' => $request->username,
            'token' => $request->token
        ])->first();

        if ($user) {
            $user->password = bcrypt($request->password);
            $user->token = Str::upper(Str::random(5));
            $user->save();
            return redirect()->route('login')->withSuccess('Password Berhasil');
        } else {
            return redirect()->back()->withError('Token Tidak Valid');
        }

    }
}
