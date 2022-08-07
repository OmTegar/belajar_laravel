{{-- @dd($post) --}}

@extends('layouts.utama')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="mt-5">{{ $post->title }}</h2>
            <p>By. <a href="/authors/{{ $post->user->username }}">{{ $post->user->name }}</a> in 
            <a class="text-decoration-none" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
            @if ($post->image)
                <div class="img-fluid mb-3 col-sm-5">
                    <img src="{{ asset('storage/'. $post->image) }}"
                    class="card-img-top rounded img-fluid mt-4" alt="...">
                </div>

                @else
                    
                <img src="https://source.unsplash.com/1080x400?{{ $post->category->name }}"
                    class="card-img-top rounded img-fluid mt-4" alt="...">
                @endif

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
            
            <a href="/postingan" class="d-block mt-3">Back to Post</a>
        </div>
    </div>
</div>



<article>
    
@endsection


