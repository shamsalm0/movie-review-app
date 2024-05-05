<div>
    
    <!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Movie Review App</title>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href={{ asset('css/style.css') }}>
    </head>
    <body class="bg-black">
        <div class="container-fluid shadow-lg  mt-4">
            <div class="container   header">
                <div class="d-flex justify-content-around align-items-center ">
                    
                    <a href="/" class="text-white text-decoration-none">Home</a>
                    <a href="#" class="text-white text-decoration-none">Movies</a>
                        <h1 class="text-center"><a href="index.html" class="h3 text-white text-decoration-none">MovieBuzz</a></h1>
                        @if (Auth::check())
                        <a href="{{route('account.profile')}}" class="text-white text-decoration-none">My Account</a>
                        <a href="#" class="text-white text-decoration-none">Contact</a>
                          @else
                          <a href='{{route('account.login')}}' class="text-white text-decoration-none">Login</a>
                          <a href="{{route('account.register')}}" class="text-white text-decoration-none ps-2">Register</a>
                        @endif
                        
                    
                </div>
            </div>
        </div>
        @yield('content')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
</div>
