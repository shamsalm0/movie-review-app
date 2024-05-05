<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GD\Driver;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(Request $request) {
        $movies = Movie::orderBy('created_at','DESC');
        if(!empty($request->keyword)){
            $movies->where('title','like','%'.$request->keyword.'%');
        }
        $movies=$movies->paginate(3);
        return view('movies.list',[
            'movies' => $movies
        ]);
    }

    public function create() {
        return view('movies.create');
    }

    public function store(Request $request) {
        $rules= [
            'title'=> 'required|min:5',
            'director'=>'required|min:3',
            'status'=>'required'
        ];
        if(!empty($request->image)){
            $rules['image']='image';
        }
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('movies.create')->withInput()->withErrors($validator);
        }

        $movie = new Movie();
        $movie->title= $request->title;
        $movie->director= $request->director;
        $movie->discription= $request->discription;
        $movie->status= $request->status;
        $movie->save();
        if(!empty($request->image)){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
            $image->move(public_path('uploads/movies'),$imageName);

            $movie->image = $imageName;
            $movie->save();
            
            $manager = new ImageManager(Driver::class);
        $img = $manager->read(public_path('uploads/movies/').$imageName);
        $img->resize(900);
        $img->save(public_path('uploads/movies/thumb/').$imageName);
        
        }

        return redirect()->route('movies.index')->with('success','you have registered successfully');

        
    }

    public function edit() {

    }

    public function update() {

    }

    public function drop() {

    }
}
