@extends('dasboards.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard {{ auth()->user()->name }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      {{-- <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar" class="align-text-bottom"></span>
        This week
      </button> --}}
    </div>
</div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <a href="/dasboards/posts/create" class="btn btn-primary mb-3">Create New Post</a>
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
              <td>
                <a href="/dasboards/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>
                <a href="" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
                <a href="" class="badge bg-danger"><span data-feather="trash-2" class="align-text-bottom"></span></a>
              </td>
            </tr>          
            @endforeach
          </tbody>
        </table>
      </div>
@endsection