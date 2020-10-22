@extends('layouts.frontend.index')

@section('title')
    Travel Home
@endsection

@section('content')

{{-- header --}}
<header class="text-center">
    <h1>
        Eplorer The Beautiful World
        <br>
        As Easy one Click
    </h1>
    <p class="mt-3">
        You Will See Beautiful
        <br>
        Moment You Never See Before
    </p>
    <a href="#" class="btn btn-get-started px-4 mt-4">
        Get Started
    </a>
</header>

<main>
    <div class="container">
        <section class="section-stats row justify-content-center" 
            id="stats">
            <div class="col-3 col-md-2 stats-detail">
                <h2>{{ $customer }}</h2>
                <P>Members</P>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>3K</h2>
                <P>Hotels</P>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>{{ $country }}</h2>
                <P>Countries</P>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>72</h2>
                <P>Partners</P>
            </div>
        </section>
    </div>

    <!-- popular heading -->
    <section class="section-popular" id="popular">
        <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Wisata Popular</h2>
                    <p>
                        Something that you never try
                        <br>
                        before in this world
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- wisata popular -->
    <section class="section-popular-content" 
        id="popularContent">
        <div class="container">
            <div class="row justify-content-center section-popular-travel">
                @foreach ($travels as $travel)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-travel text-center d-flex flex-column"
                        style="background-image: url('{{ $travel->gallery->count() ? Storage::url($travel->gallery->first()->image) : ''}}');">
                        <div class="travel-country">{{ $travel->title }}</div>
                        <div class="travel-location">{{ $travel->country }}</div>
                        <div class="travel-button mt-auto">
                            <a href="#" class="btn btn-travel-details px-4">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- section networks -->
    <section class="section-networks">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Our Networks</h2>
                    <p>
                        Companies are trsuted us
                        <br>
                        more than just a trip
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img alt="partner" class="img-partner" 
                    src="/frontend/frontend/images/logos/partner.png">
                </div>
            </div>
        </div>
    </section>

    <!-- heading testimonial -->
    <section class="section-testimonial-heading" 
        id="testimonialHeading">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>They Are loving Us</h2>
                    <p>
                        Moements were giving them
                        <br>
                        the best expreience
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-testimonial-content" 
        id="testimonialContent">
        <div class="container">
            <div class="section-popular-travel row 
                justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="/frontend/frontend/images/logos/testimonial-1.png" 
                                alt="user" class="rounded-circle mb-4">
                            <h3 class="mb-4">Angga Risky</h3>
                            <p class="testimonial">
                                "it was glarious and i could
                                say wohooo for
                                every single moment dankeeee"
                            </p>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to ubud
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="/frontend/frontend/images/logos/testimonial-2.png" 
                                alt="user" class="rounded-circle mb-4">
                            <h3 class="mb-4">Shayna</h3>
                            <p class="testimonial">
                                "it was glarious and i could
                                say wohooo ""
                            </p>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to ubud
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="/frontend/frontend/images/logos/testimonial-3.png" 
                                alt="user" class="rounded-circle mb-4">
                            <h3 class="mb-4">Shabrina</h3>
                            <p class="testimonial">
                                "it was glarious and i could
                                say wohooo for
                                every single moment dankeeee"
                            </p>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to ubud
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-need-help 
                        px-4 mx-1 mt-4">
                        I need Help
                    </a>
                    <a href="#" class="btn btn-get-started
                        px-4 mx-1 mt-4">
                        Get started
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection