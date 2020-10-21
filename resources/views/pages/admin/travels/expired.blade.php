@extends('layouts.backend.index')

@section('title')
    Expired travel
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
            <table id="crudtable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Travel</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Actions</th>
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

@push('scripts')
    <script>
        var datatable = $("#crudtable").DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                ulr: '{!! url()->current() !!}'
            },
            columns: [
                {data: 'title', name: 'title'},
                {data: 'type', name: 'type'},
                {data: 'price', name: 'price'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%',
                },
            ],
        })
    </script>
@endpush