<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenjualanMakanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Auth;

class LaporanDataPenjualanMakananController extends Controller
{
    public function indexlaporanpenjualanmakanan()
    {
        $users = UsersModel::select('*')
                 ->get();
         $transaksi_penjualan_makanan = TransaksiPenjualanMakanan::select('*')
                            ->get();

        $user = Auth::user();
        if($user->role == 'admin'){
            return view('admin.Laporan.LaporanDataPenjualanMakanan.index',['transaksi_penjualan_makanan' => $transaksi_penjualan_makanan,'users' => $users]);
        } else if($user->role == 'user'){
            return view('Laporan.LaporanDataPenjualanMakanan.index',['transaksi_penjualan_makanan' => $transaksi_penjualan_makanan,'users' => $users]);
        }                    
       
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
