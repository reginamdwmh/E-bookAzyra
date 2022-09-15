<?php

namespace App\Http\Controllers;

use App\Models\TransaksiUmum;
use Illuminate\Http\Request;

class LaporanDataUmumController extends Controller
{
    public function indexlaporanumum()
    {
         $transaksi_umum = TransaksiUmum::select('*')
                                        ->get();

        return view('Laporan.LaporanDataUmum.index',['transaksi_umum' => $transaksi_umum]);
    }
}
