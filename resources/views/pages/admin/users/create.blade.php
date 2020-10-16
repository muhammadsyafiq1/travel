@extends('layouts.backend.index')

@section('title')
    Create User
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4 p-2">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="avatar">Avatar</label> <br>
                    <input name="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar">
                    @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Fullname</label>
                    <input name="name" type="fullname" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter fullname">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Enter username">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input @error('roles') is-invalid @enderror" value="admin" name="roles">
                    <label class="form-check-label">Admin</label> <br>
                    <input type="checkbox" class="form-check-input @error('roles') is-invalid @enderror" value="staff" name="roles">
                    <label class="form-check-label">Staff</label> <br>
                    @error('roles')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection