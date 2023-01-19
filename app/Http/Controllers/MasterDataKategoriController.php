<?php

namespace App\Http\Controllers;

use App\Models\MasterDataKategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UsersModel;

class MasterDataKategoriController extends Controller
{
    
    public function indexkategori()
    {
        $users = UsersModel::select('*')
                ->get();
         $kategori = MasterDataKategoriModel::select('*')
                 ->get();

        return view('MasterData.MasterDataKategori.index',['kategori' => $kategori,'users' => $users]);
    }

    public function tambahkategori()
    {
        $users = UsersModel::select('*')
                ->get();
        return view('MasterData.MasterDataKategori.tambahdata',['users' => $users]);
    }

    public function simpankategori(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();

        $request->validate([
                'addMoreInputFields.*.kode_kategori' => 'required',
                'addMoreInputFields.*.nama_kategori' => 'required',
                'addMoreInputFields.*.keterangan_kategori' => 'required',
        ]);
        foreach ($request->addMoreInputFields as $key => $value) {
            MasterDataKategoriModel::create($value);

        }
        
        
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('indexkategori',['users' => $users]);
    }

    public function hapuskategori($id_kategori)
    {
        $kategori = MasterDataKategoriModel::where('id_kategori',$id_kategori)
                ->delete();
        
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('indexkategori');
    }

    public function ubahkategori($id_kategori)
    {
        $users = UsersModel::select('*')
                ->get();
        $kategori = MasterDataKategoriModel::select('*')
                ->where('id_kategori',$id_kategori)
                ->get();

        return view ('MasterData.MasterDataKategori.ubahdata', ['kategori' =>$kategori,'users' => $users]);
    }

    public function updatekategori(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();
       $kategori = MasterDataKategoriModel::where('id_kategori', $request->id_kategori)
                 ->update([
                    'kode_kategori' => $request->kode_kategori,
                    'nama_kategori' => $request->nama_kategori,
                    'keterangan_kategori' => $request->keterangan_kategori,
                 ]);
    
        Alert::success('Success', 'Data Berhasil Diubah');
       return redirect()->route('indexkategori',['users' => $users]);
    }

    // public function lihatkategori($id_kategori)
    // {
    //     $kategori = MasterDataKategoriModel::select('*')
    //                              ->where('id_kategori',$id_kategori)
    //                              ->get();


    //     return view ('MasterData.MasterDataKategori.lihatdata', ['kategori' => $kategori],compact('kategori'));
    // }
}
