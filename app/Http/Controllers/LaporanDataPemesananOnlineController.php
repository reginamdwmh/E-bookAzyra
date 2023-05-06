<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPemesananOnline;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Auth;

class LaporanDataPemesananOnlineController extends Controller
{
    public function indexlaporanpemesananonline()
    {
        $users = UsersModel::select('*')
                 ->get();
        $transaksi_pemesanan_online = TransaksiPemesananOnline::select('*')
                        ->get();

        $user = Auth::user();
        if($user->role == 'admin'){
            return view('admin.Laporan.LaporanDataPemesananOnline.index', ['transaksi_pemesanan_online' => $transaksi_pemesanan_online,'users' => $users]);
        } else if($user->role == 'user'){
            return view('Laporan.LaporanDataPemesananOnline.index', ['transaksi_pemesanan_online' => $transaksi_pemesanan_online,'users' => $users]);
        }

    }


    public function cetaklaporantransaksipemesananonline($tglawal, $tglakhir){

        $users = UsersModel::select('*')
                 ->get();
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        // $transaksi_bahan = TransaksiBahanModel::whereBetween('created_at',[$tglawal, $tglakhir]);
        // return view('Laporan.LaporanDataBahan.index', compact('transaksi_bahan'));
        $tglawal = date('Y-m-d', strtotime($tglawal));
        $tglakhir = date('Y-m-d', strtotime($tglakhir));
        $tanggal = TransaksiPemesananOnline::wherebetween(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"),[$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('Laporan.LaporanDataPemesananOnline.laporan', ['tanggal' => $tanggal,'users' => $users],compact('tglawal','tglakhir'));
        return $pdf->stream('Laporan-Data-Transaksi-Pemesanan-Online.pdf');    
    }
}
