<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiUmum;
use App\Models\TransaksiUmumDetail;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $tglawal = date('Y-m-d', strtotime($tglawal));
        $tglakhir = date('Y-m-d', strtotime($tglakhir));
        $tanggal = TransaksiUmum::with('get_transaksiumumdetail')->wherebetween(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"), [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('Laporan.LaporanDataUmum.laporan', ['tanggal' => $tanggal,'users' => $users],compact('tglawal','tglakhir'));
        return $pdf->stream('Laporan-Data-Transaksi-Umum.pdf');    
    }
}
