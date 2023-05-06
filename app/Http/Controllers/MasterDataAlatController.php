<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataAlatModel;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UsersModel;

class MasterDataAlatController extends Controller
{
    public function indexalat()
    {
        $users = UsersModel::select('*')
                ->get();
         $alat = MasterDataAlatModel::select('*')
                 ->get();

        return view ('MasterData.MasterDataAlat.index',['alat' => $alat,'users' => $users]);
    }

    public function tambahalat()
    {
        $users = UsersModel::select('*')
                ->get();
        return view('MasterData.MasterDataAlat.tambahdata',['users' => $users]);
    }

    public function simpanalat(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();

        $request->validate([
            'addMoreInputFields.*.nama_alat' => 'required',
            'addMoreInputFields.*.harga' => 'required',
        ]);
        
        foreach ($request->addMoreInputFields as $key => $value) {
            MasterDataAlatModel::create($value);
        }
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('indexalat',['users' => $users]);


    }

    public function hapusalat($id_alat)
    {
        $alat = MasterDataAlatModel::where('id_alat',$id_alat)
                ->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('indexalat');
    }
    
    public function ubahalat($id_alat)
    {
        $users = UsersModel::select('*')
                ->get();
        $alat =MasterDataAlatModel::select('*')
                ->where('id_alat',$id_alat)
                ->get();

        return view ('MasterData.MasterDataAlat.ubahdata', ['alat' =>$alat,'users' => $users]);
    }

    public function updatealat(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();
       $alat = MasterDataAlatModel::where('id_alat', $request->id_alat)
                 ->update([
                    'nama_alat' => $request->nama_alat,
                    'harga' => $request->harga,
                 ]);
        Alert::success('Success', 'Data Berhasil Diubah');    
       return redirect()->route('indexalat',['users' => $users]);
    }

    // public function indexstokalat()
    // {
    //     $users = UsersModel::select('*')
    //             ->get();
    //     $stok = MasterDataAlatModel::join('stok_alat','alat.id_alat','=','stok_alat.id_alat')
    //             ->get(['alat.nama_alat','stok_alat.stok_masuk','stok_alat.stok_keluar']);

    //     return view('Stok.StokAlat.index',['stok' => $stok,'users' => $users]);
    // }



    // public function lihatalat($id_alat)
    // {
    //     $alat = MasterDataAlatModel::select('*')
    //                              ->where('id_alat',$id_alat)
    //                              ->get();


    //     return view ('MasterData.MasterDataAlat.lihatdata', ['alat' => $alat],compact('alat'));
    // }
    
}
