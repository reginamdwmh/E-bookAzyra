<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;

class ContactController extends Controller
{
    public function index()
    {
        $users = UsersModel::select('*')
                 ->get();
        return view ('Contact.index',['users' => $users]);
    }

    public function admin()
    {
        $users = UsersModel::select('*')
                ->get();
        return view ('admin.contact',['users' => $users]);
    }
}
