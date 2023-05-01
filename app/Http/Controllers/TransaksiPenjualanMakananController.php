<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiPenjualanMakanan;
use App\Models\MasterDataMakananModel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UsersModel;

class TransaksiPenjualanMakananController extends Controller
{
    public function indexpenjualanmakanan()
    {
        $users = UsersModel::select('*')
            ->get();
        $transaksi_penjualan_makanan = TransaksiPenjualanMakanan::select('*')
            ->get();


        return view('Transaksi.TransaksiDataPenjualanMakanan.index', ['transaksi_penjualan_makanan' => $transaksi_penjualan_makanan, 'users' => $users]);
    }

    public function tambahpenjualanmakanan()
    {
        $users = UsersModel::select('*')
            ->get();
        //$transaksi_penjualan_makanan = MasterDataMakananModel::all();
        $transaksi_penjualan_makanan = MasterDataMakananModel::join('alat', 'makanan.id_alat', '=', 'alat.id_alat')
            ->get(['makanan.*', 'alat.nama_alat']);

        return view('Transaksi.TransaksiDataPenjualanMakanan.tambahdata', compact('transaksi_penjualan_makanan'), ['users' => $users]);
    }


    public function simpanpenjualanmakanan(Request $request)
    {
        // $request->validate([
        //     'nama_makanan' => 'required',
        //     'harga' => 'required',
        //     'jumlah' => 'required',
        //     'diskon' => 'required',
        //     'total' => 'required'
        //  ]);

        //  $count = count($request->nama_makanan);

        //  for ($i=0; $i < $count; $i++) { 
        //    $task = new TransaksiPenjualanMakanan();
        //    $task->nama_makanan = $request->nama_makanan[$i];
        //    $task->harga = $request->harga[$i];
        //    $task->jumlah = $request->jumlah[$i];
        //    $task->diskon = $request->diskon[$i];
        //    $task->total = $request->total[$i];
        //    $task->save();
        //  }

        //  return redirect()->route('tambahpenjualanmakanan');


        $users = UsersModel::select('*')
            ->get();

        //dd($request);
        $request->validate([
            'addMoreInputFields.*.nama_makanan' => 'required',
            'addMoreInputFields.*.id_alat' => 'required',
            'addMoreInputFields.*.harga' => 'required',
            'addMoreInputFields.*.jumlah' => 'required',
            'addMoreInputFields.*.diskon' => 'required',
            'addMoreInputFields.*.total' => 'required',
        ]);


        foreach ($request->addMoreInputFields as $key => $value) {
            $stok = DB::table('stok_alat')->selectRaw('*')->where([['id_alat', $value['id_alat']]])->get();
            $sisa = ($stok[0]->stok_masuk - $stok[0]->stok_keluar);
            if ($sisa < intval(str_replace(",", "", $value['jumlah']))) {
                // dd(($stok[0]->stok_masuk - $stok[0]->stok_keluar));
                Alert::error('Error', 'Stok tidak mencukupi');
                return redirect()->route('tambahpenjualanmakanan', ['users' => $users]);
            } else {
                DB::table('stok_alat')->where([['id_alat', $value['id_alat']]])->update(['stok_keluar' => $stok[0]->stok_keluar + intval(str_replace(",", "", $value['jumlah']))]);
                TransaksiPenjualanMakanan::create($value);
            }
        }
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('indexpenjualanmakanan', ['users' => $users]);





        // $transaksi_penjualan_makanan = TransaksiPenjualanMakanan::create([
        //     'nama_makanan' => $request->nama_makanan,
        //     'harga' => $request->harga,
        //     'jumlah' => $request->jumlah,
        //     'diskon' => $request->diskon,
        //     'total' => $request->total,
        // ]);

        // return redirect()->route('tambahpenjualanmakanan');
    }

    public function hapuspenjualanmakanan($id_penjualan)
    {
        $transaksi_penjualan_makanan = TransaksiPenjualanMakanan::where('id_penjualan', $id_penjualan)
            ->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('indexpenjualanmakanan');
    }

    public function ubahpenjualanmakanan($id_penjualan)
    {
        $users = UsersModel::select('*')
            ->get();
        $transaksi_penjualan_makanan = TransaksiPenjualanMakanan::select('*')
            ->where('id_penjualan', $id_penjualan)
            ->get();
        $makanan = MasterDataMakananModel::all();

        return view('Transaksi.TransaksiDataPenjualanMakanan.ubahdata', ['transaksi_penjualan_makanan' => $transaksi_penjualan_makanan, 'users' => $users], compact('makanan'));
    }

    public function updatepenjualanmakanan(Request $request)
    {
        $users = UsersModel::select('*')
            ->get();
        $transaksi_penjualan_makanan = TransaksiPenjualanMakanan::where('id_penjualan', $request->id_penjualan)
            ->update([
                'nama_makanan' => $request->nama_makanan,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah,
                'diskon' => $request->diskon,
                'total' => $request->total,
            ]);
        $makanan = MasterDataMakananModel::all();
        compact('makanan');
        Alert::success('Success', 'Data Berhasil Diubah');
        return redirect()->route('indexpenjualanmakanan', ['users' => $users]);
    }

    // public function lihatpenjualanmakanan($id_penjualan)
    // {
    //     $transaksi_penjualan_makanan = TransaksiPenjualanMakanan::select('*')
    //                              ->where('id_penjualan',$id_penjualan)
    //                              ->get();
    //     $makanan = MasterDataMakananModel::all();

    //     return view ('Transaksi.TransaksiDataPenjualanMakanan.lihatdata', ['transaksi_penjualan_makanan' => $transaksi_penjualan_makanan,'makanan' => $makanan],compact('makanan'));
    // }

}
