<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Index()
    {
        return view('dashboard.index');
    }

    public function ActiveEmployees()
    {
        return 'Hello Dasboard';
    }

    public function ActiveEmployeesDetails()
    {
        return 'Hello Dasboard';
    }
    public function DownloadedDocuments()
    {
        return 'Hello Dasboard';
    }
    public function AllEmployees()
    {
        return 'Hello Dasboard';
    }

}
