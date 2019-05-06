<?php

namespace App\Http\Controllers;

use App\Download;
use Illuminate\Http\Request;
use App\Document;


class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index()
    {
        $user = auth()->user()->id;
        $uploaded_doc = Document::where('user_id',$user)->get();

        $download = Download::where('user_id',$user)->distinct()->get(['document_id','user_id']);
        $downloaded_doc = collect();

        foreach ($download as $n){
         $doc = Document::find($n->document_id);
         $downloaded_doc[] = $doc;
        }

        return view('activity.index',compact('uploaded_doc','downloaded_doc'));
    }
}
