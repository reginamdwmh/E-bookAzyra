<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\TransaksiUmum;

class TransaksiUmumController extends Controller
{
    public function indexumum(Request $request)
    {
        $transaksi_umum = TransaksiUmum::select('*')
                        ->get();


        return view ('Transaksi.TransaksiDataUmum.index',['transaksi_umum' => $transaksi_umum]);

        // if ($request->ajax()) {
        //     return DataTables::of(TransaksiUmum::query())->toJson();
        // }

        // return view ('Transaksi.TransaksiDataUmum.index');
    }


}
