<?php

namespace App\Http\Controllers;

use App\Document;
use App\DocumentViewModel;
use App\Download;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchString = $request->get('SearchString');
        if(!$searchString == ''){
            $doc = Document::where('description','LIKE','%'.$searchString.'%')->get();;
        }
        else{
            $doc = Document::all();
        }

        $documents = collect();

            foreach ($doc as $n) {
            $doc_view = new DocumentViewModel();

            $doc_view->id = $n->id;
            $doc_view->description = $n->description;
            $doc_view->created_at = $n->created_at;
            $doc_view->user_id = $n->user_id;
            $doc_view->title = $n->title;
            $doc_view->path = $n->path;
            $doc_view->type = $n->type;
            $doc_view->downloads = $n->downloads()->count();
            $documents[] = $doc_view;
            }

        return view('document.index', compact('documents','searchString'));
    }

    public function sort( $sortOrder )
    {

        switch ($sortOrder) {
            case "Disc_desc":
                $doc = Document::orderBy('description', 'desc')->get();
                break;
            case "Disc_asc":
                $doc = Document::orderBy('description', 'asc')->get();
                break;
            case "Up_desc":
                $doc = Document::orderBy('created_at', 'desc')->get();
                break;
            case "Up_asc":
                $doc = Document::orderBy('created_at', 'asc')->get();
                break;

            default:
                $doc = Document::All();
                break;
        }

        $documents = collect();
        foreach ($doc as $n) {
            $doc_view = new DocumentViewModel();
            $doc_view->id = $n->id;
            $doc_view->description = $n->description;
            $doc_view->created_at = $n->created_at;
            $doc_view->user_id = $n->user_id;
            $doc_view->title = $n->title;
            $doc_view->path = $n->path;
            $doc_view->type = $n->type;
            $doc_view->downloads = $n->downloads()->count();
            $documents[] = $doc_view;
        }

        if ($sortOrder == 'Down_asc') {
            $documents = $documents->sortBy('downloads');
        } else if ($sortOrder == 'Down_desc') {
            $documents = $documents->sortByDesc('downloads');
        }

        $searchString ='';

        return view('document.index', compact('documents','sortOrder','searchString'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request,[
            'file' => 'required|file|max:250000|mimes:doc,docx,txt,pdf',
            'description' => 'required'
        ]);

        $upload = $request->file('file');
        $path = $upload->store('storage');
        Document::create([
            'description' =>$request->input('description'),
            'user_id'=> auth()->user()->id,
            'title' => $upload->getClientOriginalName(),
            'path' => $path,
            'type' => $upload->getClientOriginalExtension()
        ]);

        return redirect('documents/create')->with('success','File uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);

//        $document = DB::table('documents')
//            ->join('users', 'documents.user_id', '=', 'users.id')
//            ->where('documents.id', $id)
//            ->select('documents.*', 'users.first_name', 'users.last_name')
//            ->get();

       $user_name = User::find($document->user_id);
       $full_name = $user_name->first_name.' '.$user_name->last_name;
       $downloads = $document->downloads()->count();

        return view('document.show',compact('document','full_name','downloads'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::find($id);
        return view('document.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description'=>'required'
        ]);

        $document = Document::find($id);
        $document->description = $request->get('description');
        $document->save();

        return redirect('/documents');
    }


    public function download($id)
    {
        $id = Document::find($id);

        Download::create([
            'user_id'=> auth()->user()->id,
            'document_id' => $id->id
        ]);

        return Storage::download($id->path, $id->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy_show($id)
    {
        $document = Document::find($id);

        $user_name = User::find($document->user_id);
        $full_name = $user_name->first_name.' '.$user_name->last_name;
        $downloads = $document->downloads()->count();

        return view('document.destroy',compact('document','full_name', 'type','downloads'));
    }

    public function destroy($id)
    {
        $document = Document::find($id);
        if ( $document->delete()) {
            return redirect('documents');
        }
        return response()->json(['error' => 'something went wrong'], 400);
    }
}
