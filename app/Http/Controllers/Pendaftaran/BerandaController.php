<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Jobs\KirimWhatsApp;
use App\Jobs\SendWhatsApp;
use App\Models\DataPendaftar;
use App\Models\PesertaDidik;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class BerandaController extends Controller
{
    public function index()
    {
        return view('pendaftaran.beranda');
    }
    
    public function index2()
    {
        
    }
    public function index2Post(Request $request) {
        $getData = DataPendaftar::where('nisn', $request->nisn)->first();
        
        if($getData == null) {
            echo "
             <link rel='stylesheet' href=' ".asset('assets/libs/sweetalert2/sweetalert2.min.css')." '/>
             <script src='https://code.jquery.com/jquery-3.7.1.min.js' integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>
             <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' rel='stylesheet'>
             <style>
             body{
             font-family: 'Be Vietnam Pro', sans-serif;
             }
             </style>
             <script src=' ".asset('assets/libs/sweetalert2/sweetalert2.min.js')."'></script>
             <script type='text/javascript'>
            $(document).ready(function () {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Data Tidak Ditemukan!',
                    showConfirmButton: 1,
                    confirmButtonText: 'Ke Halaman Utama!'
                }).then(function () {
                    window.location = ' ".route('login')." ';

                })
            });



        </script>

        ";
        }

        
        if($getData->jenis == "luar") {
            echo "
             <link rel='stylesheet' href=' ".asset('assets/libs/sweetalert2/sweetalert2.min.css')." '/>
             <script src='https://code.jquery.com/jquery-3.7.1.min.js' integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>
             <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' rel='stylesheet'>
             <style>
             body{
             font-family: 'Be Vietnam Pro', sans-serif;
             }
             </style>
             <script src=' ".asset('assets/libs/sweetalert2/sweetalert2.min.js')."'></script>
             <script type='text/javascript'>
            $(document).ready(function () {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Data Sudah terdaftar di Luar Kabupaten',
                    showConfirmButton: 1,
                    confirmButtonText: 'Ke Halaman Utama!'
                }).then(function () {
                    window.location = ' ".route('login')." ';

                })
            });



        </script>

        ";
        } else {
            DataPendaftar::where('nisn', $request->nisi)->update(['jenis', 'luar']);
            return redirect(route('login'))->with('jenisDiubah', 'Jenis Pendaftaran berhasil diubah. Silahkan login menggunakan akun sebelumnya!');
            
        }
        
    }
    public function swalError() {
        return view('pendaftaran.swal');
    }

    public function cutoff(Request $request)
    {
        $data = \Http::get('https://pelayanan.data.kemdikbud.go.id/vci/index.php/CPelayananData/getSiswa?kode_wilayah=020700&token=F841FFCE-87BA-434C-AEA3-D22A15BFFCE8&nisn=' . $request->nisn . '&npsn=' . $request->npsn . '')->json();
        PesertaDidik::where('nisn', $request->nisn)->update($data['0']);
        return redirect(route('Pendaftaran.datapeserta'))->with('sukses', 'Cutoff Berhasil!');
    }

    public function cetak_akun()
    {
        $data = User::find(auth()->user()->id);
        $pdf = PDF::loadView('cetak.kartuakun', ['data' => $data]);
        $pdf->setPaper('A4');
        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isPhpEnabled', false);
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('defaultMediaType', 'all');

        return $pdf->stream('kartu-akun.pdf');
    }


    public function integritas()
    {
        $data = DataPendaftar::where('id_users', auth()->user()->id)->first();
        // return view('cetak.integritas')->with(['data' => $data]);
        $pdf = PDF::loadView('cetak.integritas', ['data' => $data]);
        $pdf->setPaper('A4');
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('defaultMediaType', 'all');


        return $pdf->stream('Pakta Integritas - ' . $data->users->username . '.pdf');
    }

    public function buktipendaftaran()
    {
        $data = DataPendaftar::where('id_users', auth()->user()->id)->first();
//        dd($data);

        $pdf = PDF::loadView('cetak.buktipendaftaran', ['data' => $data]);
        $pdf->setPaper('A4');
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('defaultMediaType', 'all');

        return $pdf->stream('Bukti Pendaftaran - ' . $data->users->username . '.pdf');
    }

    public function jenis(Request $request)
    {
        if ($request->jenis == null) {
            return back()->with('error', 'Jenis Pendaftaran Tidak Boleh Kosong');
        }
        if ($request->jenis == 'dalam') {
            $request->validate([
                'jenis' => 'required',
                'nisn' => 'required|unique:data_pendaftars,nisn',
                'npsn' => 'required'
            ], [
                'jenis.required' => 'Jenis Pendaftaran Wajib di Isi.',
                'nisn.required' => 'NISN wajib di isi',
                'nisn.exists' => 'NISN tidak ditemukan',
                'nisn.unique' => 'NISN Telah Terdaftar',
                'npsn.required' => 'NPSN wajib di isi',
            ]);
            $data = \Http::get('https://pelayanan.data.kemdikbud.go.id/vci/index.php/CPelayananData/getSiswa?kode_wilayah=020700&token=F841FFCE-87BA-434C-AEA3-D22A15BFFCE8&nisn=' . $request->nisn . '&npsn=' . $request->npsn . '')->json();
            if (isset($data['message'])) {
                return redirect(route('pendaftaran.beranda'))->with('error', 'NISN dan NPSN Tidak Terdaftar di Dalam Kab. Cianjur');
            } else {
                PesertaDidik::create($data['0']);
                DataPendaftar::create([
                    'id_users' => auth()->id(),
                    'nisn' => $request->nisn,
                    'jenis' => $request->jenis
                ]);
                return redirect(route('pendaftaran.beranda'))->with('success', 'Selamat Datang di Pendaftaran!');
            }
        } elseif ($request->jenis == 'luar') {

            $request->validate([
                'jenis' => 'required',
                'nisn' => 'required|unique:data_pendaftars,nisn|unique:peserta_didiks,nisn',
                'npsn' => 'required'
            ], [
                'jenis.required' => 'Jenis Pendaftaran Wajib di Isi.',
                'nisn.required' => 'NISN wajib di isi',
                'nisn.unique' => 'NISN Telah Terdaftar',
                'nisn.unique' => 'NISN Telah Terdaftar di Dalam Kab. Cianjur',
                'npsn.required' => 'NPSN wajib di isi',
            ]);


            DataPendaftar::create([
                'id_users' => auth()->id(),
                'nisn' => $request->nisn,
                'jenis' => $request->jenis
            ]);
        }
        return back();
    }
    private function formatPhoneNumber($phoneNumber)
    {
        return preg_replace('/^08/', '628', $phoneNumber);
    }

    public function konfirmasi(Request $request)
    {

        $data = DataPendaftar::find($request->id);
        $data->update([
            'konfir' => $request->konfir
        ]);
        $data->save();
        if ($request->konfir == 1) {


            $updatedPhoneNumber = $this->formatPhoneNumber($data->whatsapp);
            $pesan = "*📝 PPDB SMP DISDIKPORA CIANJUR 2024*

Selamat, Calon Peserta Didik Baru dengan Nama *" . $data->dapodik->nama . "* (" . $data->dapodik->nisn . ") dan Nomor Peserta *" . $data->users->username . "* telah melakukan Konfirmasi Pendaftaran dan akan dilanjutkan ke Proses Verifikasi oleh *" . $data->sekolah->nama_sekolah . "*.
Silahkan Download Bukti Pendaftaran Pada Aplikasi PPDB SMP DISDIKPORA Cianjur 2024.

Terima Kasih
https://ppdbsmpdisdikporacianjur.com";
            dispatch(new SendWhatsApp($updatedPhoneNumber, $pesan));
        }
        return redirect(route('pendaftaran.beranda'))->with('success', 'Konfirmasi Pendaftaran Berhasil!');
    }
}
