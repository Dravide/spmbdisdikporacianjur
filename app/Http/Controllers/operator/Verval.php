<?php

namespace App\Http\Controllers\operator;

use App\DataTables\RekapJalurDataTable;
use App\DataTables\VervalDataTable;
use App\Http\Controllers\Controller;
use App\Jobs\SendWhatsApp;
use App\Models\Jalur;
use App\Models\Sekolah;
use App\Models\User;
use App\Models\Verval as OperatorVerval;
use App\Models\WhatsApp;
use App\Services\DistanceCalculatorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Verval extends Controller
{
    public function index(VervalDataTable $VervalDataTable, $kode)
    {
    
        $jalur = Jalur::find($kode);
        return $VervalDataTable
            ->with('kode', $kode)
            ->render('operator.verval', ['jalur' => $jalur]);
    }

    public function rekapjalur(RekapJalurDataTable $VervalDataTable, $kode)
    {
        $jalur = Jalur::find($kode);
        return $VervalDataTable
            ->with('kode', $kode)
            ->render('operator.rekapjalur', ['jalur' => $jalur]);
    }

    protected $distanceCalculator;

    public function __construct(DistanceCalculatorService $distanceCalculator)
    {
        $this->distanceCalculator = $distanceCalculator;
    }

    public function show($kode)
    {
        $data = \App\Models\DataPendaftar::where('nisn', $kode)->where('id_sekolah', Auth::user()->sekolah->id)->first();

        if ($data) {
            if ($data->konfir == 0) {
                return back()->with('error', 'Siswa belum melakukan konfirmasi');
            } else {
                $sekolahs = Sekolah::where('id', Auth::user()->sekolah->id)->first();
                
                $distance = $this->distanceCalculator->calculateDistance(
                    $sekolahs->lintang,
                    $sekolahs->bujur,
                    $data->koordinat->latitude,
                    $data->koordinat->longitude
                );

                   
                $whatsapp = WhatsApp::where('nisn', $data->nisn)->get();

                return view('operator.vervalpendaftar')->with(compact(['data', 'distance', 'whatsapp']));
            }
        } else {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan');
        }
    }

    public function update(Request $request)
    {

        if ($request->verval == 'verifikasi') {
            $data = OperatorVerval::where('id', $request->id)->first();
            $data->update([
                'status' => 'terima'
            ]);
            $data->save;
            $user = User::where('username', $data->id_pendaftar)->first();
            $verval = OperatorVerval::where('id_pendaftar', $data->id_pendaftar)
                ->where('deleted_at', null)
                ->where('status', 'terima')
                ->count();
//            dd($verval, count($user->dataPendaftar->jalur->berkas));
            if ($verval == count($user->dataPendaftar->jalur->berkas)) {
                $datapendaftar = \App\Models\DataPendaftar::where('id_users', $user->id)
                    ->first();
                $datapendaftar->update([
                    'verval' => '1'
                ]);
                $datapendaftar->save();

                $updatedPhoneNumber = $this->formatPhoneNumber($datapendaftar->whatsapp);
                $pesan = "*📝 PPDB SMP DISDIKPORA CIANJUR 2024*

Selamat, Calon Peserta Didik Baru dengan Nama *" . $datapendaftar->dapodik->nama . "* (" . $datapendaftar->dapodik->nisn . ") dan Nomor Peserta *" . $datapendaftar->users->username . "* telah diverifikasi dan dinyatakan Lengkap dan akan dilanjutkan ke Proses Pengolahan oleh " . $datapendaftar->sekolah->nama_sekolah . ", Silahkan *Download Bukti Pendaftaran* Pada Aplikasi PPDB SMP DISDIKPORA Cianjur 2024.

Pengumuman Hasil akan diumumkan pada tanggal 05 Juli 2024 Pukul 14.00 WIB pada laman https://hasil.ppdbsmpdisdikporacianjur.com
Terima Kasih
https://ppdbsmpdisdikporacianjur.com";
                dispatch(new SendWhatsApp($updatedPhoneNumber, $pesan));
            } elseif ($verval != count($user->dataPendaftar->jalur->berkas)) {
                $datapendaftar = \App\Models\DataPendaftar::where('id_users', $user->id)
                    ->first();
                $datapendaftar->update([
                    'verval' => '2'
                ]);
                $datapendaftar->save();
            }
            return back()->with('sukses', 'Verifikasi Berhasil');
        } elseif ($request->verval == 'perbaikan') {
            $data = OperatorVerval::where('id', $request->id)->first();
            $data->update([
                'status' => 'tolak'
            ]);
            $data->save;
            $user = User::where('username', $data->id_pendaftar)->first();
            $verval = OperatorVerval::where('id_pendaftar', $data->id_pendaftar)
                ->where('deleted_at', null)
                ->where('status', 'terima')
                ->count();
            if ($verval == count($user->dataPendaftar->jalur->berkas)) {

                $datapendaftar = \App\Models\DataPendaftar::where('id_users', $user->id)
                    ->first();
                $datapendaftar->update([
                    'verval' => '1'
                ]);
                $datapendaftar->save();


            } elseif ($verval != count($user->dataPendaftar->jalur->berkas)) {
                $datapendaftar = \App\Models\DataPendaftar::where('id_users', $user->id)
                    ->first();
                $datapendaftar->update([
                    'verval' => '2'
                ]);
                $datapendaftar->save();
            }
            return back()->with('sukses', 'Verifikasi Berhasil');
        }

        return back()->with('error', 'Terjadi Kesalahan');
    }

    private function formatPhoneNumber($phoneNumber)
    {
        return preg_replace('/^08/', '628', $phoneNumber);
    }

    public function getBerkas(Request $request)
    {
        if ($request->ajax()) {
            $data = OperatorVerval::where('id', $request->id)->first();
//            if($data->id_berkas == 8) {
//                $d = DataPrestasi::where('verval_id', $data->id)->get();
//                dd($d);
//            }

            $isiData = $data;
//            dd($isiData);


            return view('components.operator.offcanvas', compact(['data', 'isiData']));
        }

    }

    public function whatsapp(Request $request)
    {
        $pesan = "*📄 PPDB SMP DISDIKPORA CIANJUR 2024*
Pesan dari Operator *" . Auth::user()->sekolah->nama_sekolah . "*

*_" . $request->pesan . "_*

Terima Kasih
https://ppdbsmpdisdikporacianjur.com";
//        dd($request->all());
        WhatsApp::create([
            'nisn' => $request->nisn,
            'receiver' => $request->no_hp,
            'message' => $request->pesan
        ]);
        $updatedPhoneNumber = $this->formatPhoneNumber($request->no_hp);
        dispatch(new SendWhatsApp($updatedPhoneNumber, $pesan));
        return back()->with('sukses', 'Pesan Berhasil di Kirim.');
    }

    public function reset(Request $request)
    {
        \App\Models\DataPendaftar::where('nisn', $request->nisn)->delete();
        return back()->with('sukses', 'Data Berhasil di Reset');
    }
}
