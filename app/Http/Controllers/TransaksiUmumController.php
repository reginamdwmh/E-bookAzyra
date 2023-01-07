<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\TransaksiUmum;
use Illuminate\Support\Facades\DB;
use App\Models\MasterDataMakananModel;
use App\Models\MasterDataPemesananModel;
use App\Models\TransaksiUmumDetail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UsersModel;

class TransaksiUmumController extends Controller
{
    public function indextransaksiumum()
    {
        // $transaksi_umum = TransaksiUmum::with('keterangan_pemesanan','jumlah_pemesanan')->get();
        // return view ('Transaksi.TransaksiDataUmum.index', compact('transaksi_umum'));


        // $transaksi_umum = TransaksiUmum::with(['pemesanan'])->get();
        // return view('Transaksi.TransaksiDataUmum.index', [
        //     'transaksi_umum' => $transaksi_umum
        // ]);

        // if ($request->ajax()) {
        //     return DataTables::of(TransaksiUmum::query())->toJson();
        // }

        // return view ('Transaksi.TransaksiDataUmum.index');


        // $transaksi_umum = TransaksiUmum::select('*',DB::raw("CONCAT(transaksi_umum.keterangan_pemesanan,' : ',transaksi_umum.jumlah_pemesanan) as mitra"))
        //                 ->get();


        // return view ('Transaksi.TransaksiDataUmum.index',['transaksi_umum' => $transaksi_umum]);


        $users = UsersModel::select('*')
                ->get();
        $transaksi_umum = TransaksiUmum::with('get_transaksiumumdetail')->get();
        
        return view('Transaksi.TransaksiDataUmum.index', compact('transaksi_umum'),['users' => $users]);

        
    }
    
    public function tambahtransaksiumum()
    {
        $users = UsersModel::select('*')
                ->get();
        $makanan = MasterDataMakananModel::all();
        $pemesanan = MasterDataPemesananModel::all();

        return view('Transaksi.TransaksiDataUmum.tambahdata', compact('makanan','pemesanan'),['users' => $users]);
    }


    public function simpantransaksiumum(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();
       
        // validasi
            $transaksi_umum = $request->validate([
                'nama_makanan' => 'required',
                'harga' => 'required',
                'jumlah_penjualan' => 'required',
                'addMoreInputFields.*.keterangan_pemesanan' => 'required',
                'addMoreInputFields.*.jumlah_pemesanan' => 'required',
                'total' => 'required',
            ]);

            
            $TransaksiUmum = TransaksiUmum::create($transaksi_umum);

            foreach ($request->addMoreInputFields as $key => $value) {
                $value['id_umum'] = $TransaksiUmum->id_umum; 
                TransaksiUmumDetail::create($value);
            }
            Alert::success('Success', 'Data Berhasil Disimpan');
            return redirect()->route('indextransaksiumum',['users' => $users]);
    }



    public function hapustransaksiumum($id_umum)
    {
        $transaksi_umum_detail = TransaksiUmumDetail::where('id_umum', $id_umum)
                ->delete();
        $transaksi_umum = TransaksiUmum::where('id_umum',$id_umum)
                ->delete();
        
        Alert::success('Success', 'Data Berhasil Dihapus');        
        return redirect()->route('indextransaksiumum');
    }

    public function ubahtransaksiumum($id_umum)
    {
        $users = UsersModel::select('*')
                ->get();
        $transaksi_umum = TransaksiUmum::with('get_transaksiumumdetail')
                ->where('id_umum',$id_umum)
                ->get();
        $makanan = MasterDataMakananModel::all();
        $pemesanan = MasterDataPemesananModel::all();

        return view ('Transaksi.TransaksiDataUmum.ubahdata', ['transaksi_umum' => $transaksi_umum,'users' => $users],compact('makanan','pemesanan'));
    }

    public function updatetransaksiumum(Request $request, $id_umum)
    {
        $users = UsersModel::select('*')
                ->get();

        $transaksi_umum_detail = TransaksiUmumDetail::where('id_umum', $id_umum)
                            ->delete();
        $transaksi_umum = TransaksiUmum::where('id_umum',$id_umum)
                            ->delete();
        
        // validasi
        $transaksi_umum = $request->validate([
            'nama_makanan' => 'required',
            'harga' => 'required',
            'jumlah_penjualan' => 'required',
            'addMoreInputFields.*.keterangan_pemesanan' => 'required',
            'addMoreInputFields.*.jumlah_pemesanan' => 'required',
            'total' => 'required',
        ]);

        $TransaksiUmum = TransaksiUmum::create($transaksi_umum);

        foreach ($request->addMoreInputFields as $key => $value) {
            $value['id_umum'] = $TransaksiUmum->id_umum; 
            TransaksiUmumDetail::create($value);
        }

        Alert::success('Success', 'Data Berhasil Diubah');
        return redirect()->route('indextransaksiumum',['users' => $users]);
        
    }


    // public function lihattransaksiumum($id_umum)
    // {
    //     $transaksi_umum = TransaksiUmum::select('*')
    //                              ->where('id_umum',$id_umum)
    //                              ->get();
    //     $transaksi_umum_detail = TransaksiUmumDetail::all();

    //     return view ('Transaksi.TransaksiDataUmum.lihatdata', ['transaksi_umum' => $transaksi_umum],compact('transaksi_umum_detail'));
    // }
    
}