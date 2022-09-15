<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiPemesananOnline;
use App\Models\MasterDataPemesananModel;

class TransaksiPemesananOnlineController extends Controller
{
    public function indexpemesananonline()
    {
        $transaksi_pemesanan_online = TransaksiPemesananOnline::select('*')
                            ->get();

        return view ('Transaksi.TransaksiDataPemesananOnline.index', ['transaksi_pemesanan_online' => $transaksi_pemesanan_online]);
    }

    public function tambahpemesananonline()
    {
        $transaksi_pemesanan_online = MasterDataPemesananModel::all();

        return view('Transaksi.TransaksiDataPemesananOnline.tambahdata', compact('transaksi_pemesanan_online'));
    }


    public function simpanpemesananonline(Request $request)
    {
        
        $transaksi_pemesanan_online = TransaksiPemesananOnline::create([
            'kode_pemesanan' => $request->kode_pemesanan,
            'keterangan_pemesanan' => $request->keterangan_pemesanan,
            'jumlah' => $request->jumlah,
            'biaya_admin' => $request->biaya_admin,
            'ongkir' => $request->ongkir,
            'komisi' => $request->komisi,
            'total' => $request->total,
        ]);
        
        return redirect()->route('tambahpemesananonline');
    }

    public function hapuspemesananonline($id_online)
    {
        $transaksi_pemesanan_online = TransaksiPemesananOnline::where('id_online',$id_online)
                ->delete();
        
        return redirect()->route('indexpemesananonline');
    }

    public function ubahpemesananonline($id_online)
    {
        $transaksi_pemesanan_online = TransaksiPemesananOnline::select('*')
                ->where('id_online',$id_online)
                ->get();
        $online = MasterDataPemesananModel::all();

        return view ('Transaksi.TransaksiDataPemesananOnline.ubahdata', ['transaksi_pemesanan_online' => $transaksi_pemesanan_online],compact('online'));
    }

    public function updatepemesananonline(Request $request)
    {
       $transaksi_pemesanan_online = TransaksiPemesananOnline::where('id_online', $request->id_online)
                 ->update([
                    'kode_pemesanan' => $request->kode_pemesanan,
                    'keterangan_pemesanan' => $request->keterangan_pemesanan,
                    'jumlah' => $request->jumlah,
                    'biaya_admin' => $request->biaya_admin,
                    'ongkir' => $request->ongkir,
                    'komisi' => $request->komisi,
                    'total' => $request->total,
                 ]);
        $online = MasterDataPemesananModel::all();          
                 compact('online');
    
       return redirect()->route('indexpemesananonline');
    }


    // public function caripemesananonline(Request $request)
    // {
    //     $cari = $request->cari;

    //     $transaksi_pemesanan_online = DB :: table('transaksi_pemesanan_online')
    //                     ->where('keterangan_pemesanan','like',"%".$cari."%")
    //                     ->paginate(5);
        
    //     return view ('Transaksi.TransaksiDataPemesananOnline.index', ['transaksi_pemesanan_online' => $transaksi_pemesanan_online]);
    // }

    public function lihatpemesananonline($id_online)
    {
        $transaksi_pemesanan_online = TransaksiPemesananOnline::select('*')
                                 ->where('id_online',$id_online)
                                 ->get();
        $online = MasterDataPemesananModel::all();

        return view ('Transaksi.TransaksiDataPemesananOnline.lihatdata', ['transaksi_pemesanan_online' => $transaksi_pemesanan_online],compact('online'));
    }
}
