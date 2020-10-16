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
                    <input name="avatar" type="file" id="avatar">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="name">Fullname</label>
                    <input name="name" type="fullname" class="form-control" id="name" placeholder="Enter fullname">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="username" class="form-control" id="username" placeholder="Enter username">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="admin" name="roles">
                    <label class="form-check-label">Admin</label> <br>
                    <input type="checkbox" class="form-check-input" value="staff" name="roles">
                    <label class="form-check-label">Staff</label>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection