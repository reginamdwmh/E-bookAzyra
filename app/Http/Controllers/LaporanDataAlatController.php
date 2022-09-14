<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiAlatModel;
use Barryvdh\DomPDF\Facade\PDF;

class LaporanDataAlatController extends Controller
{
    public function indexlaporanalat()
    {
        $transaksi_alat = DB::table('transaksi_alat')->paginate(10);

        return view('Laporan.LaporanDataAlat.index',['transaksi_alat' => $transaksi_alat]);
    }

    public function cetaklaporantransaksialat($tglawal, $tglakhir){
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        // $transaksi_bahan = TransaksiBahanModel::whereBetween('created_at',[$tglawal, $tglakhir]);
        // return view('Laporan.LaporanDataBahan.index', compact('transaksi_bahan'));
        $tanggal = TransaksiAlatModel::wherebetween('created_at', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('Laporan.LaporanDataAlat.laporan', ['tanggal' => $tanggal]);
        return $pdf->stream('Laporan-Data-Transaksi-Alat.pdf');    
    }
}
