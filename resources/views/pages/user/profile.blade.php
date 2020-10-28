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
                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') ? old('username') : $user->username }}">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nationality">nationality</label>
                <input name="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" id="nationality" value="{{ old('nationality') ? old('nationality') : $user->nationality }}">
                @error('nationality')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">phone</label>
                <input name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') ? old('phone') : $user->phone }}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="is_visa">Prefrence</label>
                <select name="is_visa" id="is_visa" class="form-control">
                    <option value="1" {{ $user->is_visa == 1 ? 'selected' : '' }}>30 DAYS</option>
                    <option value="0" {{ $user->is_visa == 0 ? 'selected' : '' }}>N/A</option>
                </select>
                @error('is_visa')
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

