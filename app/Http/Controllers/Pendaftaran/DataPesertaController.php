<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\DataPendaftar;
use App\Models\Jalur;
use App\Models\Koordinat;
use App\Models\PesertaDidik;
use App\Models\SekolahAsal;
use Illuminate\Http\Request;
use Storage;

class DataPesertaController extends Controller
{
    public function index()
    {
        return view('pendaftaran.datapeserta');
    }

    public function storeLuarKab(Request $request)
    {
//        dd($request);

        $request->validate([
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|in:P,L',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'nisn' => 'required|numeric',
            'nik' => 'required|numeric',
            'alamat' => 'required|string',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'desa' => 'required|string',
            'dusun' => 'required|string',
            'whatsapp' => 'required|numeric',
            'nama_ibu' => 'required|string',
            'pekerjaan_ibu' => 'required|string',
            'penghasilan_ibu' => 'required|string',
            'nama_ayah' => 'required|string',
            'pekerjaan_ayah' => 'required|string',
            'penghasilan_ayah' => 'required|string',
            'nama_wali' => 'required|string',
            'pekerjaan_wali' => 'required|string',
            'penghasilan_wali' => 'required|string',
            'lat' => 'required',
            'lon' => 'required',
            'npsn' => 'required',
            'nama_asal_sekolah' => 'required',
            'jalur' => 'required'
        ]);

        $asal_sekolah = SekolahAsal::updateOrCreate(['npsn' => $request->npsn], ['npsn' => $request->npsn, 'nama' => $request->nama_asal_sekolah]);
        if (isset(\Auth::user()->dataPendaftar->jalur->id) && \Auth::user()->dataPendaftar->jalur->id != $request->jalur) {
            $jalurObject = Jalur::find(\Auth::user()->dataPendaftar->jalur->id);
            if ($jalurObject) {
                $elementsToRemove = ["1", "2", "3", "4"];
                $filteredBerkas = array_values(array_diff($jalurObject->berkas, $elementsToRemove));
                if (is_array($filteredBerkas)) {
                    foreach ($filteredBerkas as $berkasId) {
                        // Assuming you have a model named Berkas which has the file information
                        $berkas = \App\Models\Verval::where('id_pendaftar', \Auth::user()->username)->where('id_berkas', $berkasId)->where('deleted_at', null)->first();
                        if ($berkas) {
                            $berkas->delete();
                            $berkas->status = NULL;
                            $berkas->save();
                            // Delete the file from storage, assuming the file path is stored in 'path' attribute
                            Storage::delete('public/' . $berkas->data_berkas);
                            // Delete the record from the database
                            $berkas->delete();
                        }
                    }
                }
            }
        }
        DataPendaftar::updateOrCreate(['nisn' => $request->nisn], [
            'id_users' => auth()->user()->id,
            'id_jalur' => $request->jalur,
            'id_sekolah_asals' => $asal_sekolah->id,
            'whatsapp' => $request->whatsapp
        ]);
        Koordinat::updateOrCreate(['nisn' => $request->nisn], ['latitude' => $request->lat, 'longitude' => $request->lon]);

        PesertaDidik::updateOrCreate(['nisn' => $request->nisn], [
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nik' => $request->nik,
            'alamat_jalan' => $request->alamat,
            'desa_kelurahan' => $request->desa,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'nama_dusun' => $request->dusun,
            'nama_ibu_kandung' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'nama_wali' => $request->nama_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'lintang' => $request->lat,
            'bujur' => $request->lon,
        ]);


        return redirect()->route('Pendaftaran.datapeserta')->with('sukses', 'Data Pendaftar Berhasil di Simpan.');
    }

    public function storeDalamKab(Request $request)
    {
        $request->validate([
            'whatsapp' => 'required',
            'npsn' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'jalur' => 'required'
        ]);
        if (isset(\Auth::user()->dataPendaftar->jalur->id) && \Auth::user()->dataPendaftar->jalur->id != $request->jalur) {
            // Assuming you have a way to retrieve the 'jalur' object with 'berkas' attribute
            $jalurObject = Jalur::find(\Auth::user()->dataPendaftar->jalur->id);
            if ($jalurObject) {
                // Decode the JSON array of IDs
                $berkasIds = $jalurObject->berkas;
                // Elemen yang ingin dihapus
                $elementsToRemove = ["1", "2", "3", "4"];

                $filteredBerkas = array_values(array_diff($jalurObject->berkas, $elementsToRemove));
                if (is_array($filteredBerkas)) {
                    foreach ($filteredBerkas as $berkasId) {
                        // Assuming you have a model named Berkas which has the file information
                        $berkas = \App\Models\Verval::where('id_pendaftar', \Auth::user()->username)->where('id_berkas', $berkasId)->where('deleted_at', null)->first();
                        if ($berkas) {
                            $berkas->delete();
                            $berkas->status = NULL;
                            $berkas->save();
                            // Delete the file from storage, assuming the file path is stored in 'path' attribute
                            Storage::delete('public/' . $berkas->data_berkas);
                            // Delete the record from the database
                            $berkas->delete();
                        }
                    }
                }
            }
        }
        $data = DataPendaftar::where('id_users', auth()->user()->id)->first();
        $data->id_jalur = $request->jalur;
        $data->id_sekolah_asals = $request->npsn;
        $data->whatsapp = $request->whatsapp;
        $data->save();
        Koordinat::updateOrCreate(['nisn' => auth()->user()->dataPendaftar->nisn], ['latitude' => $request->lat, 'longitude' => $request->lon]);

        return redirect()->route('Pendaftaran.datapeserta')->with('sukses', 'Data Pendaftar Berhasil di Simpan.');

    }

    public function CekNISN(Request $request)
    {
        $request->validate([
            'nisn' => 'required|numeric'
        ]);

        $data = PesertaDidik::where('nisn', $request->nisn)->first();
        dd($data);
    }
}
