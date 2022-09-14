<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiBahanModel;
use Barryvdh\DomPDF\Facade\PDF;

class LaporanDataBahanController extends Controller
{
    public function indexlaporanbahan()
    {
        $transaksi_bahan = DB::table('transaksi_bahan')->paginate(10);

        return view('Laporan.LaporanDataBahan.index',['transaksi_bahan' => $transaksi_bahan]);
    }

    public function cetaklaporantransaksibahan($tglawal, $tglakhir){
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        // $transaksi_bahan = TransaksiBahanModel::whereBetween('created_at',[$tglawal, $tglakhir]);
        // return view('Laporan.LaporanDataBahan.index', compact('transaksi_bahan'));
        $tanggal = TransaksiBahanModel::wherebetween('created_at', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('Laporan.LaporanDataBahan.laporan', ['tanggal' => $tanggal]);
        return $pdf->stream('Laporan-Data-Transaksi-Bahan.pdf');    
    }

    
   
}