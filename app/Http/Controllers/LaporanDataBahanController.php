<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiBahanModel;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Auth;

class LaporanDataBahanController extends Controller
{
    public function indexlaporanbahan()
    {
        $users = UsersModel::select('*')
                 ->get();
        $transaksi_bahan = TransaksiBahanModel::select('*')
                            ->get();

        $user = Auth::user();
        if($user->role == 'admin'){
            return view('admin.Laporan.LaporanDataBahan.index',['transaksi_bahan' => $transaksi_bahan,'users' => $users]);
        } else if($user->role == 'user'){
            return view('Laporan.LaporanDataBahan.index',['transaksi_bahan' => $transaksi_bahan,'users' => $users]);
        }
        
    }

    public function cetaklaporantransaksibahan($tglawal, $tglakhir){

        $users = UsersModel::select('*')
                 ->get();
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        // $transaksi_bahan = TransaksiBahanModel::whereBetween('created_at',[$tglawal, $tglakhir]);
        // return view('Laporan.LaporanDataBahan.index', compact('transaksi_bahan'));
        $tglawal = date('Y-m-d', strtotime($tglawal));
        $tglakhir = date('Y-m-d', strtotime($tglakhir));     
        $tanggal = TransaksiBahanModel::wherebetween(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"),[$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('Laporan.LaporanDataBahan.laporan', ['tanggal' => $tanggal,'users' => $users],compact('tglawal','tglakhir'));
        return $pdf->stream('Laporan-Data-Transaksi-Bahan.pdf');    
    }

    
   
}
