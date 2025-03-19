<?php

namespace App\Http\Controllers\home;

use App\DataTables\PendaftarDataTable;
use App\Http\Controllers\Controller;
use App\Models\DataPendaftar;
use App\Models\Jalur;
use App\Models\PesertaDidik;
use App\Models\Sekolah;
use App\Models\SekolahAsal;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class HomeController extends Controller
{
    public function index()
    {
        $datas = Sekolah::whereStatusOnline('online')->get();
        return view('home.index', compact('datas'));
    }
    public function index2()
    {
        $datas = Sekolah::whereStatusOnline('online')->get();
        $jumlahZonasi = DataPendaftar::whereIdJalur('1')->count();
        $jumlahPrestasi = DataPendaftar::whereIn('id_jalur', ['2', '3', '4', '5'])->count();
        $jumlahAfirmasi = DataPendaftar::whereIdJalur('6')->count();
        $jumlahPTOT = DataPendaftar::whereIn('id_jalur', ['7','8'])->count();
        return view('home.index2', compact(['datas','jumlahZonasi','jumlahPrestasi','jumlahAfirmasi','jumlahPTOT']));
    }
    
    public function index3()
    {
        $datas = Sekolah::whereStatusOnline('online')->get();
        $jumlahZonasi = DataPendaftar::whereIdJalur('1')->count();
        $jumlahPrestasi = DataPendaftar::whereIn('id_jalur', ['2', '3', '4', '5'])->count();
        $jumlahAfirmasi = DataPendaftar::whereIdJalur('6')->count();
        $jumlahPTOT = DataPendaftar::whereIn('id_jalur', ['7','8'])->count();
        return view('home.index3', compact(['datas','jumlahZonasi','jumlahPrestasi','jumlahAfirmasi','jumlahPTOT']));
    }
    
    

    public function maintenance()
    {
        return view('maintenance');
    }

    public function getRekapSekolah(Request $request)
    {
        $npsn = $request->id;
        $dataSekolah = Sekolah::where('npsn', $npsn)->first();
        $ZNS = DataPendaftar::where('id_sekolah', $dataSekolah->id)->where('id_jalur', 1)->count();
        $PRK = DataPendaftar::where('id_sekolah', $dataSekolah->id)->where('id_jalur', 2)->count();
        $PRT = DataPendaftar::where('id_sekolah', $dataSekolah->id)->where('id_jalur', 3)->count();
        $PAN = DataPendaftar::where('id_sekolah', $dataSekolah->id)->where('id_jalur', 4)->count();
        $PTZ = DataPendaftar::where('id_sekolah', $dataSekolah->id)->where('id_jalur', 5)->count();
        $AFR = DataPendaftar::where('id_sekolah', $dataSekolah->id)->where('id_jalur', 6)->count();
        $PTO = DataPendaftar::where('id_sekolah', $dataSekolah->id)->where('id_jalur', 7)->count();
        $AGR = DataPendaftar::where('id_sekolah', $dataSekolah->id)->where('id_jalur', 8)->count();
        $data = [
            'img' => $dataSekolah->img,
            'namaSekolah' => $dataSekolah->nama_sekolah,
            'alamat' => $dataSekolah->alamat,
            'npsn' => $dataSekolah->npsn,
            'ZNS' => $ZNS,
            'PRK' => $PRK,
            'PRT' => $PRT,
            'PAN' => $PAN,
            'PTZ' => $PTZ,
            'AFR' => $AFR,
            'PTO' => $PTO,
            'AGR' => $AGR,

        ];


        return response()->json($data, 200);
    }

    public function datasekolah()
    {
        $datas = Sekolah::where('status_online', 'online')->get();
        return view('home.datasekolah')->with(compact('datas'));
    }

    public function detailSekolah(PendaftarDataTable $pendaftarDataTable, $id){
        $datas = Sekolah::where('id', $id)->first();
        $jumlahPendaftar = DataPendaftar::where('id_sekolah', $datas->id)->count();
        $jumlahPendaftarTerverifikasi = DataPendaftar::where('id_sekolah', $datas->id)->where('konfir', '1')->where('verval', '1')->count();
        $countZonasi = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 1)->count();
        $countZonasiVerified = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 1)->where('konfir', 1)->where('verval', 1)->count();
        $countPrk = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 2)->count();
        $countPrkVerified = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 2)->where('konfir', 1)->where('verval', 1)->count();
        $countPra = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 3)->count();
        $countPraVerified = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 3)->where('konfir', 1)->where('verval', 1)->count();
        $countPna = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 4)->count();
        $countPnaVerified = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 4)->where('konfir', 1)->where('verval', 1)->count();
        $countPtz = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 5)->count();
        $countPtzVerified = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 5)->where('konfir', 1)->where('verval', 1)->count();
        $countAfr = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 6)->count();
        $countAfrVerified = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 6)->where('konfir', 1)->where('verval', 1)->count();
        $countPto = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 7)->count();
        $countPtoVerified = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 7)->where('konfir', 1)->where('verval', 1)->count();
        $countAg = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 8)->count();
        $countAgVerified = DataPendaftar::where('id_sekolah', $datas->id)->where('id_jalur', 8)->where('konfir', 1)->where('verval', 1)->count();

        $dataPendaftars = DataPendaftar::where('id_sekolah', $id)->get();

        $dataTbl = [];

        // foreach ($dataPendaftars as $dataPendaftar) {
        //     $dataSiswa = PesertaDidik::where('nisn', $dataPendaftar->nisn)->first();
        //     $sekolahAsal = SekolahAsal::where('id', $dataPendaftar->id_sekolah_asals)->first();
        //     // dd($sekolahAsal);
        //     $jalur = Jalur::where('id', $dataPendaftar->id_jalur)->first();
        //     $status = '';
        //     if($dataPendaftar->verval == 1 && $dataPendaftar->konfir == 1 ) {
        //         $status = "Terverifikasi";
        //     } else {
        //         $status = "Belum Terverifikasi";
        //     }
        //     $dataTbl[] = collect([
        //         'nama' => $dataSiswa->nama,
        //         'nama_sekolah' => $sekolahAsal->nama,
        //         'jalur' =>$jalur->nama_jalur,
        //         'status' => $status
        //     ]);
