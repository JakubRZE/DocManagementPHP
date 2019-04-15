<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.menage');
    }

    public function change_psw()
    {
        return view('auth.passwords.reset');
    }

    public function change_done()
    {
        return view('auth.passwords.reset');
    }
}
