@extends('layouts.frontend.index')

@section('title')
    Detail travel
@endsection

@section('content')
<section class="section-details-header"></section>
<section class="section-details-content">
    <div class="container">
        <div class="row">
            <div class="col p-0">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-muted">Pjaket Travel</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Details
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        @if (session('info'))
                <div class="alert alert-danger">
                    {{ session('info') }} <a href="{{ route('profile') }}">Lengkapi disini.</a>
                </div>
        @endif
        <div class="row">
            <div class="col-lg-8 pl-lg-0">
                <div class="card card-details">
                    <h1>{{ $travel->title }}</h1>
                    <p>
                        {{ $travel->country }}
                    </p>
                    <!-- zoom -->
                    @if ($travel->gallery->count())
                    <div class="gallery">
                        <div class="xzoom-container">
                            <img src="{{ Storage::url($travel->gallery->first()->image) }}"
                                class="xzoom" 
                                id="xzoom-default"
                                xoriginal="{{ Storage::url($travel->gallery->first()->image) }}"
                            >
                        </div>
                        <!-- thumbails -->
                        <div class="xzoom-thumbs">
                            @foreach ($travel->gallery as $gallery)
                                <a href="{{ Storage::url($gallery->image) }}">
                                <img src="{{ Storage::url($gallery->image) }}" 
                                    class="xzoom-gallery" 
                                    width="128px;" 
                                    xpreview="{{ Storage::url($gallery->image) }}"">
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <h2 class="mt-3">Tentang wisata</h2>
                        <p>
                            {!! $travel->about !!}
                        </p>
                        <div class="features row">
                            <div class="col-md-4">
                                <img src="/frontend/frontend/images/logos/ic_event.png" 
                                    alt="featured" 
                                    class="features-image">
                                <div class="description">
                                    <h3>Featured Event</h3>
                                    <p>{{ $travel->featured_event }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <img src="/frontend/frontend/images/logos/ic_language.png" 
                                    alt="featured" 
                                    class="features-image">
                                <div class="description">
                                    <h3>Language</h3>
                                    <p>{{ $travel->language }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <img src="/frontend/frontend/images/logos/ic_foods.png" 
                                    alt="featured" 
                                    class="features-image">
                                <div class="description">
                                    <h3>Foods</h3>
                                    <p>{{ $travel->food }}</p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-details card-right" style="border-radius: 0;">
                    <h2>Members are going</h2>
                    <div class="members my-2">
                        <img src="/frontend/frontend/images/logos/member-1.png"class="member-image mr-1">
                        <img src="/frontend/frontend/images/logos/member-2.png"class="member-image mr-1">
                        <img src="/frontend/frontend/images/logos/member-3.png"class="member-image mr-1">
                        <img src="/frontend/frontend/images/logos/member-4.png"class="member-image mr-1">
                        <img src="/frontend/frontend/images/logos/member-5.png"class="member-image mr-1">
                    </div>
                    <hr>
                    <h2>Trip information</h2>
                    <table class="trip-information">
                        <tr>
                            <th width="50%">Date of Departure</th>
                            <td width="50%" class="text-right">
                                {{ \Carbon\Carbon::create($travel->date_departure)->format('F n, Y') }}
                            </td>
                        </tr>
                        <tr>
                            <th width="50%">Duration</th>
                            <td width="50%" class="text-right">
                                {{ $travel->duration }}
                            </td>
                        </tr>
                        <tr>
                            <th width="50%">Type</th>
                            <td width="50%" class="text-right">
                                {{ $travel->type }}
                            </td>
                        </tr>
                        <tr>
                            <th width="50%">Price</th>
                            <td width="50%" class="text-right">
                                {{ number_format($travel->price) }} / person
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="join-container">
                    @auth
                    <a href="{{ route('checkout.proccess',$travel->id) }}" class="btn btn-block btn-join-now mt-3 py-2">
                        Join Now
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
                        Login
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="/frontend/frontend/libraries/xzoom/xzoom.css">
@endpush

@push('scripts')
<script src="/frontend/frontend/libraries/xzoom/xzoom.min.js"></script>
<script>
    $(document).ready(function(){
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            xoffset: 15
        });
    });
</script>
@endpush