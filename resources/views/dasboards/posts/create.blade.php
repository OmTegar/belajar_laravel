@extends('dasboards.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
</div>

<div class="col-lg-10">
    <form method="post" action="/dasboards/posts">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title : </label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">URL Slug : </label>
          <input type="text" class="form-control" id="slug" name="slug">
        </div>
        <div class="mb-3">
          <label for="category_id" class="form-label">Category </label>
          <select class="form-select" name="category_id">
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>           
              @endforeach
          </select>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">body : </label>
            <input id="body" type="hidden" name="content">
            <trix-editor input="body"></trix-editor>
        </div>
        
        <button type="submit" class="btn btn-primary mb-5">Create New Post</button>
    </form>
</div>

<script>
    document.addEvenListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script>
@endsection