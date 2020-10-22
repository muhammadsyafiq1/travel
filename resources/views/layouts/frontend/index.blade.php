<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!--Font awesome-->
    @include('includes.frontend.styles')
</head>
<body>

    <!--navigasi-->
    @include('includes.frontend.navbar')

    <!-- content -->
    @yield('content')

    <!-- footer -->
    @include('includes.frontend.footer')

    <!--scripts-->
    @include('includes.frontend.scripts')
</body>
</html>