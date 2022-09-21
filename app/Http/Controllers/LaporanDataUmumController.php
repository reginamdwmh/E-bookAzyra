<?php

namespace App\Http\Controllers;

use App\Models\TransaksiUmum;
use App\Models\TransaksiUmumDetail;
use Barryvdh\DomPDF\Facade\PDF;

class LaporanDataUmumController extends Controller
{
    public function indexlaporanumum()
    {
        $transaksi_umum = TransaksiUmum::select('*')
                            ->get();
        $transaksi_umum_detail = TransaksiUmumDetail::select('*')
                            ->get();

        return view('Laporan.LaporanDataUmum.index',['transaksi_umum' => $transaksi_umum,'transaksi_umum_detail' => $transaksi_umum_detail ]);
    }

    public function cetaklaporantransaksiumum($tglawal, $tglakhir){
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        // $transaksi_bahan = TransaksiBahanModel::whereBetween('created_at',[$tglawal, $tglakhir]);
        // return view('Laporan.LaporanDataBahan.index', compact('transaksi_bahan'));
        $transaksi_umum_detail = TransaksiUmumDetail::select('*')
        ->get();
        $tanggal = TransaksiUmum::wherebetween('created_at', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('Laporan.LaporanDataUmum.laporan', ['tanggal' => $tanggal,'transaksi_umum_detail' => $transaksi_umum_detail]);
        return $pdf->stream('Laporan-Data-Transaksi-Umum.pdf');    
    }
}
