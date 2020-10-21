@extends('layouts.backend.index')

@section('title')
    Gallery
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
                <a href="{{ route('galleries.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus text-white"></i></a>
            </h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Travel</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection
