<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiBahanModel;
use App\Models\MasterDataBahanModel;
use Illuminate\Http\Request;

class TransaksiBahanController extends Controller
{
    public function indextransaksibahan(Request $request)
    {
        // if ($request->ajax()) {
        //     return DataTables::of(TransaksiBahanModel::query())->toJson();
        // }

        // return view ('Transaksi.TransaksiDataBahan.index');

        $transaksi_bahan = TransaksiBahanModel::select('*')
                            ->get();

        return view ('Transaksi.TransaksiDataBahan.index',['transaksi_bahan' => $transaksi_bahan]);
    }

    public function tambahtransaksibahan()
    {
        $bahan = MasterDataBahanModel::all();
        return view('Transaksi.TransaksiDataBahan.tambahdata', compact('bahan'));
    }

    public function simpantransaksibahan(Request $request)
    {
        
        $transaksi_bahan = TransaksiBahanModel::create([
            'nama_bahan' => $request->nama_bahan,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
        ]);
        
        return redirect()->route('tambahtransaksibahan');
    }

    public function hapustransaksibahan($id_transaksibahan)
    {
        $transaksi_bahan = TransaksiBahanModel::where('id_transaksibahan',$id_transaksibahan)
                ->delete();
        
        return redirect()->route('indextransaksibahan');
    }

    public function ubahtransaksibahan($id_transaksibahan)
    {
        $transaksi_bahan = TransaksiBahanModel::select('*')
                ->where('id_transaksibahan',$id_transaksibahan)
                ->get();
        $bahan = MasterDataBahanModel::all();

        return view ('Transaksi.TransaksiDataBahan.ubahdata', ['transaksi_bahan' => $transaksi_bahan],compact('bahan'));
    }

    public function updatetransaksibahan(Request $request)
    {
       $transaksi_bahan = TransaksiBahanModel::where('id_transaksibahan', $request->id_transaksibahan)
                 ->update([
                    'nama_bahan' => $request->nama_bahan,
                    'harga' => $request->harga,
                    'jumlah' => $request->jumlah,
                    'total' => $request->total,
                 ]);
        $bahan = MasterDataBahanModel::all();          
                 compact('bahan');
    
       return redirect()->route('indextransaksibahan');
    }



    public function caritransaksibahan(Request $request)
    {
        $cari = $request->cari;

        $transaksi_bahan = DB :: table('transaksi_bahan')
                        ->where('nama_bahan','like',"%".$cari."%")
                        ->paginate(5);
        
        return view ('Transaksi.TransaksiDataBahan.index', ['transaksi_bahan' => $transaksi_bahan]);
    }

    // public function onchange(Request $request)
    // {
    //    $bahan['harga'] = MasterDataBahanModel::where("id_bahan", $request->id_bahan)
    //                     ->get(["harga"]);

    //     return response()->json($bahan);
    // }
}
