@extends('layouts.masterlayout')
@section('content')
<div class="container mt-3 pb-5">
    <div class="row justify-content-center d-flex mt-5">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3">Movies</h2>
                <div class="mt-2">
                    <a href="{{route('home')}}" class="text-dark">Clear</a>
                </div>
            </div>
            <div class="card shadow-lg border-0">
              <form action="" method="get">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-11 col-md-11 h-50">
                            <input type="text" name="keyword"  class="form-control " placeholder="{{Request::get('keyword')}}">
                        </div>
                        <div class="col-lg-1 col-md-1">
                            <button class="btn btn-primary btn-lg w-100"><i class="fa-solid fa-magnifying-glass"></i></button>                                                                    
                        </div>                                                                                 
                    </div>
                </div>
              </form>
            </div>
            <div class="row mt-4">
               @foreach ($movies as $movie)
               <div class="col-md-4 col-lg-3 mb-4">
                <div class="card border-0 shadow-lg">
                    @if ($movie->image != '')
                    <a href="detail.html"><img src="{{asset('/uploads/movies/thumb/'.$movie->image)}}" alt="" class="card-img-top " height="200" width="200" ></a>
                    @else
                    <a href="detail.html"><img src="https://www.freeiconspng.com/img/23485" alt="" class="card-img-top " height="200" width="200" ></a>
                    @endif
                    <div class="card-body">
                        <h3 class="h4 heading"><a href="#">{{$movie->title}}</a></h3>
                        <p>by {{$movie->director}}</p>
                        <div class="star-rating d-inline-flex ml-2" title="">
                            <span class="rating-text theme-font theme-yellow">5.0</span>
                            <div class="star-rating d-inline-flex mx-2" title="">
                                <div class="back-stars ">
                                    <i class="fa fa-star " aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <div class="front-stars" style="width: 100%">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="theme-font text-muted">(2 Reviews)</span>
                        </div>
                    </div>
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