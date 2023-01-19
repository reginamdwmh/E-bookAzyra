<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataBahanModel;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UsersModel;

class MasterDataBahanController extends Controller
{
    public function indexbahan()
    {
        $users = UsersModel::select('*')
                ->get();       
        $bahan = MasterDataBahanModel::select('*')
                 ->get();

        return view ('MasterData.MasterDataBahan.index',['bahan' => $bahan,'users' => $users]);
    }

    public function tambahbahan()
    {
        $users = UsersModel::select('*')
                ->get();
        return view('MasterData.MasterDataBahan.tambahdata',['users' => $users]);
    }

    public function simpanbahan(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();

        $request->validate([
            'addMoreInputFields.*.nama_bahan' => 'required',
            'addMoreInputFields.*.harga' => 'required',
        ]);
        foreach ($request->addMoreInputFields as $key => $value) {
            MasterDataBahanModel::create($value);
        }
       
        
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('indexbahan',['users' => $users]);

        
        
    }

    public function hapusbahan($id_bahan)
    {
        $bahan = MasterDataBahanModel::where('id_bahan',$id_bahan)
                ->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');       
        return redirect()->route('indexbahan');
    }

    public function ubahbahan($id_bahan)
    {
        $users = UsersModel::select('*')
                ->get();
        $bahan =MasterDataBahanModel::select('*')
                ->where('id_bahan',$id_bahan)
                ->get();

        return view ('MasterData.MasterDataBahan.ubahdata', ['bahan' =>$bahan,'users' => $users]);
    }

    public function updatebahan(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();
       $bahan = MasterDataBahanModel::where('id_bahan', $request->id_bahan)
                 ->update([
                    'nama_bahan' => $request->nama_bahan,
                    'harga' => $request->harga,
                 ]);
        Alert::success('Success', 'Data Berhasil Diubah');    
       return redirect()->route('indexbahan',['users' => $users]);
    }

    // public function lihatbahan($id_bahan)
    // {
    //     $bahan = MasterDataBahanModel::select('*')
    //                              ->where('id_bahan',$id_bahan)
    //                              ->get();


    //     return view ('MasterData.MasterDataBahan.lihatdata', ['bahan' => $bahan],compact('bahan'));
    // }
}
