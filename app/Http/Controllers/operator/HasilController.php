<?php

namespace App\Http\Controllers\operator;

use App\DataTables\HasilsDataTable;
use App\Http\Controllers\Controller;
use App\Imports\HasilImport;
use App\Models\Kelulusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class HasilController extends Controller
{
    public function index(HasilsDataTable $hasilsDataTable)
    {
        return $hasilsDataTable
            ->with('kode', \Auth::user()->sekolah->id)
            ->render('operator.hasil');

    }

    public function import(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new HasilImport(), storage_path('app/public/excel/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return redirect()->route('operator.hasil')->with('sukses','Data Berhasil Diimport!');
        } else {
            //redirect
            return redirect()->route('operator.hasil')->with('error','Data Gagal Diimport!');
        }
    }

    public function reset()
    {
        Kelulusan::whereSekolahId(\Auth::user()->sekolah->id)->delete();

        return back()->with('sukses', 'Data Berkasil Di Reset');
    }
}
