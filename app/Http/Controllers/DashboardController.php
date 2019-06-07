<?php

namespace App\Http\Controllers;

use App\Document;
use App\Download;
use App\DocumentViewModel;
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
        $user = auth()->user();
        return view('dashboard.index',compact('user'));
    }

    public function ActiveEmployees()
    {
        $user = User::all();
        $users = collect();

        foreach ($user as $n) {
            $user_view = new UserViewModel();

            $user_view->id = $n->id;
            $user_view->first_name = $n->first_name;
            $user_view->last_name = $n->last_name;
            $user_view->email = $n->email;
            $user_view->upload = Document::where('user_id',$n->id)->count();
            $users[] =  $user_view;
        }

        $users = $users->sortByDesc('upload')->take(10);

        return view('dashboard.active_employees',compact('users'));
    }

    public function ActiveEmployeesDetails($id)
    {
        $documents = Document::where('user_id',$id)->get();
        return view('dashboard.active_employees_details',compact('documents'));
    }
    public function DownloadedDocuments(Request $request)
    {
        $onPage = $request->get('amount');
        $document = Document::all();
        $documents = collect();

        foreach ($document as $n) {
            $doc_view = new DocumentViewModel();

            $doc_view->description = $n->description;
            $doc_view->created_at = $n->created_at;
            $doc_view->title = $n->title;
            $doc_view->downloads = $n->downloads()->count();
            $doc_view->last_download = Download::where('document_id','LIKE',$n->id)->orderBy('created_at','desc')->pluck('created_at')->first();
            $documents[] = $doc_view;
        }

        if (is_numeric($onPage)) {
            $documents = $documents->sortByDesc('downloads')->take($onPage);
        }
        else
        {
            $documents = $documents->sortByDesc('downloads')->take(10);
            $onPage =10;
        }

        return view('dashboard.downloaded_documents',compact('documents','onPage'));
    }
    public function AllEmployees(Request $request)
    {
        $searchString = $searchString = $request->get('SearchString');

        if(!$searchString == ''){
            $user = User::where('first_name','LIKE','%'.$searchString.'%')->orderBy('first_name')->get();
        }
        else{
            $user = User::all();
        }

        $users = collect();
        foreach ($user as $n) {
            $user_view = new UserViewModel();

            $user_view->id = $n->id;
            $user_view->first_name = $n->first_name;
            $user_view->last_name = $n->last_name;
            $user_view->address = $n->address;
            $user_view->email = $n->email;
            $user_view->download = Download::where('user_id',$n->id)->groupBy('document_id')->count();
            $user_view->upload = Document::where('user_id',$n->id)->count();
            $users[] =  $user_view;
        }

        return view('dashboard.all_employees', compact('users','searchString'));
    }

}
