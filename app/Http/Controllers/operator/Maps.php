<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Maps extends Controller
{
    public function index()
    {
        return view('operator.maps');
    }
}
