<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiPenjualanMakanan;
use App\Models\MasterDataMakananModel;

class TransaksiPenjualanMakananController extends Controller
{
    public function indexpenjualanmakanan()
    {
        $transaksi_penjualan_makanan = TransaksiPenjualanMakanan::select('*')
                                    ->get();


        return view ('Transaksi.TransaksiDataPenjualanMakanan.index',['transaksi_penjualan_makanan' => $transaksi_penjualan_makanan]);
    }

    public function tambahpenjualanmakanan()
    {
        $transaksi_penjualan_makanan = MasterDataMakananModel::all();

        return view('Transaksi.TransaksiDataPenjualanMakanan.tambahdata', compact('transaksi_penjualan_makanan'));
    }


    public function simpanpenjualanmakanan(Request $request)
    {
        
        $transaksi_penjualan_makanan = TransaksiPenjualanMakanan::create([
            'nama_makanan' => $request->nama_makanan,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'diskon' => $request->diskon,
            'total' => $request->total,
        ]);
        
        return redirect()->route('tambahpenjualanmakanan');
    }

    public function hapuspenjualanmakanan($id_penjualan)
    {
        $transaksi_penjualan_makanan = TransaksiPenjualanMakanan::where('id_penjualan',$id_penjualan)
                ->delete();
        
        return redirect()->route('indexpenjualanmakanan');
    }

    public function ubahpenjualanmakanan($id_penjualan)
    {
        $transaksi_penjualan_makanan = TransaksiPenjualanMakanan::select('*')
                ->where('id_penjualan',$id_penjualan)
                ->get();
        $makanan = MasterDataMakananModel::all();

        return view ('Transaksi.TransaksiDataPenjualanMakanan.ubahdata', ['transaksi_penjualan_makanan' => $transaksi_penjualan_makanan],compact('makanan'));
    }

    public function updatepenjualanmakanan(Request $request)
    {
       $transaksi_penjualan_makanan = TransaksiPenjualanMakanan::where('id_penjualan', $request->id_penjualan)
                 ->update([
                    'nama_makanan' => $request->nama_makanan,
                    'harga' => $request->harga,
                    'jumlah' => $request->jumlah,
                    'diskon' => $request->diskon,
                    'total' => $request->total,
                 ]);
        $makanan = MasterDataMakananModel::all();          
                 compact('makanan');
    
       return redirect()->route('indexpenjualanmakanan');
    }


    // public function caripenjualanmakanan(Request $request)
    // {
    //     $cari = $request->cari;

    //     $transaksi_penjualan_makanan = DB :: table('transaksi_penjualan_makanan')
    //                     ->where('nama_makanan','like',"%".$cari."%")
    //                     ->paginate(5);
        
    //     return view ('Transaksi.TransaksiDataPenjualanMakanan.index', ['transaksi_penjualan_makanan' => $transaksi_penjualan_makanan]);
    // }
}
