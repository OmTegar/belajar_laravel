@extends('dasboards.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-10 ">
                <h2 class="mb-3">{{ $post->title }}</h2>

                <a href="/dasboards/posts/{{ $post->slug }}/edit" class="btn btn-warning text-decoration-none"><span
                        data-feather="edit" class="align-text-bottom mx-2"></span>Update</a>
                <form action="/dasboards/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger border-0"
                        onclick="return confirm('Melanjutkan Menghapus data')">
                        <span data-feather="trash-2" class="align-text-bottom"></span>
                        Delete
                    </button>
                </form>

                @if ($post->image)
                <div style="max-height: 400px; overflow:hidden; ">
                    <img src="{{ asset('storage/'. $post->image) }}"
                    class="card-img-top rounded img-fluid mt-4" alt="...">
                </div>

                @else
                    
                <img src="https://source.unsplash.com/1080x400?{{ $post->category->name }}"
                    class="card-img-top rounded img-fluid mt-4" alt="...">
                @endif


                <article class="my-3 fs-5 mt-4">
                    {!! $post->body !!}
                </article>

            </div>
        </div>
    </div>



    <article>
    @endsection
