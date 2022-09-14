<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\TransaksiUmum;

class TransaksiUmumController extends Controller
{
    public function indexumum(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(TransaksiUmum::query())->toJson();
        }

        return view ('Transaksi.TransaksiDataUmum.index');
    }


}
