<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataAlatModel;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiAlatModel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UsersModel;

class TransaksiAlatController extends Controller
{
    public function indextransaksialat()
    {
        $users = UsersModel::select('*')
                ->get();
        $transaksi_alat = TransaksiAlatModel::select('*')
                        ->get();
        
        return view('Transaksi.TransaksiDataAlat.index',['transaksi_alat' => $transaksi_alat,'users' => $users]);
    }


    public function tambahtransaksialat()
    {
        $users = UsersModel::select('*')
                ->get();
        $alat = MasterDataAlatModel::all();
        return view('Transaksi.TransaksiDataAlat.tambahdata', compact('alat'),['users' => $users]);
    }

    public function simpantransaksialat(Request $request)
    {
        // $users = UsersModel::select('*')
        //         ->get();    
        // $transaksi_alat = TransaksiAlatModel::create([
        //     'nama_alat' => $request->nama_alat,
        //     'harga' => $request->harga,
        //     'jumlah' => $request->jumlah,
        //     'total' => $request->total,
        // ]);
        // Alert::success('Success', 'Data Berhasil Disimpan');
        // return redirect()->route('indextransaksialat',['users' => $users]);


        $users = UsersModel::select('*')
        ->get();
        
        $request->validate([
            'addMoreInputFields.*.nama_alat' => 'required',
            'addMoreInputFields.*.harga' => 'required',
            'addMoreInputFields.*.jumlah' => 'required',
            'addMoreInputFields.*.total' => 'required',
        ]);
        
        foreach ($request->addMoreInputFields as $key => $value) {
            $stok = DB::table('stok_alat')->selectRaw('*')->where([['id_alat', $value['id_alat']]])->get();
            if(count($stok) == 0){
                DB::table('stok_alat')->insert([
                    [
                        'id_alat' => $value['id_alat'],
                        'stok_masuk' => $value['jumlah'],
                        'stok_keluar' => 0,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                ]);
            }else{
                DB::table('stok_alat')->where([['id_alat', $value['id_alat']]])->update(['stok_masuk' => $stok[0]->stok_masuk + intval(str_replace(",", "", $value['jumlah']))]);
            }
            TransaksiAlatModel::create($value);
        }
    
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('indextransaksialat',['users' => $users]);


    }

    public function hapustransaksialat($id_transaksialat)
    {
        $transaksi_alat = TransaksiAlatModel::where('id_transaksialat',$id_transaksialat)
                ->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('indextransaksialat');
    }

    public function ubahtransaksialat($id_transaksialat)
    {
        $users = UsersModel::select('*')
                ->get();
        $transaksi_alat = TransaksiAlatModel::select('*')
                ->where('id_transaksialat',$id_transaksialat)
                ->get();
        $alat = MasterDataAlatModel::all();

        return view ('Transaksi.TransaksiDataAlat.ubahdata', ['transaksi_alat' => $transaksi_alat,'users' => $users],compact('alat'));
    }

    public function updatetransaksialat(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();
       $transaksi_alat = TransaksiAlatModel::where('id_transaksialat', $request->id_transaksialat)
                 ->update([
                    'nama_alat' => $request->nama_alat,
                    'harga' => $request->harga,
                    'jumlah' => $request->jumlah,
                    'total' => $request->total,
                 ]);
        $alat = MasterDataAlatModel::all();          
                 compact('alat');
        Alert::success('Success', 'Data Berhasil Diubah');
       return redirect()->route('indextransaksialat',['users' => $users]);
    }

    



    // public function lihattransaksialat($id_transaksialat)
    // {
    //     $transaksi_alat = TransaksiAlatModel::select('*')
    //                              ->where('id_transaksialat',$id_transaksialat)
    //                              ->get();


    //     return view ('Transaksi.TransaksiDataAlat.lihatdata', ['transaksi_alat' => $transaksi_alat],compact('transaksi_alat'));
    // }

    // public function caritransaksialat(Request $request)
    // {
    //     $cari = $request->cari;

    //     $transaksi_alat = DB :: table('transaksi_alat')
    //                     ->where('nama_alat','like',"%".$cari."%")
    //                     ->paginate(5);
        
    //     return view ('Transaksi.TransaksiDataAlat.index', ['transaksi_alat' => $transaksi_alat]);
    // }
}