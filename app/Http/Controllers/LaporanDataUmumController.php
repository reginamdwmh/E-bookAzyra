<?php

namespace App\Http\Controllers;

use App\Models\TransaksiUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanDataUmumController extends Controller
{
    public function indexlaporanumum()
    {
        $transaksi_umum = TransaksiUmum::select('*',DB::raw("CONCAT(transaksi_umum.keterangan_pemesanan,' : ',transaksi_umum.jumlah_pemesanan) as mitra"))
                            ->get();

        return view('Laporan.LaporanDataUmum.index',['transaksi_umum' => $transaksi_umum]);
    }
}
