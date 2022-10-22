<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiAlatModel;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\UsersModel;


class LaporanDataAlatController extends Controller
{
    public function indexlaporanalat()
    {
        $users = UsersModel::select('*')
                 ->get();
         $transaksi_alat = TransaksiAlatModel::select('*')
                            ->get();

        return view('Laporan.LaporanDataAlat.index',['transaksi_alat' => $transaksi_alat,'users' => $users]);
    }

    public function cetaktgl($tglawal, $tglakhir){
        
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        // $transaksi_bahan = TransaksiBahanModel::whereBetween('created_at',[$tglawal, $tglakhir]);
        // return view('Laporan.LaporanDataBahan.index', compact('transaksi_bahan'));
        $tanggal = TransaksiAlatModel::wherebetween('created_at', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('Laporan.LaporanDataAlat.laporan', ['tanggal' => $tanggal]);
        return $pdf->stream('Laporan-Data-Transaksi-Alat.pdf');    
    }

    public function cetaknamaalat($id){
        $alat= TransaksiAlatModel::where('id_transaksialat', Request::input('id_transasialat'))->get();
        $pdf = PDF::loadView('Laporan.LaporanDataAlat.laporanalat',['alat' => $alat]);
        return $pdf->stream('Laporan-Data-Nama-Alat-Transaksi-Alat.pdf');
    }
}
