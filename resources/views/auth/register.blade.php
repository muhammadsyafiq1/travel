@extends('layouts.backend.auth')

@section('title')
    Register
@endsection

@section('content')
<body class="bg-gradient-primary">

    <div class="container">
  
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form action="{{ route('register') }}" method="POST" class="user">
                    @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="exampleFirstName" placeholder="Fullname" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input name="email" type="text" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleLastName" placeholder="Email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" required autocomplete="new-password" placeholder="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Register Account
                </button>
                    <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                    <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
                <div class="text-center">
                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
  
    </div>
  
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
  
  </body>
@endsection
