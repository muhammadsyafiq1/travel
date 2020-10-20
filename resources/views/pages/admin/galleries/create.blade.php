@extends('layouts.backend.index')

@section('title')
    Add images
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4 p-2">
        <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <select name="travel_packages_id" id="travel_packages_id" class="form-control">
                    <option class="text-muted" value="0" disabled selected>travel</option>
                    @foreach ($travels as $travel)
                        <option value="{{ $travel->id }}">
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
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>
@endsection