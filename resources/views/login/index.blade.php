@extends('layouts.utama')

@section('container')
<div class="row justify-content-center">
  <div class="col-lg-4">

    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('loginError') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <main class="form-signin"> 
        <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
        <form action="/login" method="post">
          @csrf

          <div class="form-floating ">
            <input type="email" class="form-control @error('email') is-invalid mt-2 mb-4 @enderror" id="email" name="email" placeholder="email" required value="{{ old('email') }}" autofocus>
            <label for="email">Email address</label>
            @error('email')
              <div class="invalid-tooltip">
              {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" class="form-control rounded-bottom @error('password') is-invalid mt-2 mb-4 @enderror" id="password" name="password" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
              <div class="invalid-tooltip">
              {{ $message }}
              </div>
            @enderror
          </div>
      
          <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login now</button>
        </form>
    
        <p class="mt-2 d-block text-center">Not registered <a href="/register" class="text-decoration-none">register now</a></p>
    </main>
  </div>
</div>

@endsection