@extends('layouts.backend.auth')

@section('title')
    Login 
@endsection

@section('content')
<main class="login-container">
    <div class="container">
        <div class="row page-login d-flex align-items-center">
            <div class="section-left col-12 col-md-6" style="margin-bottom: 200px;">
                <h1 class="mb-4">We explorer teh new <br> life much better</h1>
                <img src="/frontend/frontend/images/logos/login.jpg" class="w-100 d-none d-sm-flex">
            </div>
            <div class="section-right col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="/frontend/frontend/images/logos/logo.png" alt="" class="mb-4 w-50">
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">Email Address</label>
                                <input 
                                    type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    id="username" 
                                    name="email"
                                />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input 
                                    type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    id="password"
                                    name="password"
                                />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group form-check">
                                <input 
                                    type="checkbox" 
                                    class="form-check-input" 
                                    id="checkbox"
                                    {{ old('remember') ? 'checked' : '' }}
                                />
                                <label for="checkbox" class="form-check-label" id="checkbox">
                                    Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-login btn-block">
                                Sign In
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            @if (Route::has('password.request'))
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            @endif
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('register') }}">Create an Account!</a>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
