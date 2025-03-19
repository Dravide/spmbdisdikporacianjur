<?php

namespace App\Http\Controllers\operator;

use App\Models\Kelulusan;
use App\Exports\Afirmasi;
use App\Exports\AkademikDanNon;
use App\Exports\AnakGuru;
use App\Exports\PindahTugas;
use App\Exports\Ranking;
use App\Exports\Raport;
use App\Exports\Tahfidz;
use App\Exports\Zonasi;
use App\Exports\ExportData;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;


class exporExcelController extends Controller
{
    public function index()
    {
        return view('operator.unduh-excel');
    }

    public function zonasi()
    {
        return Excel::download(new Zonasi(), 'Zonasi - '.Carbon::parse(now())->translatedFormat('m F Y u').'.xlsx');
    }

    public function pana()
    {
        return Excel::download(new AkademikDanNon(), 'AkademikDanNon - '.Carbon::parse(now())->translatedFormat('m F Y u').'.xlsx');
    }

    public function tahfidz()
    {
        return Excel::download(new Tahfidz(), 'Tahfidz - '.Carbon::parse(now())->translatedFormat('m F Y u').'.xlsx');
    }

    public function afirmasi()
    {
        return Excel::download(new Afirmasi(), 'Afirmasi - '.Carbon::parse(now())->translatedFormat('m F Y u').'.xlsx');
    }
    public function anakguru()
    {
        return Excel::download(new AnakGuru(), 'AnakGuru - '.Carbon::parse(now())->translatedFormat('m F Y u').'.xlsx');
    }

    public function pindahtugas()
    {
        return Excel::download(new PindahTugas(), 'PindahTugas - '.Carbon::parse(now())->translatedFormat('m F Y u').'.xlsx');
    }

    public function raport()
    {
        return Excel::download(new Raport(), 'Raport - '.Carbon::parse(now())->translatedFormat('m F Y u').'.xlsx');
    }

    public function ranking()
    {
        return Excel::download(new Ranking(), 'Ranking - '.Carbon::parse(now())->translatedFormat('m F Y u').'.xlsx');
    }
    public function exportdata(){
        $idSekolah = \Auth::user()->sekolah->id;
        $count = Kelulusan::where('sekolah_id', $idSekolah)->count();
        if($count == 0) {
            return view('errors.belumUploadKelulusan');
        }
        // dd($count);
        return Excel::download(new ExportData(), 'Data Keseluruhan -'.Carbon::parse(now())->translatedFormat('m F Y u').'.xlsx');
    }





}
