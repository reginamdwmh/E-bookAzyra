<?php

namespace App\Http\Controllers;

use App\Models\MasterDataMakananModel;
use App\Models\MasterDataKategoriModel;
use App\Models\MasterDataAlatModel;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UsersModel;

class MasterDataMakananController extends Controller
{
    public function indexmakanan()
    {   
        $users = UsersModel::select('*')
                ->get();
        $makanan = MasterDataMakananModel::select('*')
                 ->get();
        
        return view('MasterData.MasterDataMakanan.index',['makanan' => $makanan,'users' => $users]);
    }

    public function tambahmakanan()
    {   
        $users = UsersModel::select('*')
                ->get();
        $kategori = MasterDataKategoriModel::all();
        $alat = MasterDataAlatModel::all();
        return view('MasterData.MasterDataMakanan.tambahdata', compact('kategori','alat'),['users' => $users]);
    }

    public function simpanmakanan(Request $request)
    {   
        $users = UsersModel::select('*')
                ->get();

        $validatedData = $request->validate([
            'addMoreInputFields.*.nama_kategori' => 'required',
            'addMoreInputFields.*.id_alat' => 'required',
            'addMoreInputFields.*.nama_makanan' => 'required',
            'addMoreInputFields.*.harga' => 'required',
            'addMoreInputFields.*.image' => 'image|file',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('makanan-foto');
        }

        foreach($validatedData['addMoreInputFields'] as &$item) {
            $item['image'] = $item['image']->store('makanan-foto');
        }

        foreach ($validatedData['addMoreInputFields'] as $key => $value) {
            MasterDataMakananModel::create($value);
        }

          
        // $makanan=MasterDataMakananModel::create([
        //     'nama_kategori' => $request->nama_kategori,
        //     'nama_makanan' => $request->nama_makanan,
        //     'harga' => $request->harga,
        //     'image' => $request->image->store('makanan-foto'),
        // ]);
        // // dd($makanan);
        
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('indexmakanan',['users' => $users]);
    }

    public function hapusmakanan($id_makanan)
    {
        $makanan = MasterDataMakananModel::where('id_makanan',$id_makanan)
                ->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');       
        return redirect()->route('indexmakanan'); 
    }

    public function ubahmakanan($id_makanan)
    {
        $users = UsersModel::select('*')
                ->get();
        $makanan = MasterDataMakananModel::select('*')
                ->where('id_makanan',$id_makanan)
                ->get();
        $kategori = MasterDataKategoriModel::all();

        return view ('MasterData.MasterDataMakanan.ubahdata', ['makanan' =>$makanan,'users' => $users],compact('kategori'));
    }

    public function updatemakanan(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();
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
        Alert::success('Success', 'Data Berhasil Diubah');
       return redirect()->route('indexmakanan',['users' => $users]);
    }

    // public function lihatmakanan($id_makanan)
    // {
    //     $makanan = MasterDataMakananModel::select('*')
    //                              ->where('id_makanan',$id_makanan)
    //                              ->get();


    //     return view ('MasterData.MasterDatamakanan.lihatdata', ['makanan' => $makanan],compact('makanan'));
    // }
}

