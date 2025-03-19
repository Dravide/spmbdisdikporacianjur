<?php

namespace App\Http\Controllers\nara;

use App\Http\Controllers\Controller;
use App\Models\DataPendaftar;
use App\Models\PesertaDidik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataPendaftarController extends Controller
{
    public function index()
    {
        $data = DataPendaftar::paginate('25');
        return view('nara.datapendaftar.index')->with(compact('data'));
    }

    public function show($id)
    {
        $data = DataPendaftar::find($id);
        return view('nara.datapendaftar.show')->with(compact('data'));
    }

    public function cari(Request $request)
    {
        $data = DataPendaftar::with(['users'])
            ->where('nisn', 'LIKE', '%' . $request->kode . '%')
            ->orwhereHas('users', function ($query) use ($request) {
                $query->where('username', 'LIKE', '%' . $request->kode . '%');
            })
            ->paginate('10');
//        dd($data);
        return view('nara.datapendaftar.index')->with(compact('data'));
    }

    public function reset(Request $request)
    {
        \App\Models\DataPendaftar::where('nisn', $request->nisn)->delete();
        PesertaDidik::where('nisn', $request->nisn)->delete();
        return back()->with('sukses', 'Data Berhasil di Reset');
    }

    public function password(Request $request)
    {
        $pendaftar = \App\Models\DataPendaftar::where('nisn', $request->nisn)->first();
        $data = User::find($pendaftar->id_users);
        $data->update([
            'password' => Hash::make('cianjurbangkit'),
        ]);
        $data->save;
        return back()->with('sukses', 'Password Berhasil di Ubah');
    }

    public function jenis(Request $request)
    {

        $pendaftar = \App\Models\DataPendaftar::where('nisn', $request->nisn)->first();
        $pendaftar->update([
            'jenis' => 'luar'
        ]);
        $pendaftar->save;
        return back()->with('sukses', 'Jenis Pendaftaran Berhasil di Ubah');

//        return $request->nisn;
    }
}
