<?php

namespace App\Http\Controllers;

use App\Models\MasterDataKategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;;


class MasterDataKategoriController extends Controller
{
    
    public function indexkategori()
    {
         $kategori = MasterDataKategoriModel::select('*')
                 ->get();

        return view('MasterData.MasterDataKategori.index',['kategori' => $kategori]);
    }

    public function tambahkategori()
    {
        return view('MasterData.MasterDataKategori.tambahdata');
    }

    public function simpankategori(Request $request)
    {
        $kategori = MasterDataKategoriModel::create([
            'kode_kategori' => $request->kode_kategori, 
            'nama_kategori' => $request->nama_kategori,
            'keterangan_kategori' => $request->keterangan_kategori,
        ]);


        return redirect()->route('indexkategori');
    }

    public function hapuskategori($id_kategori)
    {
        $kategori = MasterDataKategoriModel::where('id_kategori',$id_kategori)
                ->delete();
        
        return redirect()->route('indexkategori');
    }

    public function ubahkategori($id_kategori)
    {
        $kategori = MasterDataKategoriModel::select('*')
                ->where('id_kategori',$id_kategori)
                ->get();

        return view ('MasterData.MasterDataKategori.ubahdata', ['kategori' =>$kategori]);
    }

    public function updatekategori(Request $request)
    {
       $kategori = MasterDataKategoriModel::where('id_kategori', $request->id_kategori)
                 ->update([
                    'kode_kategori' => $request->kode_kategori,
                    'nama_kategori' => $request->nama_kategori,
                    'keterangan_kategori' => $request->keterangan_kategori,
                 ]);
    
       return redirect()->route('indexkategori');
    }
}
