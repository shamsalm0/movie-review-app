<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $movies = Movie::orderBy('created_at','DESC');
        if(!empty($request->keyword)){
            $movies->where('title','like','%'.$request->keyword.'%');
        }
        $movies=$movies->where('status',1)->paginate(10);
        return view('home.home',[
            'movies'=>$movies
        ]);
    }
}
