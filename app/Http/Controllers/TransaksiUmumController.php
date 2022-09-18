<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\TransaksiUmum;
use Illuminate\Support\Facades\DB;
use App\Models\MasterDataMakananModel;
use App\Models\MasterDataPemesananModel;

class TransaksiUmumController extends Controller
{
    public function indextransaksiumum(Request $request)
    {
        // $transaksi_umum = TransaksiUmum::with('pemesanan')->get();

        // return view('Transaksi.TransaksiDataUmum.index', compact('transaksi_umum'));


        // $transaksi_umum = TransaksiUmum::with(['pemesanan'])->get();
        // return view('Transaksi.TransaksiDataUmum.index', [
        //     'transaksi_umum' => $transaksi_umum
        // ]);


        $transaksi_umum = TransaksiUmum::select('*',DB::raw("CONCAT(transaksi_umum.keterangan_pemesanan,' : ',transaksi_umum.jumlah_pemesanan) as mitra"))
                        ->get();


        return view ('Transaksi.TransaksiDataUmum.index',['transaksi_umum' => $transaksi_umum]);

        // if ($request->ajax()) {
        //     return DataTables::of(TransaksiUmum::query())->toJson();
        // }

        // return view ('Transaksi.TransaksiDataUmum.index');
    }
    public function tambahtransaksiumum()
    {
        $makanan = MasterDataMakananModel::all();
        $pemesanan = MasterDataPemesananModel::all();

        return view('Transaksi.TransaksiDataUmum.tambahdata', compact('makanan','pemesanan'));
    }


    public function simpantransaksiumum(Request $request)
    {

        // $transaksi_umum = TransaksiUmum::create($request->all());

        // $keterangan_pemesanan = $request->input('keterangan_pemesanan', []);
        // $jumlah_pemesanan = $request->input('jumlah_pemesanan', []);
        // for ($pesanan=0; $pesanan < count($keterangan_pemesanan); $pesanan++) {
        //     if ($keterangan_pemesanan[$pesanan] != '') {
        //         $transaksi_umum->attach($keterangan_pemesanan[$pesanan],$jumlah_pemesanan[$pesanan]);
        //     }
        // }

        // return redirect()->route('tambahtransaksiumum');



        // $this->validate($request, [
        //     'nama_makanan' => 'required|string',
        //     'harga' => 'required|integer',
        //     'jumlah_penjualan' => 'required|integer',
        //     'keterangan_pemesanan' => 'required|string',
        //     'jumlah_pemesanan' => 'required|integer',
        //     'total' => 'required|integer',
        // ],[],[
        //     'nama_makanan' => 'nama makanan',
        //     'harga' => 'harga',
        //     'jumlah_penjualan' => 'jumlah penjualan',
        //     'keterangan_pemesanan' => 'keterangan pemesanan',
        //     'jumlah_pemesanan' => 'jumlah pemesanan',
        //     'total' => 'total',
        // ]);
        // DB::beginTransaction();
        // try {
        //     $transaksi_umum = TransaksiUmum::create([
        //         'nama_makanan' => $request -> nama_makanan,
        //         'harga' => $request -> harga,
        //         'jumlah_penjualan' => $request -> jumlah_penjualan,
        //         'total' => $request -> total,
        //     ]);
        //     $transaksi_umum->pemesanan()->createMany($this->setFieldPemesanan($request));
        //     return redirect()->route('indextransaksiumum');
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        //     dd("Create failed:" . $th->getMessage());
        // } finally {
        //     DB::commit();
        // }

        
        $transaksi_umum = TransaksiUmum::create([
            'nama_makanan' => $request->nama_makanan,
            'harga' => $request->harga,
            'jumlah_penjualan' => $request->jumlah_penjualan,
            'keterangan_pemesanan' => $request->keterangan_pemesanan,
            'jumlah_pemesanan' => $request->jumlah_pemesanan,
            'total' => $request->total,
        ]);
        
        return redirect()->route('tambahtransaksiumum');

       
    }

    public function hapustransaksiumum($id_umum)
    {
        $transaksi_umum = TransaksiUmum::where('id_umum',$id_umum)
                ->delete();
        
        return redirect()->route('indextransaksiumum');
    }

    public function ubahtransaksiumum($id_umum)
    {
        $transaksi_umum = TransaksiUmum::select('*')
                ->where('id_umum',$id_umum)
                ->get();
        $makanan = MasterDataMakananModel::all();
        $pemesanan = MasterDataPemesananModel::all();

        return view ('Transaksi.TransaksiDataUmum.ubahdata', ['transaksi_umum' => $transaksi_umum],compact('makanan','pemesanan'));
    }

    public function updatetransaksiumum(Request $request)
    {
       $transaksi_umum = TransaksiUmum::where('id_umum', $request->id_umum)
                 ->update([
                    'nama_makanan' => $request->nama_makanan,
                    'harga' => $request->harga,
                    'jumlah_penjualan' => $request->jumlah_penjualan,
                    'keterangan_pemesanan' => $request->keterangan_pemesanan,
                    'jumlah_pemesanan' => $request->jumlah_pemesanan,
                    'total' => $request->total,
                 ]);
        $makanan = MasterDataMakananModel::all(); 
        $pemesanan = MasterDataPemesananModel::all();         
                 compact('makanan','pemesanan');
    
       return redirect()->route('indextransaksiumum');
    }


    // public function caritransaksiumum(Request $request)
    // {
    //     $cari = $request->cari;

    //     $transaksi_umum = DB :: table('transaksi_umum')
    //                     ->where('nama_makanan','like',"%".$cari."%")
    //                     ->paginate(5);
        
    //     return view ('Transaksi.TransaksiDataUmum.index', ['transaksi_umum' => $transaksi_umum]);
    // }


}
