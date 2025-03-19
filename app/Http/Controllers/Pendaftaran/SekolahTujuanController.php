<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\DataPendaftar;
use App\Models\Sekolah;
use Auth;
use Illuminate\Http\Request;
use League\Geotools\Coordinate\Coordinate;
use League\Geotools\Geotools;

class SekolahTujuanController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        if ($request->ajax()) {
            $data = Sekolah::select(['id', 'nama_sekolah'])
                ->where('status_online', 'online')
                ->where('nama_sekolah', 'LIKE', "%{$request->q}%")->get();
            return response()->json($data);
        }
        $sekolahs = Sekolah::whereStatusOnline('online')->get();
        if (isset(Auth::user()->dataPendaftar->koordinat)) {
            foreach ($sekolahs as $out) {
                $sekul = new Coordinate([((float)$out->lintang), ((float)$out->bujur)]);
                $rumah = new Coordinate([(float)Auth::user()->dataPendaftar->koordinat->latitude, (float)Auth::user()->dataPendaftar->koordinat->longitude]);
                $geotools = new Geotools();
                $out->jarak = round($geotools->distance()->setFrom($sekul)->setTo($rumah)->flat());
 
            }
        }
        $tujuan = DataPendaftar::where('id_users', auth()->user()->id)->first();
        return view('pendaftaran.sekolah-tujuan')->with(compact('sekolahs', 'tujuan'));

    }

    public function update(Request $request)
    {
        $request->validate([
            'id_sekolah' => 'required|exists:sekolahs,id',
        ]);
        $data = DataPendaftar::where('id_users', auth()->user()->id)->first();
        $data->id_sekolah = $request->id_sekolah;
        $data->save();
        return redirect()->back()->with('sukses', 'Sekolah Tujuan Berhasil Diubah');
    }

    public function getDataSekolah()
    {
        $users = Sekolah::select(["id", "nama_sekolah"])
            ->where('nama_sekolah', 'LIKE', '%' . request()->get('q') . '%')
            ->get();

        return response()->json($users);
    }

    public function getDataSekolahById()
    {
        $user = DataPendaftar::where('id_users', auth()->user()->id)->first();
        $data = Sekolah::select(['id', 'nama_sekolah'])->where('id', $user->id_sekolah)->first();
        return response()->json($data);
    }

}
