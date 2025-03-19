<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemetaanDomisiliController extends Controller
{
    public function index()
    {
        return view('operator.pemetaan-domisili');
    }
}
