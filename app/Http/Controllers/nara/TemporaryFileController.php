<?php

namespace App\Http\Controllers\nara;

use App\Http\Controllers\Controller;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class TemporaryFileController extends Controller
{
    public function index()
    {
        return TemporaryFile::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'folder' => ['required'],
            'filename' => ['required'],
        ]);

        return TemporaryFile::create($request->validated());
    }

    public function show(TemporaryFile $temporaryFile)
    {
        return $temporaryFile;
    }

    public function update(Request $request, TemporaryFile $temporaryFile)
    {
        $request->validate([
            'folder' => ['required'],
            'filename' => ['required'],
        ]);

        $temporaryFile->update($request->validated());

        return $temporaryFile;
    }

    public function destroy(TemporaryFile $temporaryFile)
    {
        $temporaryFile->delete();

        return response()->json();
    }
}
