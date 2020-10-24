@extends('layouts.backend.index')

@section('title')
    Transaction show
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow p-3">
        <div class="form-group">
            <label>Customer: </label>
            <p>{{ $transaction->user->name }}</p>
        </div>
        <div class="form-group">
            <label> Travel: </label>
            <p>
                <span class="badge badge-success">{{ $transaction->travelpackage->title }}</span>
            </p>
        </div>
        <div class="form-group">
            <label> Transaction status: </label>
            <p>{{ $transaction->transaction_status }}</p>
        </div>
        <div class="form-group">
            <label> Transaction status: </label>
            <p>{{ \Carbon\Carbon::create($transaction->created_at)->format('F n, Y') }}</p>
        </div>
        <a href="{{ route('transactions.index') }}" class="btn btn-warning btn sm" style="width: 100px;">
            <i class="fa fa-arrow-left"></i>
        </a>
    </div>
</div>
@endsection