//            $dataPendaftar['nama'] = $dataSiswa->nama;
//            $dataPendaftar['nama_sekolah'] = $datas->nama_sekolah;
//            $dataPendaftar['jalur'] = $jalur->nama_jalur;
//            $dataPendaftar['status'] = $status;

        // }

//        dd($collections);

        if($datas != null) {
            return $pendaftarDataTable
                ->with('kode',  $id)
                ->render('home.detailsekolah', compact(
                [
                    'datas',
                    'jumlahPendaftar',
                    'jumlahPendaftarTerverifikasi',
                    'countZonasi', 'countZonasiVerified',
                    'countPrk', 'countPrkVerified',
                    'countPra', 'countPraVerified',
                    'countPna', 'countPnaVerified',
                    'countPtz', 'countPtzVerified',
                    'countAfr', 'countAfrVerified',
                    'countPto', 'countPtoVerified',
                    'countAg', 'countAgVerified',
                    'dataTbl'
                ]));

        }
        return abort(404);
    }

    public function validasi($data){

        try {
            $decryptData = Crypt::decrypt($data);
            $getDetailsUsers = User::where('username', $decryptData)->first();
            $getDetailsPendaftar = DataPendaftar::where('id_users', $getDetailsUsers->id)->first();
            return view('home.validasiDokumen')->with(['data' => $getDetailsPendaftar, 'username' => $decryptData]);
        } catch (\Exception $e){
//            return $e->getMessage();
            return view('errors.gagalValidasiFile');
        }




//        dd(Crypt::decrypt($data));
    }



    public function unduh()
    {
        return view('home.unduh');
    }
}
