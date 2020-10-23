@extends('layouts.frontend.index')

@section('title')
    Semua Travel
@endsection

@section('content')
<section class="section-details-header"></section>
    <main style="margin-top: -250px;">
        <section class="section-popular-content"id="popularContent" style="margin-top: 80px">
        <div class="container">
            <form class="form-inline my-2 my-lg-0" action="{{ route('travel.lengkap') }}">
                <input class="form-control mr-sm-2" type="search" placeholder="Search by Country" aria-label="Search" name="keyword" value="{{ Request::get('keyword') }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="row justify-content-center section-popular-travel mt-3">
                @forelse ($travels as $travel)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-travel text-center d-flex flex-column"
                        style="background-image: url('{{ $travel->gallery->count() ? Storage::url($travel->gallery->first()->image) : ''}}');">
                        <div class="travel-country">{{ $travel->title }}</div>
                        <div class="travel-location">{{ $travel->country }}</div>
                        <div class="travel-button mt-auto">
                            <a href="{{ route('travel.detail',$travel->slug) }}" class="btn btn-travel-details px-4">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-success">
                            <h6>Ooopss Yang Kamu Cari Belum Tesedia ...</h6>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        {{ $travels->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection