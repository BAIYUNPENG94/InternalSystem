<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    // To render html form upload
    public function index()
    {
        return view('dropzone.index');
    }
      
    // To upload file from client to server
    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('storage/pdfs'),$fileName);
        return response()->json(['success'=>$fileName]);
    }
}
