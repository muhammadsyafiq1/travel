@extends('layouts.backend.index')

@section('title')
    
@endsection

@section('profile')
<div class="container-fluid">
    @if (session('info'))
        <div class="alert alert-primary">
            {{ session('info') }}
        </div>
    @endif
    <div class="card shadow mb-4 p-2">
        <form action="{{ route('user.post-testimonial',$testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label for="user_id">Customer</label>
                    <input disabled name="user_id" type="text" class="form-control" value="{{ $testimonial->user->username }}">
                </div>
                <div class="form-group col-12">
                    <label for="travel_packages_id">Travel</label>
                    <input disabled name="travel_packages_id" type="text" class="form-control" value="{{ $testimonial->travelpackage->title }}">
                </div>
                <div class="form-group col-12">
                    <label for="content">Testimonial</label>
                    <textarea name="content" id="editor">{{ $testimonial->content }}</textarea>
                </div>
                <div class="form-group col-12 mt-4">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection