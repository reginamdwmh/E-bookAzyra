<?php

namespace App\Http\Controllers;

use App\Models\TransaksiUmum;
use App\Models\TransaksiUmumDetail;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Auth;

class LaporanDataUmumController extends Controller
{
    public function indexlaporanumum()
    {
        $users = UsersModel::select('*')
                 ->get();
        $transaksi_umum = TransaksiUmum::with('get_transaksiumumdetail')->get();

        $user = Auth::user();
        if($user->role == 'admin'){
            return view('admin.Laporan.LaporanDataUmum.index',['transaksi_umum' => $transaksi_umum,'users' => $users]);
        } else if($user->role == 'user'){
            return view('Laporan.LaporanDataUmum.index',['transaksi_umum' => $transaksi_umum,'users' => $users]);
        }  
        
    }

    public function cetaklaporantransaksiumum($tglawal, $tglakhir){
        $users = UsersModel::select('*')
                 ->get();
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        // $transaksi_bahan = TransaksiBahanModel::whereBetween('created_at',[$tglawal, $tglakhir]);
        // return view('Laporan.LaporanDataBahan.index', compact('transaksi_bahan'));
        
        $tanggal = TransaksiUmum::with('get_transaksiumumdetail')->wherebetween('created_at', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('Laporan.LaporanDataUmum.laporan', ['tanggal' => $tanggal,'users' => $users]);
        return $pdf->stream('Laporan-Data-Transaksi-Umum.pdf');    
    }
}
