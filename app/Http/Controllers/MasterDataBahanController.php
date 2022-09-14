<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataBahanModel;
use Illuminate\Support\Facades\DB;

class MasterDataBahanController extends Controller
{
    public function indexbahan()
    {
       
        $bahan = MasterDataBahanModel::select('*')
                 ->get();

        return view ('MasterData.MasterDataBahan.index',['bahan' => $bahan]);
    }

    public function tambahbahan()
    {
        return view('MasterData.MasterDataBahan.tambahdata');
    }

    public function simpanbahan(Request $request)
    {
        $bahan = MasterDataBahanModel::create([
            'nama_bahan' => $request->nama_bahan,
            'harga' => $request->harga,
            
        ]);

        return redirect()->route('indexbahan');
    }

    public function hapusbahan($id_bahan)
    {
        $bahan = MasterDataBahanModel::where('id_bahan',$id_bahan)
                ->delete();
        
        return redirect()->route('indexbahan');
    }

    public function ubahbahan($id_bahan)
    {
        $bahan =MasterDataBahanModel::select('*')
                ->where('id_bahan',$id_bahan)
                ->get();

        return view ('MasterData.MasterDataBahan.ubahdata', ['bahan' =>$bahan]);
    }

    public function updatebahan(Request $request)
    {
       $bahan = MasterDataBahanModel::where('id_bahan', $request->id_bahan)
                 ->update([
                    'nama_bahan' => $request->nama_bahan,
                    'harga' => $request->harga,
                 ]);
    
       return redirect()->route('indexbahan');
    }
}
