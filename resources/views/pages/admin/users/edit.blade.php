@extends('layouts.backend.index')

@section('title')
    Edit User
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4 p-2">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="avatar">Old avatar</label> <br>
                @if ($user->avatar)
                    <img src="{{ Storage::url($user->avatar) }}" alt="avatar">
                @else
                    Belum ada Avatar
                @endif
                <input name="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar">
                @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') ? old('email') : $user->email }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Fullname</label>
                <input name="name" type="fullname" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') ? old('name') : $user->name }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') ? old('username') : $user->username }}"">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-check">
                <input {{ $user->roles === 'admin' ? 'checked' : '' }} type="checkbox" class="form-check-input @error('roles') is-invalid @enderror" value="admin" name="roles">
                <label class="form-check-label">Admin</label> <br>
                <input {{ $user->roles === 'staff' ? 'checked' : '' }} type="checkbox" class="form-check-input @error('roles') is-invalid @enderror" value="staff" name="roles">
                <label class="form-check-label">Staff</label> <br>
                @error('roles')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-5">Submit</button>
        </form>
    </div>
</div>
@endsection