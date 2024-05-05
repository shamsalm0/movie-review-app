@extends('layouts.masterlayout')
@section('content')
    


<div class="container">
    <div class="row my-5">
        <div class="col-md-3">
            <div class="card border-0 shadow-lg">
                <div class="card-header  text-white">
                    Welcome, {{Auth::user()->name}}                        
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img src="{{asset('uploads/profile/thumb/'.Auth::user()->image)}}" class="img-fluid rounded-circle" alt="Luna John">                            
                    </div>
                    <div class="h5 text-center">
                        <strong>{{Auth::user()->name}}</strong>
                        <p class="h6 mt-2 text-muted">5 Reviews</p>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow-lg mt-3">
                <div class="card-header  text-white">
                    Navigation
                </div>
                <div class="card-body sidebar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{route('movies.index')}}">movies</a>                               
                        </li>
                        <li class="nav-item">
                            <a href="reviews.html">Reviews</a>                               
                        </li>
                        <li class="nav-item">
                            <a href="profile.html">Profile</a>                               
                        </li>
                        <li class="nav-item">
                            <a href="my-reviews.html">My Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a href="change-password.html">Change Password</a>
                        </li> 
                        <li class="nav-item">
                            <a href="login.html">Logout</a>
                        </li>                           
                    </ul>
                </div>
            </div>                
        </div>
        <div class="col-md-9">
            
            <div class="card border-0 shadow">
                <div class="card-header  text-white">
                    movies
                </div>
                <div class="card-body pb-0">            
                    <div class="d-flex justify-content-between">
                        <div><a href="{{route('movies.create')}}" class="btn btn-primary ">Add Movies</a> </div>

                       <form action="" method="get">
                        <div class="d-flex  gap-1">
                            <input type="text" class="form-control" name="keyword" value="{{Request::get('keyword')}}" id="" placeholder="Search MovieBuzz">
                            <button class="rounded" type="submit">search</button>
                            <a href="{{route('movies.index')}}" class="btn btn-secondary ms-2">clear</a>
                        </div>
                       </form>
                    </div>           
                    <table class="table  table-striped mt-3">
                        <thead class="table-dark">
                            <tr>
                                <th>Title</th>
                                <th>Director</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th width="150">Action</th>
                            </tr>
                            <tbody>
                                @if ($movies->isNotEmpty())
                                    @foreach ($movies as $movie)
                                    <tr>
                                        <td>{{$movie->title}}</td>
                                        <td>{{$movie->director}}</td>
                                        <td>3.0 (3 Reviews)</td>
                                        <td>
                                            @if ($movie->status ==1)
                                            <span class="text-success">Active</span>
                                                @else
                                                <span class="text-danger">Block</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm"><i class="fa-regular fa-star"></i></a>
                                            <a href="edit-book.html" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>  
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5">
                                            <p>Books not found</p>
                                        </td>
                                    </tr>
                                @endif

                           
                            </tbody>
                        </thead>
                    </table>  
                    {{-- @php
                        $pagination=  $movies->links() ;
                        dd($pagination );
                    @endphp --}}
                       @if ($movies->isNotEmpty())
                       {{$movies->links()}}   
                       @endif
                    
                    
                   
                    {{-- <nav aria-label="Page navigation " >
                        <ul class="pagination">
                          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                      </nav>                   --}}
                </div>
                
            </div>                
        </div>
    </div>       
</div>

@endsection