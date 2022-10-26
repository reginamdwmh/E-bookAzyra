<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use App\Models\DashboardModel;
use Illuminate\Http\Request;
use PhpParser\Node\NullableType;
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
    
    // public function ubahprofile($id)
    // {
    //     $users = UsersModel::select('*')
    //             ->where('id',$id)
    //             ->get();

    //     return view ('Dashboard.editprofile', ['users' => $users]);
    // }
    

    // public function updateprofile(Request $request)
    // {
    //     $users = UsersModel::where('id', $request->id)
    //     ->update([
    //        'name' => $request->name,
    //        'email' => $request->email,
    //        'password' => bcrypt($request->password),
    //     ]);

    //     Alert::success('Success', 'Data Berhasil Diubah');
    //     return redirect()->route('index',['users' => $users]);
    // }

    // public function profile($id)
    // {
    //     $users = UsersModel::select('*')
    //             ->where('id',$id)
    //             ->get();
       
    //     return view ('Dashboard.profile', ['users' => $users]);
    // }


}
