<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success checkout</title>
    @include('includes.frontend.styles')
</head>
<body>

    <!--navigasi checkout-->
    @include('includes.backend.navbar-checkout')

    <main>
        <section class="section-success align-items-center">
            <div class="col text-center">
                <img src="/frontend/frontend/images/logos/ic_mail.png" alt="">
                <h1>Yay! Success</h1>
                <p>
                    We've sent you email for trip instruction
                    <br>
                    please read it as well
                </p>
                <a href="{{ route('home') }}" class="btn btn-home-page mt-3 px-5">
                    Home Page
                </a>
            </div>
        </section>
    </main>

    
@include('includes.frontend.scripts')
</body>
</html>