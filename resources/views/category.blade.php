{{-- @dd($posts) --}}

@extends('layouts.utama')

@section('container')
    <h2 class="mb-3">Halaman post category : {{ $category }}</h2>
    @if ($post->count())
        <div class="row d-flex justify-content-around p-5">
            @foreach ($post as $post)
                <div class="col-3 mt-5">
                    <div class="card ">
                        <div class="categories ">
                            <a href="/categories/{{ $post->category->slug }}"
                                class="text-decoration-none text-white position-absolute p-3 m-2 rounded "
                                style="background-color: rgba(0, 0, 0, 0.6)">{{ $post->category->name }}</a>
                        </div>
                        @if ($post->image)
                            <div style="max-height: 350px; overflow:hidden; ">
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="...">
                            </div>
                        @else
                            <img src="https://source.unsplash.com/400x400?{{ $post->category->name }}"
                                class="card-img-top" alt="...">
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
    @else
        <h2 class="text-center fs-4">post not Found</h2>
    @endif




@endsection
{{-- @foreach ($post as $post)
    <article class="mb-5">
        
        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
            <h2>{{ $post->title }}</h2>
        </a>
            <p>By. <a href="/authors/{{ $post->user->username }}">{{ $post->user->name }}</a> in 
                <a class="text-decoration-none" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
        
        <h5>{{ $post->excerpt }}</h5>
        <a href="/posts/{{ $post->slug }}">read more....</a>

        
        
    </article>
    
@endforeach
<a href="/postingan">Back to Post</a> --}}
