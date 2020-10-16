@extends('layouts.backend.index')

@section('title')
    Users
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if (session('info'))
                <div class="alert alert-success">
                    {{ session('info') }}
                </div>
            @endif
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus text-white"></i></a>
            </h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Date sign</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->name == 'admin')
                            <span class="badge badge-success">{{ $user->roles }}</span>
                        @else
                        <span class="badge badge-secondary">{{ $user->roles }}</span>
                        @endif
                    </td>
                    <td>{{ date('d-M-y',strtotime($user->created_at)) }}</td>
                    <td>TODO</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection