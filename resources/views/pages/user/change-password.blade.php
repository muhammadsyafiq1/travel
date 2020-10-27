@extends('layouts.backend.index')

@section('title')
    Profile User
@endsection

@section('profile')
<div class="container-fluid">
    <div class="card shadow mb-4 p-2">
        <form action="{{ route('user.update-password',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="password">Current Password</label>
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm">Password Confirm</label>
                <input name="password_confirmation" type="password" class="form-control @error('password-confirm') is-invalid @enderror" id="password-confirm" required autocomplete="new-password">
                @error('password-confirm')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-4">Update</button>
        </form>
    </div>
</div>
@endsection

