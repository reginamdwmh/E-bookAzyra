<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPemesananOnline;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;

class LaporanDataPemesananOnlineController extends Controller
{
    public function indexlaporanpemesananonline()
    {
        $transaksi_pemesanan_online = DB::table('transaksi_pemesanan_online')->paginate(10);

        return view('Laporan.LaporanDataPemesananOnline.index', ['transaksi_pemesanan_online' => $transaksi_pemesanan_online]);
    }


    public function cetaklaporantransaksipemesananonline($tglawal, $tglakhir){
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        // $transaksi_bahan = TransaksiBahanModel::whereBetween('created_at',[$tglawal, $tglakhir]);
        // return view('Laporan.LaporanDataBahan.index', compact('transaksi_bahan'));
        $tanggal = TransaksiPemesananOnline::wherebetween('created_at', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('Laporan.LaporanDataPemesananOnline.laporan', ['tanggal' => $tanggal]);
        return $pdf->stream('Laporan-Data-Transaksi-Pemesanan-Online.pdf');    
    }
}
