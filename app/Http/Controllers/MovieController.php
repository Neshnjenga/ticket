<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function add(){
        return view('admin.upload');
    }

    public function addpost(Request $request){
        $request->validate([
            'name'=>'required|unique:genres',
            'price'=>'required',
            'date'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpef,jpg,avif,png,pdf',
        ]);
        if($request->has('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extention;
            $path = ('public/uploads/');
            $file->move($path,$fileName);
        }
        $movieData = new Genre();
        $movieData->movieId = $request->movieId;
        $movieData->name = $request->name;
        $movieData->price = $request->price;
        $movieData->date = $request->date;
        $movieData->description = $request->description;
        $movieData->image = $path.$fileName;
        $movieData->save();
        return  redirect(route('view'))->with('success','Data uploaded succcessfully');
    }

    public function view(){
        $datas = Genre::all();
        return view('admin.movies',compact('datas'));
    }

    public function check($name){
        $movies = Movie::where('name',$name)->first();
        $movie_id = $movies->id;
        $types = Genre::where('movieId',$movie_id)->get();
        return view('user.check',compact('types','name'));
    }

}
