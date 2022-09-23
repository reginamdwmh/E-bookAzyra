<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\TransaksiUmum;
use Illuminate\Support\Facades\DB;
use App\Models\MasterDataMakananModel;
use App\Models\MasterDataPemesananModel;
use App\Models\TransaksiUmumDetail;

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



        $transaksi_umum = TransaksiUmum::with('get_transaksiumumdetail')->get();
        
        return view('Transaksi.TransaksiDataUmum.index', compact('transaksi_umum'));
        









        // $transaksi_umum = TransaksiUmum::select('*')
        // ->get();
        
        // $transaksi_umum_detail = TransaksiUmumDetail::with('get_transaksiumum')
        // ->get();
        
        // return view ('Transaksi.TransaksiDataUmum.index',['transaksi_umum' => $transaksi_umum,  'transaksi_umum_detail' => $transaksi_umum_detail]);

        
    }
    
    public function tambahtransaksiumum()
    {
        $makanan = MasterDataMakananModel::all();
        $pemesanan = MasterDataPemesananModel::all();

        return view('Transaksi.TransaksiDataUmum.tambahdata', compact('makanan','pemesanan'));
    }


    public function simpantransaksiumum(Request $request)
    {
       
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
            return redirect()->route('indextransaksiumum');

    }



    public function hapustransaksiumum($id_umum)
    {
        $transaksi_umum_detail = TransaksiUmumDetail::where('id_umum', $id_umum)
                ->delete();
        $transaksi_umum = TransaksiUmum::where('id_umum',$id_umum)
                ->delete();
        
        
        return redirect()->route('indextransaksiumum');
    }

    public function ubahtransaksiumum($id_umum)
    {
        $transaksi_umum = TransaksiUmum::with('get_transaksiumumdetail')
                ->where('id_umum',$id_umum)
                ->get();
        $makanan = MasterDataMakananModel::all();
        $pemesanan = MasterDataPemesananModel::all();

        return view ('Transaksi.TransaksiDataUmum.ubahdata', ['transaksi_umum' => $transaksi_umum],compact('makanan','pemesanan'));
    }

    public function updatetransaksiumum(Request $request, $id_umum)
    {
       
        $transaksi_umum_detail = TransaksiUmumDetail::find($id_umum);
        $transaksi_umum = TransaksiUmum::with('get_transaksiumumdetail')->find($id_umum);
        $validatedData = $request->validate([
            'nama_makanan' => 'required',
            'harga' => 'required',
            'jumlah_penjualan' => 'required',
            'addMoreInputFields.*.keterangan_pemesanan' => 'required',
            'addMoreInputFields.*.jumlah_pemesanan' => 'required',
            'total' => 'required',
        ]);     
        
        unset($validatedData['addMoreInputFields']);
        
        $TransaksiUmum = TransaksiUmum::where('id_umum', $transaksi_umum->id_umum)
            ->update($validatedData);
        
        foreach ($request->input('addMoreInputFields') as $key => $value) {
            dd($value);
        TransaksiUmumDetail::where('id_umum', $transaksi_umum_detail->id_umum)
            ->update($value);
        
        // foreach ($request->addMoreInputFields as $key => $value) {
        //     // $value['id_umum'] = $TransaksiUmum->id_umum; 
        //     dd($value);
        //     TransaksiUmumDetail::where('id_umum', $transaksi_umum_detail->id_umum)
            
        //     ->update($value);
            
        
        }
        return redirect()->route('indextransaksiumum');
        




    //    $transaksi_umum = TransaksiUmum::where('id_umum', $request->id_umum)
    //              ->update([
    //                 'nama_makanan' => $request->nama_makanan,
    //                 'harga' => $request->harga,
    //                 'jumlah_penjualan' => $request->jumlah_penjualan,
    //                 'keterangan_pemesanan' => $request->keterangan_pemesanan,
    //                 'jumlah_pemesanan' => $request->jumlah_pemesanan,
    //                 'total' => $request->total,
    //              ]);
    //     $makanan = MasterDataMakananModel::all(); 
    //     $pemesanan = MasterDataPemesananModel::all();         
    //              compact('makanan','pemesanan');
    
    //    return redirect()->route('indextransaksiumum');



    // public function lihattransaksiumum($id_umum)
    // {
    //     $transaksi_umum = TransaksiUmum::select('*')
    //                              ->where('id_umum',$id_umum)
    //                              ->get();
    //     $transaksi_umum_detail = TransaksiUmumDetail::all();

    //     return view ('Transaksi.TransaksiDataUmum.lihatdata', ['transaksi_umum' => $transaksi_umum],compact('transaksi_umum_detail'));
    // }
}
}