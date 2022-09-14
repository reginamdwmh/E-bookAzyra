<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataAlatModel;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiAlatModel;

class TransaksiAlatController extends Controller
{
    public function indextransaksialat()
    {
        $transaksi_alat = TransaksiAlatModel::select('*')
                        ->get();
        
        return view('Transaksi.TransaksiDataAlat.index',['transaksi_alat' => $transaksi_alat]);
    }


    public function tambahtransaksialat()
    {
        $alat = MasterDataAlatModel::all();
        return view('Transaksi.TransaksiDataAlat.tambahdata', compact('alat'));
    }

    public function simpantransaksialat(Request $request)
    {
        
        $transaksi_alat = TransaksiAlatModel::create([
            'nama_alat' => $request->nama_alat,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
        ]);
        
        return redirect()->route('tambahtransaksialat');
    }

    public function hapustransaksialat($id_transaksialat)
    {
        $transaksi_alat = TransaksiAlatModel::where('id_transaksialat',$id_transaksialat)
                ->delete();
        
        return redirect()->route('indextransaksialat');
    }

    public function ubahtransaksialat($id_transaksialat)
    {
        $transaksi_alat = TransaksiAlatModel::select('*')
                ->where('id_transaksialat',$id_transaksialat)
                ->get();
        $alat = MasterDataAlatModel::all();

        return view ('Transaksi.TransaksiDataAlat.ubahdata', ['transaksi_alat' => $transaksi_alat],compact('alat'));
    }

    public function updatetransaksialat(Request $request)
    {
       $transaksi_alat = TransaksiAlatModel::where('id_transaksialat', $request->id_transaksialat)
                 ->update([
                    'nama_alat' => $request->nama_alat,
                    'harga' => $request->harga,
                    'jumlah' => $request->jumlah,
                    'total' => $request->total,
                 ]);
        $alat = MasterDataAlatModel::all();          
                 compact('alat');
    
       return redirect()->route('indextransaksialat');
    }

    public function caritransaksialat(Request $request)
    {
        $cari = $request->cari;

        $transaksi_alat = DB :: table('transaksi_alat')
                        ->where('nama_alat','like',"%".$cari."%")
                        ->paginate(5);
        
        return view ('Transaksi.TransaksiDataAlat.index', ['transaksi_alat' => $transaksi_alat]);
    }
}