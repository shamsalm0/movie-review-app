<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $movies = Movie::orderBy('created_at','DESC');

        if(!empty($request->keyword)){
            $movies->where('title','like','%'.$request->keyword.'%');
        }
        $movies=$movies->where('status',1)->paginate(10);

        foreach ($movies as $movie) {
            $averageRating = $movie->reviews()->avg('rating');
            $movie->averageRating = round($averageRating);
            $reviewCount = $movie->reviews()->count();
            
        }
        return view('home.home',[
            'movies'=>$movies,
            
        ]);
    }

    public function details($id){
        $movie =Movie:: findOrFail($id);
        $averageRating = $movie->reviews()->avg('rating');
        $relatedMovie = Movie::where('status',1)->where('id','!=',$id)->take(3)->inRandomOrder()->get();
        $reviewCount = $movie->reviews()->count();
        return view('movies.detail',[
            'movie'=>$movie,
            'averageRating'=>$averageRating,
            'reviewCount'=>$reviewCount
        ]);
    }

    public function submitReview(Request $request)
    {
        $rules=[
            'movie_id' => 'required|exists:movies,id',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            $errors = $validator->errors()->all();
            dd($errors);
            return redirect()->back()->withInput()->withErrors($validator);
        }

        
        $review = new Review();
        $review->user_id = auth()->id(); 
        $review->movie_id = $request->input('movie_id');
        $review->comment = $request->input('comment');
        $review->rating = $request->input('rating');
        $review->save();

        // dd($review);
        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
