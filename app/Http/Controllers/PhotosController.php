<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;

class PhotosController extends Controller
{
    public function create($album_id){
        return view('photos.create', ['album_id' => $album_id]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'image|max:1999'
        ]); 
        // get file name with extesnion
        $filenmaeWthExt = $request->file('photo')->getClientOriginalName();
        // get filename without the extension
        $filename = pathinfo($filenmaeWthExt, PATHINFO_FILENAME);
        // grab file etension
        $extension = $request->file('photo')->getClientOriginalExtension();

        // create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        // upload img
        $path = $request->file('photo')->storeAs('public/photo/'.$request->input('album_id'), $filenameToStore);

        // create album
        $photo = new Photo;
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getSize();
        $photo->photo = $filenameToStore;

        $photo->save();

        return back()->with('success', 'photo uploaded');
    }

    public function show(Photo $photo){
        return view('photos.show', ['photo' => $photo]);
    }

    public function destroy(Photo $photo){

        if(Storage::delete('public/photo/'.$photo->album_id.'/'.$photo->photo)){
            $photo->delete();
            return redirect('/')->with('success', 'Photo deleted');
        }
        
    }
}
