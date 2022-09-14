<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanDataUmumController extends Controller
{
    public function index()
    {
        return view('Laporan.LaporanDataUmum.index');
    }
}
