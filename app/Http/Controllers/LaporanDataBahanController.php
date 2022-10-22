<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiBahanModel;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\UsersModel;

class LaporanDataBahanController extends Controller
{
    public function indexlaporanbahan()
    {
        $users = UsersModel::select('*')
                 ->get();
        $transaksi_bahan = TransaksiBahanModel::select('*')
                            ->get();

        return view('Laporan.LaporanDataBahan.index',['transaksi_bahan' => $transaksi_bahan,'users' => $users]);
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
