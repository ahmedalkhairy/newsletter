<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ route('register') }}" method="POST">
	     @csrf
        <div class="input-group mb-3">
		
		  @php
            $input = "name";
            @endphp
          <input type="text" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" placeholder="name" value="{{ old('$input') }}" required autocomplete="name" autofocus>
		   @error($input)
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                    </span>
                   @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		
		
		<div class="input-group mb-3">
		
		  @php
            $input = "last_name";
            @endphp
         <input type="text" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" placeholder="last name" value="{{ old('$input') }}" required autocomplete="name" autofocus>
		   @error($input)
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                    </span>
                   @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		
		<div class="input-group mb-3">
		
		  @php
            $input = "dob";
            @endphp
         <input type="date" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" placeholder="dob" value="{{ old('$input') }}" required autocomplete="name" autofocus>
		   @error($input)
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                    </span>
                   @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		
        <div class="input-group mb-3">
		
		  @php
            $input = "email";
            @endphp
           <input type="email" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" placeholder="email" value="{{ old('$input') }}" required autocomplete="name" autofocus>
		   @error($input)
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                    </span>
                   @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
		
        <div class="input-group mb-3">
		  @php
            $input = "password";
            @endphp
          <input type="password" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" placeholder="password" value="{{ old('$input') }}" required autocomplete="name" autofocus>
		   @error($input)
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                    </span>
                   @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="login.html" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>