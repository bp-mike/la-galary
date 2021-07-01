<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumsController extends Controller
{
    public function index(){ 
        // $albums = Album::with('Photos')->get();
        $albums = Album::with('Photos')->latest()->paginate(5);
        return view('albums.index', ['albums'=>$albums]
    );
    }

    public function create(){
        return view('albums.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'image|max:1999'
        ]); 
        // get file name with extesnion
        $filenmaeWthExt = $request->file('cover_image')->getClientOriginalName();
        // get filename without the extension
        $filename = pathinfo($filenmaeWthExt, PATHINFO_FILENAME);
        // grab file etension
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        // create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        // upload img
        $path = $request->file('cover_image')->storeAs('public/album_cover', $filenameToStore);

        // create album
        $album = new Album;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;

        $album->save();

        return back()->with('success', 'Album creted');
    }

    public function show(Album $album){
        return view('albums.show', ['album'=> $album]);
    }

    public function edit(Album $album){
        return view('albums.edit', ['album'=> $album]);
    }


}
