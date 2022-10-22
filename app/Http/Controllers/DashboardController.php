<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use App\Models\DashboardModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class DashboardController extends Controller
{
    public function index()
    {
        $users = UsersModel::select('*')
                 ->get();
        return view('Dashboard.index',['users' => $users]);
    }

    public function admin()
    {
        $users = UsersModel::select('*')
                 ->get();
        return view('admin.index',['users' => $users]);
    }
    
}
