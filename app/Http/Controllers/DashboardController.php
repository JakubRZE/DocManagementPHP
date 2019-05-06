<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index()
    {
        return view('dashboard.index');
    }

    public function ActiveEmployees()
    {
        return view('dashboard.active_employees');
    }

    public function ActiveEmployeesDetails($id)
    {
        return view('dashboard.active_employees_details');
    }
    public function DownloadedDocuments()
    {
        return view('dashboard.downloaded_documents');
    }
    public function AllEmployees()
    {
        return view('dashboard.all_employees');
    }

}
