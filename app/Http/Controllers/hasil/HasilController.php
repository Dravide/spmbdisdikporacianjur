<?php

namespace App\Http\Controllers\hasil;

use App\Http\Controllers\Controller;
use App\Models\Kelulusan;
use Barryvdh\DomPDF\Facade\Pdf;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DataPendaftar;
use App\Models\DaftarUlang;
use App\Models\BerkadDaftarUlang;
use App\Models\InformasiTambahan;
use App\Models\Sekolah;
use SimpleSoftwareIO\QrCode;
use Illuminate\Support\Facades\Crypt;
use function Laravel\Prompts\alert;


class HasilController extends Controller
{
    public function index(Request $request)
    {
        if($request->username == "PPDB3YQYZQJ"){
            return view('errors.khusus');
        }
        $mt = $request->method();
        if($mt == 'GET') {
            // START GET METHOD
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
                    text: 'Input Username/No. Pendaftaran dan Tanggal Lahir di Halaman Utama untuk melihat status kelulusan!',
                    showConfirmButton: 1,
                    confirmButtonText: 'Ke Halaman Utama!'
                }).then(function () {
                    window.location = ' ".route('myhome')." ';

                })
            });



        </script>

        ";
        // END GET METHOD
        } else {
            // START POST METHOD
            $username = $request->username;
            $tgl = $request->tglLahir;

            $searchCode = User::where('username', $username)->first();
            if($searchCode == null) {
                return redirect(route('myhome'))->with(['error']);
            }

            // Validasi Tanggal Lahir
            $collectData = DataPendaftar::where('id_users', $searchCode->id)->first();
            $tglLahir = $collectData->dapodik->tanggal_lahir;
            if($tgl != $tglLahir) {
                return redirect(route('myhome'))->with(['error']);
            }

            // VALIDASI LULUS ATAU TIDAK
            $lulus = Kelulusan::where('username', $username)->first();
            if($lulus == null) {
                return redirect(route('myhome'))->with(['error']);
            }

            $getIDSekolah = $collectData->id_sekolah;
            $getSekolah = Sekolah::where('id', $getIDSekolah)->first();

            if($getSekolah->pengumuman == 1) {
             $linkRedirect = $getSekolah->link_pengumuman;
                return redirect()->away($linkRedirect);
            }  else {
                if($lulus->keterangan == "DITERIMA") {
                $berkasDaftarUlang = BerkadDaftarUlang::where('id_sekolah', $collectData->sekolah->id)->where('link', '!=', '-')->get();
                $crypt = Crypt::encrypt($username);
                return view('hasil.index2')->with(compact(['collectData', 'username', 'berkasDaftarUlang', 'crypt']));
                } else {
                    return view('hasil.tidakLulus')->with(compact(['collectData', 'username']));
                }
            }





            // END POST METHOD
        }




    }

    public function unduhKelulusan(Request $request){
        $username = $request->username;
        $searchCode = User::where('username', $username)->first();
        // VALIDASI LULUS ATAU TIDAK
        $lulus = Kelulusan::where('username', $username)->first();
        if($lulus == null) {
            return redirect(route('myhome'))->with(['error']);
        }

        if($lulus->keterangan != "DITERIMA") {
            return redirect(route('myhome'))->with(['error']);
        } else {
            $collectData = DataPendaftar::where('id_users', $searchCode->id)->first();
            $daftarUlang = DaftarUlang::where('id_sekolah', $collectData->sekolah->id)->where('urutAwal', '<=', $lulus->daftarulang)->where('urutAkhir', '>=', $lulus->daftarulang)->first();
            $berkasDaftarUlang = BerkadDaftarUlang::where('id_sekolah', $collectData->sekolah->id)->get();
            $tambahan = InformasiTambahan::where('id_sekolah', $collectData->sekolah->id)->first();
            $pdf = PDF::loadView('cetak.buktiKelulusan', [
                'data' => $collectData,
                'username' => $username,
                'kelulusan' => $lulus,
                'daftarUlang' => $daftarUlang,
                'berkasDaftarUlang' => $berkasDaftarUlang,
                'tambahan' => $tambahan,
                'crypt' => Crypt::encrypt($username)
                ]);
            $pdf->setPaper('A4');
            $pdf->setOption('isRemoteEnabled', true);
            $pdf->setOption('defaultMediaType', 'all');

            return $pdf->stream('Bukti Pendaftaran - ' . $collectData->users->username . '.pdf');
        }




    }

}
