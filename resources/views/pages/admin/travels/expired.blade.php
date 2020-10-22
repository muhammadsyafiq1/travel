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
            <div class="button-expired">
                <h6 class="m-0 font-weight-bold text-secondary">
                    <a href="{{ route('travels.index') }}"><i class="fa fa-arrow-left text-secondary"></i></a>
                </h6>
                <h6 class="m-0 font-weight-bold text-primary text-right">
                    <a href="{{ route('travel.restoreall') }}" class="btn btn-success btn-sm">Restore all</a>
                    <a href="{{ route('travel.permanentall') }}" class="btn btn-danger btn-sm">Delete all</a>
                </h6>
            </div>
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