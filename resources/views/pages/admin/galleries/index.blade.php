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
                @foreach ($galleries as $gallery)
                <tr>
                    <td>{{ $gallery->TravelPackage->title }}</td>
                    <td>
                        <img src="{{ Storage::url($gallery->image) }}" alt="image" style="width: 80px">
                    </td>
                    <td>
                        <form action="{{ route('galleries.destroy',$gallery->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure ?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection