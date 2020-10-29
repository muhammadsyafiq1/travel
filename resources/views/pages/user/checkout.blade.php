@extends('layouts.frontend.checkouts.index')

@section('title')
    Checkout
@endsection

@section('content')
<section class="section-details-content">
    <div class="container">
        <div class="row">
            <div class="col p-0">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            Paket Travel
                        </li>
                        <li class="breadcrumb-item">
                            Details
                        </li>
                        <li class="breadcrumb-item active">
                            Checkout
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 pl-lg-0">
                <div class="card card-details">
                    <h1>Whats is going</h1>
                    <p>
                        {{ $transaction->travelpackage->title }}
                    </p>
                    <div class="attendee">
                        <table class="table table-responsive-sm text-center">
                            <thead>
                               <tr>
                                   <td>Picture</td>
                                   <td>Name</td>
                                   <td>Nationality</td>
                                   <td>Visa</td>
                                   <td>Passport</td>
                                   <td></td>
                               </tr> 
                            </thead>
                            <tbody>
                                @forelse ($transaction->transaction_detail as $detail)
                                <tr>
                                    <td>
                                        @if ($transaction->user->avatar)
                                            <img src="{{ Storage::url($transaction->user->avatar) }}" height="60px;">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ $detail->username }}" height="60" class="rounded-circle" />
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                         {{ $detail->username }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $detail->nationality }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $detail->is_visa === 1 ? '30 DAYS' : 'N/A' }}
                                    </td>
                                    <td class="align-middle">
                                        {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('checkout.delete',$detail->id) }}">
                                            <img src="/frontend/frontend/images/logos/ic_remove.png">
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                    <div class="col-12">
                                        <div class="alert alert-success">
                                            <h3>Anda belum memilih travel.</h3>
                                        </div>
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="member mt-3">
                        <h2>Add Member</h2>
                        <form class="form-inline" action="{{ route('checkout.create',$transaction->id) }}" method="POST">
                            @csrf
                            <label for="username" class="sr-only">Name</label>
                            <input 
                                type="text" 
                                class="form-control mb-2 mr-sm-2 @error('username') is-invalid @enderror"
                                id="username"
                                name="username"
                                placeholder="Username"
                                style="width: 160px;"
                            />
                            <label for="natioanlity" class="sr-only">Nat</label>
                            <input type="text" 
                                class="form-control mb-2 mr-sm-2 @error('nationality') is-invalid @enderror"
                                name="nationality"
                                style="width: 50px" 
                                id="natioanlity"
                                placeholder="NAT"
                            />
                            <label for="is_visa" class="sr-only">Visa</label> 
                            <select name="is_visa" id="is_visa" class="custom-select mb-2 mr-sm-2 @error('is_visa') is-invalid @enderror">
                                <option value="0" disabled="true" selected="true">Preference</option>
                                <option value="1">3O Days</option>
                                <option value="0">N/A</option>
                            </select>
                            <label for="doe_passport" class="sr-only">Passport</label>
                            <input 
                                type="date" 
                                class="form-control mb-2 mr-sm-2 @error('doe_passport') is-invalid @enderror"
                                id="doe_passport"
                                name="doe_passport"
                                placeholder="Doe passport"
                                style="width: 170px;"
                            />
                            <button type="submit" class="btn btn-add-now mb-2 px-4">
                                Add Now
                            </button>
                        </form>
                        <h3 class="mt-2 mb-0">Note</h3>
                        <p class="disclaimer mb-0">
                            You are only able to  invite member that has registered in Nomads
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-details card-right" style="border-radius: 0;">
                    <h2>Checkout information</h2>
                    <table class="trip-information">
                        <tr>
                            <th width="50%">Members</th>
                            <td width="50%" class="text-right">
                                {{ $transaction->transaction_detail->count() }} person
                            </td>
                        </tr>
                        <tr>
                            <th width="50%">Additional visa</th>
                            <td width="50%" class="text-right">
                                Rp. {{ number_format( $transaction->additional_visa == 1 ? '500000' : 0 ) }}
                            </td>
                        </tr>
                        <tr>
                            <th width="50%">Trip Price</th>
                            <td width="50%" class="text-right">
                                {{ $transaction->travelpackage->price }} / person
                            </td>
                        </tr>
                        <tr>
                            <th width="50%">Sub total</th>
                            <td width="50%" class="text-right text-total">
                                Rp.{{ number_format($transaction->transaction_total) }}
                            </td>
                        </tr>
                        <tr>
                            <th width="70%">Total (+ Uniqcode)</th>
                            <td width="30%" class="text-right text-toal">
                                <span class="text-blue">Rp.{{ number_format($transaction->transaction_total) }}.</span>
                                <span class="text-orange">{{ mt_rand(0,99) }}</span>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <h2>Payment Instruction</h2>
                    <p class="payment-instruction">
                        Please complete your payment before to continue the wonderfull trip.
                    </p>
                    <div class="bank">
                        <img src="/frontend/frontend/images/logos/ic_bank.png" alt="" class="bank-image">  
                        <div class="bank-item pb-3">
                            <div class="description">
                                <h3>PT Nomads ID</h3>
                                <P>
                                    0812 6831 2221
                                    <br>
                                    Bank Central Asia
                                </P>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <img src="/frontend/frontend/images/logos/ic_bank.png" alt="" class="bank-image">  
                        <div class="bank-item pb-3">
                            <div class="description">
                                <h3>PT Nomads ID</h3>
                                <P>
                                    0812 6831 2221
                                    <br>
                                    Bank Central Asia
                                </P>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="join-container">
                    <a href="{{ route('checkout.success',$transaction->id) }}" class="btn btn-block btn-join-now mt-3 py-2">
                        I have made payment
                    </a>
                </div>
                <div class="cancel-booking text-center mt-3 ">
                    <a href="{{ route('travel.detail',$transaction->travelpackage->slug) }}" class="text-muted">
                        Cancel Booking
                    </a> 
                </div>
            </div>
        </div>
    </div>
</section>
@endsection