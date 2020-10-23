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
                            <a href="{{ route('home') }}" class="text-muted">Paket Travel</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Details
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 pl-lg-0">
                <div class="card card-details">
                    <h1>{{ $travel->title }}</h1>
                    <p>
                        {{ $travel->country }}
                    </p>
                    <!-- zoom -->
                    <div class="gallery">
                        <div class="xzoom-container">
                            <img src="/frontend/frontend/images/logos/details.jpg" 
                                class="xzoom" 
                                id="xzoom-default" 
                                xoriginal="/frontend/frontend/images/logos/details.jpg">
                        </div>
                        <!-- thumbails -->
                        <div class="xzoom-thumbs">
                            <a href="/frontend/frontend/images/logos/details.jpg">
                            <img src="/frontend/frontend/images/logos/details.jpg" 
                                class="xzoom-gallery" 
                                width="128" 
                                xpreview="/frontend/frontend/images/logos/details.jpg"">
                            </a>
                            <a href="/frontend/frontend/images/logos/details.jpg">
                            <img src="/frontend/frontend/images/logos/details.jpg" 
                                class="xzoom-gallery" 
                                width="128" 
                                xpreview="/frontend/frontend/images/logos/details.jpg"">
                            </a>
                            <a href="/frontend/frontend/images/logos/details.jpg">
                            <img src="/frontend/frontend/images/logos/details.jpg" 
                                class="xzoom-gallery" 
                                width="128" 
                                xpreview="/frontend/frontend/images/logos/details.jpg"">
                            </a>
                            <a href="/frontend/frontend/images/logos/details.jpg">
                            <img src="/frontend/frontend/images/logos/details.jpg" 
                                class="xzoom-gallery" 
                                width="128" 
                                xpreview="/frontend/frontend/images/logos/details.jpg"">
                            </a>
                            <a href="/frontend/frontend/images/logos/details.jpg">
                            <img src="/frontend/frontend/images/logos/details.jpg" 
                                class="xzoom-gallery" 
                                width="128" 
                                xpreview="/frontend/frontend/images/logos/details.jpg"">
                            </a>
                        </div>
                    </div>
                    <h2 class="mt-3">Tentang wisata</h2>
                        <p>
                            {{ $travel->about }}
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
                    <a href="#" class="btn btn-block btn-join-now mt-3 py-2">
                        Join Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection