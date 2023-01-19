<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterDataPemesananModel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UsersModel;

class MasterDataPemesananController extends Controller
{
    public function indexpemesanan()
    {
        $users = UsersModel::select('*')
                ->get();
        $pemesanan = MasterDataPemesananModel::select('*')
                 ->get();

        return view ('MasterData.MasterDataPemesanan.index',['pemesanan' => $pemesanan,'users' => $users]);
    }

    public function tambahpemesanan()
    {
        $users = UsersModel::select('*')
                ->get();
        return view('MasterData.MasterDataPemesanan.tambahdata',['users' => $users]);
    }

    public function simpanpemesanan(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();

        $request->validate([
            'addMoreInputFields.*.keterangan_pemesanan' => 'required',
            'addMoreInputFields.*.biaya_admin' => 'required',
            'addMoreInputFields.*.ongkir' => 'required',
        ]);

        foreach ($request->addMoreInputFields as $key => $value) {
            MasterDataPemesananModel::create($value);
        }
                
        
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('indexpemesanan',['users' => $users]);
    
        $users = UsersModel::select('*')
        ->get();



    }

    public function hapuspemesanan($id_pemesanan)
    {
        $pemesanan = MasterDataPemesananModel::where('id_pemesanan',$id_pemesanan)
                ->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('indexpemesanan');
    }

    public function ubahpemesanan($id_pemesanan)
    {
        $users = UsersModel::select('*')
                ->get();
        $pemesanan = MasterDataPemesananModel::select('*')
                ->where('id_pemesanan',$id_pemesanan)
                ->get();

        return view ('MasterData.MasterDataPemesanan.ubahdata', ['pemesanan' =>$pemesanan,'users' => $users]);
    }

    public function updatepemesanan(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();
       $pemesanan = MasterDataPemesananModel::where('id_pemesanan', $request->id_pemesanan)
                 ->update([
                    'keterangan_pemesanan' => $request->keterangan_pemesanan,
                    'biaya_admin' => $request->biaya_admin,
                    'ongkir' => $request->ongkir,

                 ]);
        Alert::success('Success', 'Data Berhasil Diubah');
       return redirect()->route('indexpemesanan',['users' => $users]);
    }

    // public function lihatpemesanan($id_pemesanan)
    // {
    //     $pemesanan = MasterDataPemesananModel::select('*')
    //                              ->where('id_pemesanan',$id_pemesanan)
    //                              ->get();


    //     return view ('MasterData.MasterDataPemesanan.lihatdata', ['pemesanan' => $pemesanan],compact('pemesanan'));
    // }
}
