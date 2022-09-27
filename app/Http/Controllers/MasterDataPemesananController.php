<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterDataPemesananModel;
use RealRashid\SweetAlert\Facades\Alert;

class MasterDataPemesananController extends Controller
{
    public function indexpemesanan()
    {
      
        $pemesanan = MasterDataPemesananModel::select('*')
                 ->get();

        return view ('MasterData.MasterDataPemesanan.index',['pemesanan' => $pemesanan]);
    }

    public function tambahpemesanan()
    {
        return view('MasterData.MasterDataPemesanan.tambahdata');
    }

    public function simpanpemesanan(Request $request)
    {

        $pemesanan = MasterDataPemesananModel::create([
            'keterangan_pemesanan' => $request->keterangan_pemesanan,
            'biaya_admin' => $request->biaya_admin,
            'ongkir' => $request->ongkir,
        ]);
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('indexpemesanan');
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
        $pemesanan = MasterDataPemesananModel::select('*')
                ->where('id_pemesanan',$id_pemesanan)
                ->get();

        return view ('MasterData.MasterDataPemesanan.ubahdata', ['pemesanan' =>$pemesanan]);
    }

    public function updatepemesanan(Request $request)
    {
       $pemesanan = MasterDataPemesananModel::where('id_pemesanan', $request->id_pemesanan)
                 ->update([
                    'keterangan_pemesanan' => $request->keterangan_pemesanan,
                    'biaya_admin' => $request->biaya_admin,
                    'ongkir' => $request->ongkir,

                 ]);
        Alert::success('Success', 'Data Berhasil Diubah');
       return redirect()->route('indexpemesanan');
    }

    // public function lihatpemesanan($id_pemesanan)
    // {
    //     $pemesanan = MasterDataPemesananModel::select('*')
    //                              ->where('id_pemesanan',$id_pemesanan)
    //                              ->get();


    //     return view ('MasterData.MasterDataPemesanan.lihatdata', ['pemesanan' => $pemesanan],compact('pemesanan'));
    // }
}
