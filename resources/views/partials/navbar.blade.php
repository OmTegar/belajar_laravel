@php
use App\Models\post;
use views\postingan;
// use App\Http\Controllers\PostControler;


// $categories = App\Models\category::where('name')->where('slug')->get();
$categories = App\Models\category::get();
@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    {{-- css font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@500&display=swap" rel="stylesheet">

    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    {{-- my style css --}}
    <link rel="stylesheet" href="/css/style.css">

    <style>body {font-family: 'Mukta', sans-serif;}</style>
    <title>TAC || {{ $title }}</title>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">TAC</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link {{ ($title === "HOME") ? 'active' : ''  }}" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($title === "ABOUT") ? 'active' : ''  }}" href="/about">About</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link {{ ($title === "POST") ? 'active' : ''  }} " href="/postingan">Post</a>
              </li> --}}
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Blog
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                  <li><a class="dropdown-item {{ ($title === "BLOG") ? 'active' : ''  }} " href="/postingan">All post</a></li>
                  @foreach ($categories as $cateitem)
                  <li><a class="dropdown-item" href="/categories/{{ $cateitem->slug }}">{{ $cateitem->name }}</a></li>
                  @endforeach


                  {{-- <li><a class="dropdown-item" href="/categories/{{ $category->slug }}">{{ $category->name }}</a></li>
                  <li><a class="dropdown-item" href="/categories/personal">personal</a></li> --}}


                  {{-- <li><a class="dropdown-item" href="/categories/web-design">Web Design</a></li>
                  <li><a class="dropdown-item" href="/categories/program">programming</a></li>
                  <li><a class="dropdown-item" href="/categories/personal">personal</a></li> --}}

                </ul>
              </li> 
            </ul>

            <form class="d-flex" action="/postingan/">
              <input class="form-control me-2" type="text" placeholder="Search" name="search" >
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <ul class="navbar-nav">
              <li class="nav-item d-flex">
                <a class="nav-link {{ ($title === "LOGIN") ? 'active' : ''  }} me-2" aria-current="page" href="/login"><i class="bi bi-box-arrow-in-right me-1"></i>Login</a>
              </li>
            </ul>
            @php

            // Route::get('/postingan', [PostControler::class, 'index']);

              //  $query = post::latest();
    
              //   if(request('search')){
              //       $query->where('title','like','% '. request('search').'%')
              //       ->orWhere('body','like','% '. request('search').'%');
              //   }
                
            @endphp
          </div>
        </div>
      </nav>
</body>
</html>

