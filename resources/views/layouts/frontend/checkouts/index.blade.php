<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('includes.frontend.styles')
</head>
<body>

    <!--navigasi checkout-->
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <div class="navbar-nav ml-auto mr-auto mr-sm-auto mr-lg-0 mr-md-auto">
                <a href="index.html" class="navbar-brand">
                    <img src="/frontend/frontend/images/logos/logo.png">
                </a>
            </div>
            <ul class="navbar-nav mr-auto d-none d-lg-block">
                <li>
                    <span class="text-muted">
                        | &nbsp; Beyond the explorer of the world
                    </span>
                </li>
            </ul>
        </nav>
    </div>

    <section class="section-details-header"></section>
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
                            Trip to ubud, Bali, indonesia
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
                                    <tr>
                                        <td>
                                            <img src="/frontend/frontend/images/logos/avatar-1.png" height="60">
                                        </td>
                                        <td class="align-middle">
                                             Angga Risky
                                        </td>
                                        <td class="align-middle">
                                            CN
                                        </td>
                                        <td class="align-middle">
                                            N/A
                                        </td>
                                        <td class="align-middle">
                                            Active
                                        </td>
                                        <td class="align-middle">
                                            <a href="#">
                                                <img src="/frontend/frontend/images/logos/ic_remove.png">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="member mt-3">
                            <h2>Add Member</h2>
                            <form class="form-inline">
                                <label for="username" class="sr-only">Name</label>
                                <input 
                                    type="text" 
                                    class="form-control mb-2 mr-sm-2"
                                    id="username"
                                    name="username"
                                    placeholder="Username"
                                />
                                <label for="visa" class="sr-only">Visa</label> 
                                <select name="visa" id="visa" class="custom-select mb-2 mr-sm-2">
                                    <option value="0" disabled="true" selected="true">Preference</option>
                                    <option value="30 Days">3O Days</option>
                                    <option value="N/A">N/A</option>
                                </select>
                                <label for="date" class="sr-only">Date</label>
                                <input 
                                    type="date" 
                                    class="form-control mb-2 mr-sm-2"
                                    id="date"
                                    name="date"
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
                                    2 person
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Additinal visa</th>
                                <td width="50%" class="text-right">
                                    $ 190.00
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Trip Price</th>
                                <td width="50%" class="text-right">
                                    $ 80,00 / person
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Sub total</th>
                                <td width="50%" class="text-right text-total">
                                    $ 280,00
                                </td>
                            </tr>
                            <tr>
                                <th width="70%">Total (+ Uniqcode)</th>
                                <td width="30%" class="text-right text-toal">
                                    <span class="text-blue">$ 279,</span>
                                    <span class="text-orange">33</span>
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
                        <a href="#" class="btn btn-block btn-join-now mt-3 py-2">
                            Join Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="section-footer mt-5 mb-4 border-top">
        <div class="container pt-5 pb-5">
            <div class="row jsutify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <h5>FEATURES</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Reviews</a></li>
                                <li><a href="#">Community</a></li>
                                <li><a href="#">Social media kit</a></li>
                                <li><a href="#">Affiliate</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>ACCOUNT</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Refund</a></li>
                                <li><a href="#">Security</a></li>
                                <li><a href="#">Reward</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>COMPANY</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Carrer</a></li>
                                <li><a href="#">Help center</a></li>
                                <li><a href="#">Meida</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>GET CONNECTED</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Riau bangkinang</a></li>
                                <li><a href="#">Indonesia</a></li>
                                <li><a href="#">081268312221</a></li>
                                <li><a href="#">syafiq@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row border-top justify-content-center 
                align-items-center pt-4">
                <div class="col-auto text-gray-500 
                    font-weight-light">
                    2020 Copyright Nomads - All rights reserved 
                    - Made in bangkinang
                </div>
            </div>
        </div>
    </footer>

    @include('includes.frontend.scripts')
</body>
</html>