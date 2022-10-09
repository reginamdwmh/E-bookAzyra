<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class LoginController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->role === 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->role === 'user') {
                return redirect()->intended('user');
            }
        }

        return view ('Login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Alert::success('Login Berhasil');
            if ($user->role === 'admin') {
                return redirect()->intended('/admin');
            } elseif ($user->role === 'user') {
                return redirect()->intended('/dashboard');
            }

            
        }

        // if(Auth::attempt($credentials)) {
        //     Alert::success('Login Berhasil');
        //     $request->session()->regenerate();         
        //     return redirect()->intended('/dashboard');
            
        // }

        Alert::error('Error', 'Login Gagal');
        return back();
    }

    public function logout(Request $request)
    {

        $request->session()->flush();
        Auth::logout();
        Alert::success('Success','Anda Berhasil Logout');
        return redirect('/login');
    }
}
