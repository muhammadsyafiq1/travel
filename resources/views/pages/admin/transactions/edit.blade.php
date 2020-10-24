@extends('layouts.backend.index')

@section('title')
    Transaction
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4 p-2">
        <form action="{{ route('transactions.update',$transaction->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label for="travel_packages_id">Travel</label>
                    <select name="travel_packages_id" id="travel_packages_id" class="form-control">
                        @foreach ($travels as $travel)
                            <option value="{{ $travel->id }}" {{ $transaction->travel_packages_id == $travel->id ? 'selected' : '' }}>
                                {{ $travel->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('travel_packages_id')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12">
                    <label for="user_id">Customer</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $transaction->user_id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12">
                    <label for="transaction_status">Status</label>
                    <select name="transaction_status" id="transaction_status" class="form-control">
                        <option value="success" {{ $transaction->transaction_status == 'success' ? 'selected' : '' }} >Success</option>
                        <option value="failed" {{ $transaction->transaction_status == 'failed' ? 'selected' : '' }} >Failed</option>
                        <option value="pending" {{ $transaction->transaction_status == 'pending' ? 'selected' : '' }} >Pending</option>
                    </select>
                    @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-3 mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection