<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\TransaksiUmum;

class TransaksiUmumController extends Controller
{
    public function index()
    {
        return view ('Transaksi.TransaksiDataUmum.index');
    }

    public function getUmum()
    {
        $data = TransaksiUmum::select('*')
                ->limit(100)
                ->get();
        return DataTables::of($data)->make(true);

    }
}
