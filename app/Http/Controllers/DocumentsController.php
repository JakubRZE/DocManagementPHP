<?php

namespace App\Http\Controllers;

use App\Document;
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
    public function index()
    {
        $documents = Document::all();
        return view('document.index', compact('documents'));
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
            'file' => 'required|file|max:250000|mimes:doc,docx,txt',
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

        return view('document.show',compact('document','full_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('document.edit');
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
        //
    }


    public function download($id)
    {
        $id = Document::find($id);
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

        return view('document.destroy',compact('document','full_name', 'type'));
    }

    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();

        return redirect('documents');
    }
}
