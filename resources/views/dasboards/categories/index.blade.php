@extends('dasboards.layouts.main')

@section('container')

@if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show mt-4 col-lg-6" role="alert">
        <strong>{{ session('success') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif

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
          <a href="/dasboards/categories/create" class="btn btn-primary mb-3">Create New Category</a>
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Category Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>
              <td>
                <a href="/dasboards/categories/{{ $category->slug }}" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>
                <a href="/dasboards/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
                <form action="/dasboards/categories/{{ $category->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Melanjutkan Menghapus data')">
                    <span data-feather="trash-2" class="align-text-bottom"></span>
                  </button>
                </form>
              </td>
            </tr>          
            @endforeach
          </tbody>
        </table>
      </div>
@endsection