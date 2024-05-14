<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as Files;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::query()->paginate(5);
        return view('Tms.admin.files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tms.admin.files.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $file = new File;
        $request->validate([
            'img'=>'required|mimes:png,jpg,jpeg|max:2048',
            'title'=>'required|max:100'
        ]);
        $fileName = Str::slug($request->title).'-'.time().'.'.$request->img->extension();
        $request->img->move(public_path('uploads/'),$fileName);
        $file->img = $fileName;
        $file->title = $request->title;
        $file->user_id = Auth::user()->id;
        $file->save();
        return redirect('/admin\file')->with('message', 'Image uploaded Successfully');
        //dd($fileName);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $file = File::query()->where('id',$id)->get()->first();
        return view('Tms.admin.files.view', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $file = File::query()->where('id', $id)->get()->first();
        return view('Tms.admin.files.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $file = new File;
        $file = $file()->where('id', $id)->get()->first();
        $request->validate([
            'img'=>'required|mimes:png,jpg,jpeg|max:2048',
            'title'=>'required|max:100'
        ]);
        $fileName = Str::slug($request->title).'-'.time().'.'.$request->img->extension();
        $request->img->move(public_path('uploads/'),$fileName);
        Files::delete(public_path('uploads/'. $file->img));
        $file->img = $fileName;
        $file->title = $request->title;
        $file->user_id = Auth::user()->id;
        $file->update();
        return redirect('/admin/file')->with('message', 'Image updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = File::query()->where('id', $id)->get()->first();
        Files::delete(public_path('uploads/'. $file->img));
        $file->delete();
        return redirect('/admin/file')->with('message','Deleted successfully');
    }
}
