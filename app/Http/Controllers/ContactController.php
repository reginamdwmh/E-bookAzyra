<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view ('Contact.index');
    }

    public function admin()
    {
        return view ('admin.contact');
    }
}
