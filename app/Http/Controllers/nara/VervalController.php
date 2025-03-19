<?php

namespace App\Http\Controllers\nara;

use App\Http\Controllers\Controller;
use App\Http\Requests\VervalRequest;
use App\Models\Verval;

class VervalController extends Controller
{
    public function index()
    {
        return Verval::all();
    }

    public function store(VervalRequest $request)
    {
        return Verval::create($request->validated());
    }

    public function show(Verval $verval)
    {
        return $verval;
    }

    public function update(VervalRequest $request, Verval $verval)
    {
        $verval->update($request->validated());

        return $verval;
    }

    public function destroy(Verval $verval)
    {
        $verval->delete();

        return response()->json();
    }
}
