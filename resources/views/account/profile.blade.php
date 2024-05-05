@extends('layouts.masterlayout')
@section('content')
    <div class="container ">
        <div class="row my-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-lg">
                    <div class="card-header  text-white">
                        Welcome, {{$user->name}}                        
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                           @if (Auth::user()->image !='')
                           <img src="{{asset('uploads/profile/thumb/'.Auth::user()->image)}}" class="img-fluid rounded-circle" alt="">
                           @endif                            
                        </div>
                        <div class="h5 text-center">
                            <strong>{{$user->name}}</strong>
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
                                <a href="{{route('movies.index')}}">Books</a>                               
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
                                <a href="{{route('account.logout')}}">Logout</a>
                            </li>                           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

            @if (Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
        @endif
                <div class="card border-0 shadow">
                    <div class="card-header  text-white">
                        Profile
                    </div>
                    <div class="card-body">
                        <form action="{{route('account.updateProfile')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{$user->name}}</label>
                                <input type="text" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" id="" />
                                @error('name')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">{{$user->email}}</label>
                                <input type="text" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email"  name="email" id="email"/>
                                @error('email')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                                <img src="images/profile-img-1.jpg" class="img-fluid mt-4" alt="" >
                            </div>   
                            <button class="btn btn-primary mt-2">Update</button> 
                            </form>                    
                    </div>
                </div>                
            </div>
        </div>       
    </div>
@endsection