<?php

namespace App\Http\Controllers;

use App\Models\MasterDataMakananModel;
use App\Models\MasterDataKategoriModel;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class MasterDataMakananController extends Controller
{
    public function indexmakanan()
    {   
        $makanan = DB::table('makanan')->paginate(5);
        return view('MasterData.MasterDataMakanan.index',['makanan' => $makanan]);
    }

    public function tambahmakanan()
    {   
        $kategori = MasterDataKategoriModel::all();
        return view('MasterData.MasterDataMakanan.tambahdata', compact('kategori'));
    }

    public function simpanmakanan(Request $request)
    {   
        $makanan=MasterDataMakananModel::create([
            'nama_kategori' => $request->nama_kategori,
            'nama_makanan' => $request->nama_makanan,
            'harga' => $request->harga,
            'image' => $request->image->store('makanan-foto'),
        ]);

        return redirect()->route('indexmakanan');
    }

    public function hapusmakanan($id_makanan)
    {
        $makanan = MasterDataMakananModel::where('id_makanan',$id_makanan)
                ->delete();
       
        return redirect()->route('indexmakanan'); 
    }

    public function ubahmakanan($id_makanan)
    {

        $makanan = MasterDataMakananModel::select('*')
                ->where('id_makanan',$id_makanan)
                ->get();
        $kategori = MasterDataKategoriModel::all();

        return view ('MasterData.MasterDataMakanan.ubahdata', ['makanan' =>$makanan],compact('kategori'));
    }

    public function updatemakanan(Request $request)
    {
       $makanan = MasterDataMakananModel::where('id_makanan', $request->id_makanan)
                 ->update([
                    'nama_kategori' => $request->nama_kategori,
                    'nama_makanan' => $request->nama_makanan,
                    'harga' => $request->harga,
                    'image' => $request->image->store('makanan-foto'),
                 ]);
        $kategori = MasterDataKategoriModel::all();          
                 compact('kategori');

        // if($request->file('image')) {
        //     if ($request->oldImage){
        //         Storage::delete($request->oldImage);
        //     }
        //     $makanan['image'] = $request->file('image')->store('makanan-foto');
        // }

       return redirect()->route('indexmakanan');
    }
}

