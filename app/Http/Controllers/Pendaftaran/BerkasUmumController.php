<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Berkas;
use App\Models\DataNilai;
use App\Models\DataPrestasi;
use App\Models\TemporaryFile;
use App\Models\Verval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BerkasUmumController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Verval::where('id', $request->id)->first();
            return view('components.pendaftaran.off-canvas', compact('data'));
        }
        $berkasumum = Berkas::where('jenis_berkas', 1)->get();
        return view('pendaftaran.berkasumum', ['berkasumum' => $berkasumum]);
    }

    public function uploadberkas(Request $request)
    {
        if ($request->folder) {
            $get_folder = substr($request->folder, 0, 29);
//            dd($get_folder);
            $tmp_file = TemporaryFile::where('folder', $get_folder)->first();
            $folder = Berkas::find($request->idberkas);
//            dd($request);
            $extension = pathinfo(storage_path('public/berkas/tmp/' . $get_folder . '/' . $tmp_file->filename), PATHINFO_EXTENSION);
            $filename = Str::random(7) . '_' . Auth::user()->username . '_' . $folder->kode . '.' . $extension;
            if ($tmp_file) {
                Storage::copy('public/berkas/tmp/' . $get_folder . '/' . $tmp_file->filename, 'public/berkas/' . $folder->kode . '/' . $filename);
                Verval::create([
                    'id_pendaftar' => Auth::user()->username,
                    'id_berkas' => $request->idberkas,
                    'data_berkas' => 'berkas/' . $folder->kode . '/' . $filename,
                ]);
                TemporaryFile::where('folder', $request->folder)->delete();
                Storage::deleteDirectory('public/berkas/tmp/' . $get_folder);
                return back()->with('sukses', 'Berkas ' . $folder->nama_berkas . ' berhasil disimpan!');
            }
        }
        return back()->with('error', 'Upload File Terlebih Dahulu');
    }

    public function delete(Request $request)
    {
        $cekdata = Verval::where('id', $request->id)->where('id_pendaftar', Auth::user()->username)->first();
        if ($cekdata == null) {
            return back()->with('error', 'File Tidak Ditemukan');
        }
        $request->validate([
            'id' => 'required'
        ]);
        $data = Verval::where('id', $request->id)->first();
        if ($data) {
            Storage::delete('public/' . $data->data_berkas);
            $data->delete();
            return redirect()->back()->with('sukses', 'Berkas berhasil dihapus!');
        }
        return redirect()->back()->with('error', 'Berkas tidak ditemukan!');
    }

    public function updateData(Request $request)
    {
        $getVerval = Verval::where('id', $request->id)->first();
        if($getVerval->id_berkas == 5) {
            // Bukti Ranking
            $data = $request->except('_token', 'id');
            $id = $request->input('id');
            foreach ($data as $key => $value) {
                DataNilai::updateOrCreate(['verval_id'=>$id, 'key'=>$key], ['value' => $value]);
            }
            return redirect()->back()->with('sukses', 'Data Bukti Ranking Berhasil disimpan');
        } else if($getVerval->id_berkas == 6){
            // Raport 5sm1 s.d 6sm1
            $data = $request->except('_token', 'id');
            $id = $request->input('id');
            foreach ($data as $key => $value) {
                DataNilai::updateOrCreate(['verval_id'=>$id, 'key'=>$key], ['value' => $value]);

            }
            return redirect()->back()->with('sukses', 'Data Nilai Raport Berhasil disimpan');
        } else if($getVerval->id_berkas == 7) {
            // Raport 4sm1 s.d 6sm1
            $data = $request->except('_token', 'id');
            $id = $request->input('id');
            foreach ($data as $key => $value) {
                DataNilai::updateOrCreate(['verval_id'=>$id, 'key'=>$key], ['value' => $value]);
            }
            return redirect()->back()->with('sukses', 'Data Nilai Raport Berhasil disimpan');
        } else if($getVerval->id_berkas == 14) {
            // Akreditasi Sekolah
            $data = $request->except('_token', 'id');
            $id = $request->input('id');
            foreach ($data as $key => $value) {
                DataNilai::updateOrCreate(['verval_id'=>$id, 'key'=>$key], ['value' => $value]);
            }
            return redirect()->back()->with('sukses', 'Data Akreditasi Berhasil disimpan');
        } else if($getVerval->id_berkas == 10) {
            // Akreditasi Sekolah
            $data = $request->except('_token', 'id');
            $id = $request->input('id');
            foreach ($data as $key => $value) {
                DataNilai::updateOrCreate(['verval_id'=>$id, 'key'=>$key], ['value' => $value]);
            }
            return redirect()->back()->with('sukses', 'Data Kartu Afirmasi Berhasil disimpan');
        } else if($getVerval->id_berkas == 8) {
            $id = $request->input('id');
            $dataPrestasi = $request->input('data');
            foreach ($dataPrestasi as $item) {
                DataPrestasi::updateOrCreate(['data'=>$item['prestasi'], 'verval_id' => $id], [ 'juara' => $item['juara'], 'tingkat'=>$item['tingkat'], 'lomba'=>$item['lomba']]);
            }

            return redirect()->back()->with('sukses', 'Data Prestasi Akademik Berhasil disimpan');
        } else {
            return redirect()->back()->with('error', 'Data Berkas Tidak Ditemukan Berhasil disimpan');
        }


    }

    public function upload(Request $request)
    {
        if ($request->hasFile('folder')) {
            $file = $request->file('folder');
            $filename = $file->getClientOriginalName();
            $folder = uniqid('berkas', TRUE);
            $file->storeAs('public/berkas/tmp/' . $folder, $file->getClientOriginalName());
            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
            ]);
            return $folder;
        }
        return 'gagal';
    }

    public function tmpDelete()
    {
        $tmp_file = TemporaryFile::where('folder', request()->getContent())->first();
        if ($tmp_file) {
            Storage::deleteDirectory('public/berkas/tmp/' . $tmp_file->folder);
            $tmp_file->delete();
            return 'sukses';
        }
        return 'gagal';
    }
}
