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
                        <strong>John Doe</strong>
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
                        @if (Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="{{route('movies.index')}}">Movies</a>                               
                        </li>
                        <li class="nav-item">
                            <a href="reviews.html">Reviews</a>                               
                        </li>
                        @endif
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
            Edit Movie
        </div>
        <div class="card-body">

           <form action="{{route('movies.update',$movie->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{$movie->title}}" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="" name="title" id="title" />
                @error('title')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
            </div>
            <div class="mb-3">
                <label for="director" class="form-label @error('director') is-invalid @enderror">Director</label>
                <input value="{{$movie->director}}" type="text" class="form-control" placeholder="director"  name="director" id="director"/>
                @error('director')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-3">
                <label for="trailer" class="form-label @error('trailer') is-invalid @enderror">trailer</label>
                <input value="{{$movie->trailer}}" type="text" class="form-control" placeholder="trailer"  name="trailer" id="trailer"/>
                @error('trailer')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-3">
                <label for="Director" class="form-label">Description</label>
                <textarea name="discription" id="discription" value="{{$movie->discription or old('discription')}}" class="form-control @error('discription') is-invalid @enderror" placeholder="Description" cols="30" rows="5"></textarea>
                @error('discription')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-3">
                <label for="Image" class="form-label @error('image') is-invalid @enderror">Image</label>
                <input type="file" class="form-control"  name="image" id="image"/>
                @error('image')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
                <br>
                @if (!empty($movie->image))
                <img src="{{asset('/uploads/movies/thumb/'.$movie->image)}}" alt="" class="w-25 h-25">
                
                    
                @endif
                {{-- @php
                    dd($movie->image)
                @endphp --}}
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="9">Block</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Update</button> 
        </form>                    
        </div>
    </div>                
</div>
</div>       
</div>
@endsection