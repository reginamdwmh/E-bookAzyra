<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        return view('Login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            // $periode = date('Ym');
            // $cekstok = DB::table('stok_alat')->select('*')->where('periode', array($periode))->get();
            // // dd($cekstok);
            // $periodelama = date('Ym', strtotime('-1month'));
            // $databulanlalu = DB::table('stok_alat')->select('*')->where('periode', array($periodelama))->get();

            $user = Auth::user();
            Alert::success('Login Berhasil');

            // if (count($cekstok) == 0) {
            //     foreach ($databulanlalu as $value) {
            //         DB::table('stok_alat')->insert([
            //             [
            //                 'periode' => $periode,
            //                 'id_alat' => $value->id_alat,
            //                 'stok_awal' => $value->stok_masuk - $value->stok_keluar,
            //                 'stok_masuk' => 0,
            //                 'stok_keluar' => 0,
            //                 'created_at' => date('Y-m-d H:i:s'),
            //                 'updated_at' => date('Y-m-d H:i:s')
            //             ]
            //         ]);
            //     }
            // }

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
        Alert::success('Success', 'Anda Berhasil Logout');
        return redirect('/login');
    }
}
