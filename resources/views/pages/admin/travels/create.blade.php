@extends('layouts.backend.index')

@section('title')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4 p-2">
        <form action="{{ route('travels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12">
                    <label for="about">About</label>
                    <textarea name="about" id="editor"></textarea>
                </div>
                <div class="form-group col-4">
                    <label for="country">Country</label>
                    <input name="country" type="text" class="form-control @error('country') is-invalid @enderror" id="country" placeholder="Enter fullname">
                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="featured_event">featured_event</label>
                    <input name="featured_event" type="text" class="form-control @error('featured_event') is-invalid @enderror" id="featured_event" placeholder="Enter featured_event">
                    @error('featured_event')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="food">food</label>
                    <input name="food" type="text" class="form-control @error('food') is-invalid @enderror" id="food" placeholder="food">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="language">language</label>
                    <input name="language" type="text" class="form-control @error('language') is-invalid @enderror" id="language" placeholder="language">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="departure_date">departure_date</label>
                    <input name="departure_date" type="date" class="form-control @error('departure_date') is-invalid @enderror" id="departure_date" placeholder="departure_date">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="duration">duration</label>
                    <input name="duration" type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" placeholder="duration">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="type">type</label>
                    <input name="type" type="text" class="form-control @error('type') is-invalid @enderror" id="type" placeholder="type">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="price">price</label>
                    <input name="price" type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="price">
                    @error('password')
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