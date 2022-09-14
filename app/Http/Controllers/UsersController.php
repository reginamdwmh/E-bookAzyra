<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use App\Models\UsersModel;

class UsersController extends Controller
{
    // public function index()
    // {
    //     return view ('Users.index');
    // }

    public function index()
    {
        $users = UsersModel::select('*')
                ->get();
        return view('Users.index',['users' => $users]);
    }

    public function tambahusers()
    {
        return view('Users.tambahusers');
    }

    public function simpanusers(Request $request)
    {
        $users = UsersModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('index');
    }

    public function hapususers($id)
    {
        $users = UsersModel::where('id',$id)
                ->delete();
        
        return redirect()->route('index');
    }

    public function ubahusers($id)
    {
        $users = UsersModel::select('*')
                ->where('id',$id)
                ->get();

        return view ('Users.ubahusers', ['users' =>$users]);
    }

    public function updateusers(Request $request)
    {
       $users = UsersModel::where('id', $request->id)
                 ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                 ]);
    
       return redirect()->route('index');
    }
}
