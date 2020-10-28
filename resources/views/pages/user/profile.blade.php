@extends('layouts.backend.index')

@section('title')
    Profile User
@endsection

@section('profile')
<div class="container-fluid">
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card shadow mb-4 p-2">
        <form action="{{ route('user.account-setting',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="avatar">Avatar</label> <br>
                @if ($user->avatar)
                    <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="avatar"> <br>
                @endif
                <small class="text-muted"><i>Kosongkan bila tak inghin merubah avatar</i></small>
                <input name="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar"">
                @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{ old('email') ? old('email') : $user->email }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Fullname</label>
                <input name="name" type="fullname" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter fullname" value="{{ old('name') ? old('name') : $user->name }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Enter username" value="{{ old('username') ? old('username') : $user->username }}">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-check">
                <input {{ $user->roles == 'customer' ? 'checked' : '' }} type="checkbox" disabled class="form-check-input @error('roles') is-invalid @enderror" value="customer" name="roles">
                <label class="form-check-label">customer</label> <br>
                @error('roles')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group mt-4">
                <button class="btn-block btn-sm btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

