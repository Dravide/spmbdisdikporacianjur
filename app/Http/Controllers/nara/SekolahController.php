<?php

namespace App\Http\Controllers\nara;

use App\Http\Controllers\Controller;
use App\Http\Requests\SekolahRequest;
use App\Models\Sekolah;
use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SekolahController extends Controller
{
    public function index(): View
    {
        $sekolahs = Sekolah::orderBy('status_online')->paginate('25');

        return view('nara.sekolah.index')->with(compact('sekolahs'));
    }

    public function store(SekolahRequest $request)
    {
        $credential = $request->validated();

        return redirect()->route('sekolah.index')->with('sukses', 'Data Sekolah Berhasil Ditambahkan');

    }

    public function show(Sekolah $sekolah)
    {
        return $sekolah;
    }

    public function update(Request $request)
    {

        $request->validate([
            'npsn' => 'required',
            'nama_sekolah' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'alamat' => 'required',
            'folder' => 'sometimes',
            'operator' => 'required',
            'password' => 'sometimes',
            'confirm_password' => 'sometimes|same:password',
        ]);


        if ($request->folder) {
            $tmp_file = TemporaryFile::where('folder', $request->folder)->first();
            $extension = pathinfo(storage_path('public/berkas/tmp/' . $request->folder . '/' . $tmp_file->filename), PATHINFO_EXTENSION);
            $filename = Str::random(7) . '_' . Auth::user()->username . '.' . $extension;
            if ($tmp_file) {
                Storage::copy('public/berkas/tmp/' . $request->folder . '/' . $tmp_file->filename, 'public/logosekolah/' . $request->npsn . '/' . $filename);
                $data = Sekolah::whereNpsn($request->npsn)->first();
                $data->update([
                    'npsn' => $request->npsn,
                    'nama_sekolah' => $request->nama_sekolah,
                    'lintang' => $request->lat,
                    'bujur' => $request->lon,
                    'alamat_jalan' => $request->alamat,
                    'operator' => $request->operator,
                    'img' => 'logosekolah/' . $request->npsn . '/' . $filename,
                    'status_online' => 'online'
                ]);

                User::firstOrCreate(['username' => $request->npsn], ['password' => bcrypt($request->password), 'role' => 'nara', 'token' => Str::upper(Str::random(5))]);

                TemporaryFile::where('folder', $request->folder)->delete();
                Storage::deleteDirectory('public/berkas/tmp/' . $request->folder);
                return back()->with('sukses', 'Berkas berhasil disimpan!');
            }
        } else {
            $data = Sekolah::whereNpsn($request->npsn)->first();

            $updateData = [
                'npsn' => $request->npsn,
                'nama_sekolah' => $request->nama_sekolah,
                'lat' => $request->lat,
                'lon' => $request->lon,
                'alamat_jalan' => $request->alamat,
                'operator' => $request->operator,
                'status_online' => 'online'
            ];

            $cekUser = User::where('username', $request->npsn)->first();
            if($cekUser == null) {
                if ($request->password == null) {
                    User::firstOrCreate(['username' => $request->npsn], ['role' => 'nara', 'token' => Str::upper(Str::random(5))]);
                } else {
                    User::firstOrCreate(['username' => $request->npsn], ['password' => bcrypt($request->password), 'role' => 'operator', 'token' => Str::upper(Str::random(5))]);
                }
                $data->update($updateData);
                return redirect()->route('sekolah.index')->with('sukses', 'Data 1 Sekolah Berhasil Diubah');
            } else {
                $selectUser = User::where('username', $request->npsn)->first();
                $datap = [
                    'password' => bcrypt($request->password),
                ];
                $selectUser->update($datap);
                $data->update($updateData);
                return redirect()->route('sekolah.index')->with('sukses', 'Data 1 Sekolah Berhasil Diubah');

            }



            return redirect()->route('sekolah.index')->with('sukses', 'Data 1 Sekolah Berhasil Diubah');
        }


        return redirect()->route('sekolah.index')->with('sukses', 'Data 2 Sekolah Berhasil Diubah');

    }

    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();

        return redirect()->route('sekolah.index')->with('sukses', 'Data Sekolah Berhasil Dihapus');
    }

    public function edit(Sekolah $sekolah): View
    {

        return view('nara.sekolah.edit')->with(compact('sekolah'));
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

    public function create(): View
    {
        return view('nara.sekolah.create');
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
