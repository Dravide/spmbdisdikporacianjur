<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\DataPendaftar;
use App\Models\Jalur;
use Illuminate\Http\Request;

class JalurPendaftaranController extends Controller
{
    public function index()
    {
        $jalur = Jalur::all();
        $datas = DataPendaftar::where('id_users', auth()->user()->id)->first();
        return view('pendaftaran.jalurpendaftaran')
            ->with([
                'jalur' => $jalur,
                'datas' => $datas
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jalur' => 'required'
        ]);
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
        $datas = DataPendaftar::where('id_users', auth()->user()->id)->first();
        $datas->id_jalur = $request->jalur;
        $datas->save();
        return redirect()->route('pendaftaran.jalur');
    }
}
