<?php

namespace App\Http\Controllers;

use App\Models\TransaksiUmum;
use Illuminate\Http\Request;

class LaporanDataUmumController extends Controller
{
    public function indexlaporanpenjualanmakanan()
    {
         $transaksi_penjualan_makanan = TransaksiUmum::select('*')
                                        ->get();

        return view('Laporan.LaporanDataPenjualanMakanan.index',['transaksi_penjualan_makanan' => $transaksi_penjualan_makanan]);
    }
}
