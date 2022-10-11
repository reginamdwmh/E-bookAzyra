<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class DashboardController extends Controller
{
    public function index()
    {
        $name = UsersModel::select('*')
                 ->get();
        return view('Dashboard.index',['name' => $name]);
    }

    public function admin()
    {
        $name = UsersModel::select('*')
                 ->get();
        return view('admin.index',['name' => $name]);
    }
    
}
