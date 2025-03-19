<?php

namespace App\Http\Controllers\operator;

use App\DataTables\RekapVervalDataTable;
use App\Http\Controllers\Controller;

class RekapVervalController extends Controller
{
    public function index(RekapVervalDataTable $rekapVervalDataTable)
    {
        return $rekapVervalDataTable
            ->render('operator.rekapverval');
    }
}
