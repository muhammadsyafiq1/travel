@extends('layouts.backend.index')

@section('title')
    Travel menu
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
                <a href="{{ route('travels.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus text-white"></i></a>
            </h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Travel</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($travels as $travel)
                <tr>
                    <td>
                        <span class="badge badge-success" style="font-size: 14px">
                            {{ $travel->title }}
                        </span>
                    </td>
                    <td>{{ $travel->type }}</td>
                    <td>Rp. {{ number_format($travel->price) }}</td>
                    <td>
                        <form action="{{ route('travels.destroy',$travel->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                            <a href="{{ route('travels.show',$travel->id) }}" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('travels.edit',$travel->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure ?')">
                                <i class="fa fa-trash"></i>
                            </button>
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