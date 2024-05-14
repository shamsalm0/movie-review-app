@extends('layouts.masterlayout')
@section('content')
    <div class="movie-detail border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 lg:flex md:flex sm:flex gap-4 ">
            <img src="{{asset('/uploads/movies/thumb/'.$movie->image)}}" class="w-full" style="width: 15rem; height:24rem" alt="">
            <div class="lg:ml-24">
                <h2 class="text-4xl font-semibold text-white">{{$movie->title}}</h2>
                <div class="">

                    <p class="info text-white">by {{$movie->director}}</p>
                    <div class="star-rating d-inline-flex " title="">
                        
                        <div class="star-rating d-inline-flex ml-2" title="">
                            @php
                                $averageRating = round($averageRating); // Round the average rating to the nearest whole number
                            @endphp
                            <span class="rating-text theme-font text-white theme-yellow info">{{ number_format($averageRating, 1) }}</span>
                            <div class="star-rating d-inline-flex mx-2" title="">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $averageRating)
                                        <i class="fa fa-star text-yellow-400 info" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-star-o info" aria-hidden="true"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        
                        <br><br/>
                        
                    </div>
                    <p class="theme-font text-white  info">{{$reviewCount}} Reviews</p>
                    <p>{{$movie->discription}}</p>
                </div>
            </div>
            <div>
                <iframe class="mx-5 lg:w-[560px] lg:h-[315px] w-1/2 h-1/6"  src="{{$movie->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>

        <section class="container">
            <div class="flex w-full justify-between items-center container">
                <h2 class="text-indigo-500">Reviews</h2>
                <button onclick="openPopup()" class="rounded bg-red-600 px-2 py-1">Add Review</button>
            </div>
            <div class="container">
                <div id="reviewsSection ">
                    <!-- Loop through each review -->
                    @foreach($movie->reviews as $review)
                        <div class="review">
                            <p class="review-rating text-white"><span><i class="fa fa-star info text-yellow-500" aria-hidden="true"></i></span>{{ $review->rating }}/5</p>
                            <p class="review-text text-white">{{ $review->comment }}</p>
                            <!-- Display the user who made the review -->
                            <p class="review-user text-white">By: {{ $review->user ? $review->user->name : 'Unknown' }}</p>

                        </div>
                    @endforeach
                </div>
                
                <p></p>
      

            </div>
            @if (Auth::check())
                
            
            <div id="reviewPopup" class="review-popup">
                <form action="{{ route('movies.submit-review', ['id' => $movie->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                        <label for="comment">Your Review</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating (1-5)</label>
                        <input type="number" class="form-control" id="rating" name="rating" min="1" max="5">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
                
            </div>
            @else
            <h3 class=" absolute    z-50 ">User not found</h3>
            @endif
        </section>

    </div>
    <script>
        function openPopup() {
    document.getElementById("reviewPopup").style.display = "flex";
}

function closePopup() {
    document.getElementById("reviewPopup").style.display = "none";
}

function submitReview() {
    
    var review = document.getElementById("reviewTextarea").value;
    var rating = document.getElementById("ratingInput").value;
   

    // Here you can send the review and rating data to the server using AJAX
    // Example: You can use fetch or XMLHttpRequest to send data to your backend
    // After successful submission, you can close the pop-up and update the UI as needed

    closePopup(); // Close the pop-up after submission
}

    </script>
@endsection