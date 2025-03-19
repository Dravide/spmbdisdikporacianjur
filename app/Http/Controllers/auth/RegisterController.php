<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\reCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{


    public function index()
    {
        $username = 'SPMB25' . Str::upper(Str::random(6));
        return view('auth.register', compact('username'));
    }

    public function index2()
    {
        $username = 'SPMB25' . Str::upper(Str::random(7));
        return view('auth.register', compact('username'));
//        return view('tutup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ], [
            'username.required' => 'Username / No. Pendaftaran Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
            'password.min' => 'Password Minimal 8 Karakter',
            'confirm_password.required' => 'Konfirmasi Password Tidak Boleh Kosong',
            'confirm_password.same' => 'Konfirmasi Password Tidak Sama Dengan Password',
            'g-recaptcha-response.required' => 'Captcha Tidak Boleh Kosong'

        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'token' => Str::upper(Str::random(5)),
            'role' => 'cpdb',
        ]);

        \Auth::attempt($request->only('username', 'password'));

        return redirect()->route('pendaftaran.beranda')->with('sukses', 'Selamat Datang di PPDB SMP DISDIKPORA Cianjur 2023');
    }
}
