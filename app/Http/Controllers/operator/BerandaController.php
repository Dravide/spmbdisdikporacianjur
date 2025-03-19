<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\Jalur;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BerandaController extends Controller
{
    public function index()
    {
        $jumlahpendaftar = \App\Models\DataPendaftar::where('id_sekolah', \Auth::user()->sekolah->id)->count() == 0 ? 1 : \App\Models\DataPendaftar::where('id_sekolah', \Auth::user()->sekolah->id)->count();
        $terverifiaksi = \App\Models\DataPendaftar::where('id_sekolah', \Auth::user()->sekolah->id)->where('verval', '1')->count();
        $jalurs = Jalur::withCount(['dataPendaftar as jumlah' => function ($query) {
            $query->where('id_sekolah', \Auth::user()->sekolah->id);
        }, 'dataPendaftar as jumlahv' => function ($query) {
            $query->where('id_sekolah', \Auth::user()->sekolah->id)
                ->where('verval', '1');
        }])
            ->get();
        return view('operator.index')->with(compact(['jumlahpendaftar', 'terverifiaksi', 'jalurs']));
    }

    public function pengaturan()
    {
        $user = User::where('id', \Auth::user()->id)->first();
        $npsn = $user->username;
        $skl = Sekolah::where('npsn', $npsn)->first();
        $data = [
            'data' => $skl
        ];

        return view('operator.pengaturan')->with($data);

    }

    public function postPengaturan(Request $request)
    {
        $user = User::where('id', \Auth::user()->id)->first();
        $npsn = $user->username;
        $skl = Sekolah::where('npsn', $npsn)->first();
        // dd($request->pengumuman);


//        $credential = $request->validated();
        $request->validate([
            'nama_sekolah' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'telp' => 'required',
            'operator' => 'required',
            'alamat' => 'required',
        ], [
            'nama_sekolah' => 'Nama Sekolah Harus Diisi!',
            'lat' => 'Latitude Sekolah Harus Diisi!',
            'lon' => 'Longitude Sekolah Harus Diisi!',
            'telp' => 'No. Telp Sekolah Harus Diisi!',
            'operator' => 'Operator Sekolah Harus Diisi!',
            'alamat' => 'Alamat Sekolah Harus Diisi!',
        ]);
        if ($request->hasFile('img')) {
            if (Storage::disk('public')->exists($skl->img)) {
                Storage::disk('public')->delete($skl->img);
            }
            $filePath = Storage::disk('public')->put('images/logosekolah', request()->file('img'));
            $request->img = $filePath;
        } else {
            $request->img = $skl->img;
        }

        $skl->update([
            'nama_sekolah' => $request->nama_sekolah,
            'img' => $request->img,
            'lintang' => $request->lat,
            'bujur' => $request->lon,
            'telp' => $request->telp,
            'operator' => $request->operator,
            'alamat_jalan' => $request->alamat,
            'pengumuman' => $request->pengumuman,
            'link_pengumuman' => $request->linkPengumuman,
            'pro' => $request->propagasi,
        ]);

        $skl->save();
        return back()->with([
            'success' => 'Sukses'
        ]);

    }


    public function postGantiPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ], [
            'password.required' => 'Password Harus Diisi!',
            'confirm_password.required' => 'Password Harus Diisi!!',
            'confirm_password.same' => 'Password harus sama!'
        ]);
        $pass = User::where('id', \Auth::user()->id)->first();
        $pass->update([
            'password' => Hash::make($request->password)
        ]);
        $pass->save();

        return back()->with([
            'success' => 'Sukses'
        ]);


    }
}
