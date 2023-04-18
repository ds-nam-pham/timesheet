@extends('layouts.auth')
@section('content')
<section class="vh-100">
  <div class="container py-5 h-100">
    <h1 class="text-center">Forget Password</h1>
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="{{ asset('storage/logo/logo.png') }}"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form method="post" action="{{ route('new.password') }}">
        {{ csrf_field() }}
          <div class="form-outline mb-4">
            <input type="text" id="" name="otp" class="form-control form-control-lg" />
            <label class="form-label" for="">Otp</label>
          </div>
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection