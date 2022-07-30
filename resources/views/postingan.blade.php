{{-- @dd($posts) --}}

@extends('layouts.utama')

@section('container')
    <h2 class="mb-3 text-center">Halaman Blog</h2>
    {{-- <ul>
            @foreach ($name_category as $name)
            <li><a href="/categories/{{ $name->slug }}">{{ $name->name }}</a></li>
            @endforeach
        </ul> --}}

    {{-- ini search bar --}}
    {{-- <div class="row justify-content-center mb-3">
          <div class="col-md-6">
            <form action="/postingan/">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="search post..." name="search">
                <button class="btn btn-dark" type="submit" >search</button>
              </div>
            </form>
          </div>
        </div> --}}


    @if ($posts->count())
        {{-- mini card only --}}
        <div class="row d-flex justify-content-around p-5">
            @foreach ($posts as $post)
                <div class="col-3 mt-2">
                    <div class="card ">
                        <div class="categories ">
                            <a href="/postingan?category={{ $post->category->slug }}"
                                class="text-decoration-none text-white position-absolute p-3 m-2 rounded "
                                style="background-color: rgba(0, 0, 0, 0.6)">{{ $post->category->name }}</a>
                        </div>
                        @if ($post->image)
                            <div style="max-height: 350px; overflow:hidden; ">
                                <img src="{{ asset('storage/' . $post->image) }}"
                                    class="card-img-top" alt="...">
                            </div>
                        @else
                            
                        <img src="https://source.unsplash.com/400x400?{{ $post->category->name }}" class="card-img-top"
                            alt="...">
                        @endif

                        <div class="card-body">
                            <a class="text-decoration-none text-dark" href="/posts/{{ $post->slug }}">
                                <h5 class="card-title">{{ $post->title }}</h5>
                            </a>
                            <small class="text-muted">
                                <p>By. <a href="/authors/{{ $post->user->username }}"
                                        class="text-decoration-none">{{ $post->user->name }} </a>
                                    {{ $post->created_at->diffForHumans() }}</p>
                            </small>
                            <p class="card-text ">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}"
                                class="text-decoration-none d-block text-center p-2 m-2 bg-primary text-white rounded">read
                                more....</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- ada 1 yang di atas --}}
        {{-- <div class="card mb-3 p-3" >

        <div class="categories ">
          <a href="/categories/{{ $posts[0]->category->slug }}"
            class="text-decoration-none text-white position-absolute p-3 m-2 rounded "
            style="background-color: rgba(0, 0, 0, 0.6)"
            >{{ $posts[0]->category->name }}</a>
        </div>

        <img src="https://source.unsplash.com/1080x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
        <div class="card-body text-center">
        <a class="text-decoration-none text-dark" href="/posts/{{ $posts[0]->slug }}"><h3 class="card-title">{{ $posts[0]->title }}</h3></a>
        <small class="text-muted">
          <p>By. <a href="/authors/{{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }} </a> 
          </p>
        </small>
        <p>{{ $posts[0]->created_at->diffForHumans() }}</p>
          <p class="card-text">{{ $posts[0]->excerpt }}</p>
          <p class="card-text"></p>
          <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none d-block text-center bg-primary pt-2 mt-2 text-white rounded "
            >read more....</a>
        </div>
      </div> --}}

        {{-- <div class="row d-flex justify-content-around p-5">
        @foreach ($posts->skip(1) as $post)
            <div class="col-3 mt-5">
                <div class="card ">
                  <div class="categories ">
                    <a href="/categories/{{ $post->category->slug }}"
                      class="text-decoration-none text-white position-absolute p-3 m-2 rounded "
                      style="background-color: rgba(0, 0, 0, 0.6)"
                      >{{ $post->category->name }}</a>
                  </div>
                <img src="https://source.unsplash.com/400x400?{{ $post->category->name }}" class="card-img-top" alt="...">
                <div class="card-body">
                <a class="text-decoration-none text-dark" href="/posts/{{ $post->slug }}"><h5 class="card-title">{{ $post->title }}</h5></a>
                <small class="text-muted">
                    <p>By. <a href="/authors/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }} </a>
                      {{ $post->created_at->diffForHumans() }}</p>
                </small>
                <p class="card-text ">{{ $post->excerpt }}</p>
                <a href="/posts/{{ $post->slug }}" 
                  class="text-decoration-none d-block text-center p-2 m-2 bg-primary text-white rounded"
                  >read more....</a>
                </div>
                </div>
            </div>
        @endforeach
    </div> --}}
    @else
        <h2 class="text-center fs-4">post not Found</h2>
    @endif
    {{-- <div class="row row-cols-4 row-cols-md-3 g-4">
    <div class="col">
      <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text">{{ $post->excerpt }}</p>
        </div>
      </div>
    </div>
</div> --}}

    {{-- <article class="mb-5"> --}}

    {{-- <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
            <h2>{{ $post->title }}</h2>
        </a>
        <p>By. <a href="/authors/{{ $post->user->username }}">{{ $post->user->name }}
        </a> in : <a class="text-decoration-none" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
        <h5>{{ $post->excerpt }}</h5>
        <a href="/posts/{{ $post->slug }}">read more....</a> --}}

    {{-- </article> --}}

    {{ $posts->links() }}
@endsection
