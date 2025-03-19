<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\DaftarUlang;
use App\Models\BerkadDaftarUlang;
use App\Models\InformasiTambahan;
use App\Models\DataPendaftar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Kelulusan;
use Auth;

class PengumumanController extends Controller
{
    public function index()
    {
        $idSekolah = Auth::user()->sekolah->id;
        // dd($idSekolah);
        $du = DaftarUlang::where('id_sekolah', $idSekolah)->get();
        $bdu = BerkadDaftarUlang::where('id_sekolah', $idSekolah)->get();
        $tambahan = InformasiTambahan::where('id_sekolah', $idSekolah)->first();
        $t = "";
        if($tambahan == null) {
            $t = "";
        } else {
            $t = $tambahan->content;
        }
        $duCount = $du->count();
        $bduCount = $bdu->count();
        $data = [
            'du' => $du,
            'bdu' => $bdu,
            'tambahan' => $t,
            'duCount' => $duCount,
            'bduCount' => $bduCount,
            'idSekolah' => $idSekolah
            ];
        return view('operator.pengumuman')->with($data);
    }

    public function preview()
    {
        $data = DataPendaftar::where('nisn', '3120713574')->first();
        $username = 'PPDBRLAUIVM';
        $kelulusan = Kelulusan::where('username', 'PPDBRLAUIVM')->first();
        $daftarUlang = DaftarUlang::where('id_sekolah', '70')->where('urutAwal', '<=', 29)->where('urutAkhir', '>=', 29)->first();
        $berkasDaftarUlang = BerkadDaftarUlang::where('id_sekolah', '70')->get();
        $tambahan = InformasiTambahan::where('id_sekolah', '70')->first();
        $crypt = 'eyJpdiI6InkzUmJCc3ZFZUpMT1JKM1ZWTUhXQ0E9PSIsInZhbHVlIjoiR040dWtVTDFaNzI3Zkw3ajB1NlowZUpZU2RvbTNEOSs5SmllWHZuOXFKTT0iLCJtYWMiOiI2M2NlZjQzZDAyNDcxMDE5ZGU5NGFhZWJkOTg5Y2QzMTg2Mzk5MWVkNmQ4MmVkZmJkZDAzMzI4NzBiOTQzNTlkIiwidGFnIjoiIn0=';
        // $datasiswa = json_decode($data->data, true);
        $pdf = PDF::loadView('cetak.buktiKelulusan', [
            'data' => $data,
            'username' => $username,
            'kelulusan' => $kelulusan,
            'daftarUlang' => $daftarUlang,
            'berkasDaftarUlang' => $berkasDaftarUlang,
            'tambahan' => $tambahan,
            'crypt' => $crypt
            ]);
        $pdf->setPaper('A4');
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('defaultMediaType', 'all');

        return $pdf->stream('Pakta Integritas - ' . $data->users->username . '.pdf');
    }
    public function post(Request $request) {
        $idSekolah = Auth::user()->sekolah->id;
        $du = $request->input('data');
        foreach ($du as $duu) {
            DaftarUlang::create([
                'urutAwal' => $duu['urutAwal'],
                'urutAkhir' => $duu['urutAkhir'],
                'waktuAwal' => $duu['waktuAwal'],
                'waktuAkhir' => $duu['waktuAkhir'],
                'id_sekolah' => $idSekolah
                ]);
        }
        $berkas = $request->input('dataBerkas');
        foreach ($berkas as $bk) {
            BerkadDaftarUlang::create([
                'berkas' => $bk['berkas'],
                'link' => $bk['link'],
                'id_sekolah' => $idSekolah
                ]);
        }
        $pengumuman = $request->infoTambahan;
        InformasiTambahan::insert([
            'id_sekolah'=> $idSekolah,
            'content' => $pengumuman
            ]);

        return redirect(route('operator.pengumuman'));

    }
    public function postResetPengumuman(Request $request) {
        $idSekolah = Auth::user()->sekolah->id;
         $du = DaftarUlang::where('id_sekolah', $idSekolah)->delete();
        $bdu = BerkadDaftarUlang::where('id_sekolah', $idSekolah)->delete();
        $tambahan = InformasiTambahan::where('id_sekolah', $idSekolah)->delete();
        return redirect(route('operator.pengumuman'));
    }
}
