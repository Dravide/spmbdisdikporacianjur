<?php

namespace App\Http\Controllers\nara;

use App\Http\Controllers\Controller;
use App\Models\Berkas;
use Illuminate\Http\Request;


class BerkasController extends Controller
{
    public function index()
    {
        
        return view('nara.berkas.index', ['berkas' => Berkas::paginate(7),
            'edit' => null]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'nama_berkas' => 'required',
            'kode' => 'required',
            'svg' => 'required',
            'jenis_berkas' => 'required',
        ]);
        Berkas::create($credentials);
        return redirect()
            ->route('berkas.index')
            ->with('sukses', 'Berkas ' . $request->nama_berkas . ' Berhasil ditambahkan');

    }

    public function edit($id)
    {
        $edit = Berkas::findOrFail($id);
        return view('nara.berkas.index', ['edit' => $edit, 'berkas' => Berkas::paginate(5)]);
    }

    public function update(Request $request, $id)
    {
        $credentials = $request->validate([
            'nama_berkas' => 'required',
            'kode' => 'required',
            'svg' => 'required',
            'jenis_berkas' => 'required',
        ]);
        Berkas::where('id', $id)->update($credentials);
        return redirect()
            ->route('berkas.index')
            ->with('sukses', 'Berkas ' . $request->nama_berkas . ' Berhasil diubah');
    }

    public function destroy($id)
    {
        Berkas::destroy($id);
        return redirect()
            ->route('berkas.index')
            ->with('sukses', 'Berkas Berhasil dihapus');
    }


}
