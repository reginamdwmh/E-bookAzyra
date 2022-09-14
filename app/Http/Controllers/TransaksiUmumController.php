<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiUmumController extends Controller
{
    public function index()
    {
        return view ('Transaksi.TransaksiDataUmum.index');
    }
}
