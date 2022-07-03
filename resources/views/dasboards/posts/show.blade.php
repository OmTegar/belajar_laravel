@extends('dasboards.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-10 ">
            <h2 class="mb-3">{{ $post->title }}</h2>
            
            <a href="" class="btn btn-warning text-decoration-none"><span data-feather="edit" class="align-text-bottom mx-2"></span>Update</a>
            <a href="" class="btn btn-danger text-decoration-none"><span data-feather="trash-2" class="align-text-bottom mx-2"></span>Delete</a>
            
            <img src="https://source.unsplash.com/1080x400?{{ $post->category->name }}" class="card-img-top rounded img-fluid mt-4" alt="...">
            <article class="my-3 fs-5 mt-4">
                {!! $post->body !!}
            </article>
            
        </div>
    </div>
</div>



<article>
    
@endsection


