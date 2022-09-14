<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenjualanMakanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;

class LaporanDataPenjualanMakananController extends Controller
{
    public function indexlaporanpenjualanmakanan()
    {
        $transaksi_penjualan_makanan = DB::table('transaksi_penjualan_makanan')->paginate(10);

        return view('Laporan.LaporanDataPenjualanMakanan.index',['transaksi_penjualan_makanan' => $transaksi_penjualan_makanan]);
    }


    public function cetaklaporantransaksipenjualanmakanan($tglawal, $tglakhir){
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        // $transaksi_bahan = TransaksiBahanModel::whereBetween('created_at',[$tglawal, $tglakhir]);
        // return view('Laporan.LaporanDataBahan.index', compact('transaksi_bahan'));
        $tanggal = TransaksiPenjualanMakanan::wherebetween('created_at', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('Laporan.LaporanDataPenjualanMakanan.laporan', ['tanggal' => $tanggal]);
        return $pdf->stream('Laporan-Data-Transaksi-Penjualan-Makanan.pdf');    
    }
}
