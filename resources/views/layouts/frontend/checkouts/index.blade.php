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
    @include('includes.backend.navbar-checkout')

    <section class="section-details-header"></section>
    @yield('content')

    <!-- footer -->
    @include('includes.frontend.footer')

    @include('includes.frontend.scripts')
</body>
</html>