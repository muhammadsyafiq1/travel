@extends('layouts.backend.index')

@section('title')
    Show user
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card shadow p-3">
            <strong>Avatar</strong>
            <img src="{{ Storage::url($user->avatar) }}" alt="avatar" style="width: 100px">
            <br>
            <div class="form-group">
                <label> Fullname: </label>
                <p>{{ $user->name }}</p>
            </div>
            <div class="form-group">
                <label> Email: </label>
                <p>{{ $user->email }}</p>
            </div>
            <div class="form-group">
                <label> Username: </label>
                <p>{{ $user->username }}</p>
            </div>
            <div class="form-group">
                <label> Roles: </label>
                <p>{{ $user->roles }}</p>
            </div>
            <div class="form-group">
                <label> Sign in: </label>
                <p>{{ $user->created_at }}</p>
            </div>
            <a href="{{ route('users.index') }}" class="btn btn-warning btn sm" style="width: 100px;">
                <i class="fa fa-arrow-left"></i>
            </a>
        </div>
    </div>
@endsection