<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitesController extends Controller
{
    public function Index()
    {
        echo 'Hello World';
    }

    public function Add()
    {
        return view('sites.add');
    }

    public function Save()
    {

    }
}
