<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataAlatModel;
use Illuminate\Support\Facades\DB;

class MasterDataAlatController extends Controller
{
    public function indexalat()
    {
         $alat = MasterDataAlatModel::select('*')
                 ->get();

        return view ('MasterData.MasterDataAlat.index',['alat' => $alat]);
    }

    public function tambahalat()
    {
        return view('MasterData.MasterDataAlat.tambahdata');
    }

    public function simpanalat(Request $request)
    {
        $alat = MasterDataAlatModel::create([
            'nama_alat' => $request->nama_alat,
            'harga' => $request->harga,
            
        ]);

        return redirect()->route('indexalat');
    }

    public function hapusalat($id_alat)
    {
        $alat = MasterDataAlatModel::where('id_alat',$id_alat)
                ->delete();
        
        return redirect()->route('indexalat');
    }

    public function ubahalat($id_alat)
    {
        $alat =MasterDataAlatModel::select('*')
                ->where('id_alat',$id_alat)
                ->get();

        return view ('MasterData.MasterDataAlat.ubahdata', ['alat' =>$alat]);
    }

    public function updatealat(Request $request)
    {
       $alat = MasterDataAlatModel::where('id_alat', $request->id_alat)
                 ->update([
                    'nama_alat' => $request->nama_alat,
                    'harga' => $request->harga,
                 ]);
    
       return redirect()->route('indexalat');
    }

    // public function lihatalat($id_alat)
    // {
    //     $alat = MasterDataAlatModel::select('*')
    //                              ->where('id_alat',$id_alat)
    //                              ->get();


    //     return view ('MasterData.MasterDataAlat.lihatdata', ['alat' => $alat],compact('alat'));
    // }
    
}
