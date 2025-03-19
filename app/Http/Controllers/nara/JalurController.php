<?php

namespace App\Http\Controllers\nara;

use App\Http\Controllers\Controller;
use App\Http\Requests\JalurRequest;
use App\Models\Berkas;
use App\Models\Jalur;

class JalurController extends Controller
{
    public function index()
    {
        $berkass = Berkas::all();
        $jalur = Jalur::orderBy('created_at')->paginate('10');
        foreach ($jalur as $data) {
            $data->namaberkas = Berkas::select(['id', 'nama_berkas', 'kode'])->whereIn('id', $data->berkas)
                ->get();
        }
        return view('nara.jalur.index', compact('jalur', 'berkass'));
    }

    public function store(JalurRequest $request)
    {
        $jalur = new Jalur();
        $jalur->nama_jalur = $request->nama_jalur;
        $jalur->kode = $request->kode;
        $jalur->svg = $request->svg;
        $jalur->berkas = $request->berkas;
        $jalur->save();
        return redirect()
            ->route('jalur.index')
            ->with('sukses', 'Jalur ' . $request->nama_jalur . ' Berhasil ditambahkan');
    }

    public function edit($id)
    {
        $berkass = Berkas::all();
        $jalur = Jalur::findOrFail($id);
        return view('nara.jalur.edit', compact('jalur', 'berkass'));
    }

    public function create()
    {
        $berkass = Berkas::all();
        return view('nara.jalur.create', compact('berkass'));
    }

    public function show(Jalur $jalur)
    {
        return response()->json([
            'data' => $jalur
        ]);
    }

    public function update(JalurRequest $request, Jalur $jalur)
    {

        $jalur->nama_jalur = $request->nama_jalur;
        $jalur->kode = $request->kode;
        $jalur->svg = $request->svg;
        $jalur->berkas = $request->berkas;
        $jalur->update();

        return redirect()
            ->route('jalur.index')
            ->with('sukses', 'Jalur ' . $request->nama_jalur . ' Berhasil diperbaharui.');
    }

    public function destroy(Jalur $jalur)
    {
        $jalur->delete();

        return redirect()
            ->route('jalur.index')
            ->with('sukses', 'Jalur Berhasil dihapus.');
    }

    public function jadwal()
    {
        $jalur = Jalur::all();
        return view('nara.jalur.jadwal', compact('jalur'));
    }
}
