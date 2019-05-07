<?php

namespace App\Http\Controllers;

use App\Document;
use App\User;
use App\UserViewModel;
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
        $user = User::all()->take(10);

        $users = collect();

        foreach ($user as $n) {
            $user_view = new UserViewModel();

            $user_view->id = $n->id;
            $user_view->first_name = $n->first_name;
            $user_view->last_name = $n->last_name;
            $user_view->upload = Document::where('user_id',$n->id)->count();
//          $user_view->download = $n->downloads()->count();

            $users[] =  $user_view;
        }

        return view('dashboard.active_employees',compact('users'));
    }

    public function ActiveEmployeesDetails($id)
    {
        $documents = Document::where('user_id',$id)->get();
        return view('dashboard.active_employees_details',compact('documents'));
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
