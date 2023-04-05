<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ asset('bootstrap5/css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap5/js/bootstrap.js') }}" crossorigin="anonymous"></script>
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('template/js/jquery.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('template/js/b-admin-2.min') }}" crossorigin="anonymous"></script>
</head>
<body>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="{{ asset('storage/logo/logo.png') }}"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form method="post" action="{{ route('post.login') }}">
        {{ csrf_field() }}
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="" name="email" class="form-control form-control-lg" />
            <label class="form-label" for="">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="" name="password" class="form-control form-control-lg" />
            <label class="form-label" for="">Password</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            <a href="#!">Forgot password?</a>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
        </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>