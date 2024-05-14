@extends('layouts.masterlayout')
@section('style')
<link rel="stylesheet" href={{ asset('css/home.css') }}>
@endsection
@section('content')
<div class="container mt-3 pb-5">
    <div class="row justify-content-center d-flex mt-5">
        <div class="col-md-12">
           
            <div class="card shadow-lg  col-lg-12 col-md-12  border-0">
           
            </div>
            <div class="row mt-4">
               @foreach ($movies as $movie)
         
            <div class="col-md-4 col-lg-3 mb-4">
                <div class=" card-container  mx-auto m-lg-0 m-md-0">
                    @if ($movie->image != '')
                    
                        <div class="poster">
                            
                            <a href="{{route('movies.detail',$movie->id)}}"><img src="{{asset('/uploads/movies/thumb/'.$movie->image)}}" alt="" class="card-img-top w-full h-full" height="300" width="300" ></a>
                        </div>
                    
                    @else
                    <a href="detail.html"><img src="https://www.freeiconspng.com/img/23485" alt="" class="card-img-top " height="300" width="300" ></a>
                    @endif
                   <a href=""class='movie-link'>
                    <div class="card-body-container">
                        <a href="{{route('movies.detail',$movie->id)}}"><svg xmlns="http://www.w3.org/2000/svg"style="height: 30px !important; width: 50px !important;" viewBox="0 0 25 25"><path  style="fill:#babaca" d="m17.5 5.999-.707.707 5.293 5.293H1v1h21.086l-5.294 5.295.707.707L24 12.499l-6.5-6.5z" data-name="Right"/></svg></a>
                        <h3 class="h4 heading"><a href="{{route('movies.detail',$movie->id)}}">{{$movie->title}}</a></h3>
                        <p class="info">by {{$movie->director}}</p>
                        <div class="star-rating d-inline-flex ml-2" title="">
                          @php
                              $averageRating = round($movie->averageRating);
                              $reviewCount = round($movie->reviewCount)
                          @endphp
                             <span class="rating-text theme-font text-white theme-yellow info">{{ number_format($averageRating, 1) }}</span>
                             <div class="star-rating d-inline-flex mx-2">
                                @for ($j=1;$j<=5;$j++)
                                    @if($j <= $averageRating)
                                    <i class="fa fa-star text-yellow-400 info" aria-hidden="true"></i>
                                    @else
                                    <i class="fa fa-star-o info" aria-hidden="true"></i>
                                    @endif
                                @endfor
                             </div>
                            <br><br/>
                            
                        </div>
                        <p class="theme-font text-white  info">@if ($reviewCount)
                            {{$reviewCount}} Reviews
                            @else
                            <p></p>
                        @endif</p>
                    </div>
                </a>
                </div>
            </div>
        
               @endforeach
                {{$movies->links()}}
                {{-- <nav aria-label="Page navigation " >
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                  </nav>     --}}
                
            </div>
        </div>
    </div>
</div>    
@endsection