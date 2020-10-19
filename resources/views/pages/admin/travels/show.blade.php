@extends('layouts.backend.index')

@section('title')
    Show user
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card shadow p-3">
            <div class="form-group">
                <label> Title: </label>
                <p>{{ $travel->title }}</p>
            </div>
            <div class="form-group">
                <label> Food: </label>
                <p>{{ $travel->food }}</p>
            </div>
            <div class="form-group">
                <label> Price: </label>
                <p>Rp.{{ number_format($travel->price) }}</p>
            </div>
            <div class="form-group">
                <label> About: </label>
                <p>{!! $travel->about !!}</p>
            </div>
            <div class="form-group">
                <label> Created at: </label>
                <p>{{ date('d-M-y',strtotime($travel->created_at)) }}</p>
            </div>
            <a href="{{ route('travels.index') }}" class="btn btn-warning btn sm" style="width: 100px;">
                <i class="fa fa-arrow-left"></i>
            </a>
        </div>
    </div>
@endsection