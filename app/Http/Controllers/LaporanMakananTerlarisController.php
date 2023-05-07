<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanMakananTerlarisController extends Controller
{
    public function indexmakananterlaris()
    {
        $users = UsersModel::select('*')
            ->get();

        $user = Auth::user();
        if($user->role == 'admin'){
            return view('admin.Laporan.MakananTerlaris.index',['users' => $users]);
        } else if($user->role == 'user'){
        return view('Laporan.MakananTerlaris.index',['users' => $users]);
        }
    }

    public function cetakmakananterlaris($tglawal, $tglakhir)
    {
        // dd(date('dmY',strtotime($tglawal)));
        $users = UsersModel::select('*')
                ->get();
        $tglawal = date('Y-m-d', strtotime($tglawal));
        $tglakhir = date('Y-m-d', strtotime($tglakhir));
        $makanan_terlaris = DB::table('transaksi_penjualan_makanan')->select('nama_makanan', DB::raw('SUM(jumlah) AS total_barang_terlaris'), 'harga', DB::raw('SUM(jumlah) * harga AS total_penjualan'))->whereBetween(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"),[$tglawal, $tglakhir])->groupBy('nama_makanan', 'harga')->orderByRaw('SUM(jumlah) DESC')->get();

        // dd($makanan_terlaris);
        $pdf = PDF::loadView('Laporan.MakananTerlaris.laporan', ['makanan_terlaris' => $makanan_terlaris,'users' => $users],compact('tglawal','tglakhir'));
        return $pdf->stream('Laporan-Data-Makanan-Terlaris.pdf');   

    }
}
