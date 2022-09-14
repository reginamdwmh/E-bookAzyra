<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterDataPemesananModel;

class MasterDataPemesananController extends Controller
{
    public function indexpemesanan()
    {
        $pemesanan = DB::table('pemesanan')->paginate(5);
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
        ]);

        return redirect()->route('indexpemesanan');
    }

    public function hapuspemesanan($id_pemesanan)
    {
        $pemesanan = MasterDataPemesananModel::where('id_pemesanan',$id_pemesanan)
                ->delete();
        
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
                    'keterangan_kategori' => $request->keterangan_kategori,

                 ]);
    
       return redirect()->route('indexpemesanan');
    }
}
