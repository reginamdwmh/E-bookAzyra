<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiAlatModel;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Auth;


class LaporanDataAlatController extends Controller
{
    public function indexlaporanalat()
    {
        $users = UsersModel::select('*')
                 ->get();
         $transaksi_alat = TransaksiAlatModel::select('*')
                            ->get();

        $user = Auth::user();
        if($user->role == 'admin'){
            return view('admin.Laporan.LaporanDataAlat.index',['transaksi_alat' => $transaksi_alat,'users' => $users]);
        } else if($user->role == 'user'){
        return view('Laporan.LaporanDataAlat.index',['transaksi_alat' => $transaksi_alat,'users' => $users]);
        }
    }

    public function cetaktgl($tglawal, $tglakhir){

        $users = UsersModel::select('*')
        ->get();
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        // $transaksi_bahan = TransaksiBahanModel::whereBetween('created_at',[$tglawal, $tglakhir]);
        // return view('Laporan.LaporanDataBahan.index', compact('transaksi_bahan'));
        $tglawal = date('Y-m-d', strtotime($tglawal));
        $tglakhir = date('Y-m-d', strtotime($tglakhir));
        $tanggal = TransaksiAlatModel::wherebetween(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"),[$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('Laporan.LaporanDataAlat.laporan', ['tanggal' => $tanggal,'users' => $users],compact('tglawal','tglakhir'));
        return $pdf->stream('Laporan-Data-Transaksi-Alat.pdf');    
    }

    // public function cetaknamaalat($id_transaksialat){
    //     $alat= TransaksiAlatModel::where('id_transaksialat', Request::input('id_transasialat'))->get();
    //     $pdf = PDF::loadView('Laporan.LaporanDataAlat.laporan-namaalat',['alat' => $alat]);
    //     return $pdf->stream('Laporan-Data-Nama-Alat-Transaksi-Alat.pdf');
    // }

    // public function data(Request $request, $nama_alat){
    //     $data = TransaksiAlatModel::select([
    //         'transaksi_alat.*',
    //     ]);
        
    //     if($request->input('nama_alat')!=null){
    //         $data = $data->where('nama_alat',$request->nama_alat);
    //     }
    // }
}
