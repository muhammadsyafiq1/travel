<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- xzoom -->
    <link rel="stylesheet" href="/frontend/frontend/libraries/xzoom/xzoom.css">
    <!--Font awesome-->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;1,400;1,500&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <!--bootstrap-->
    <link rel="stylesheet" href="/frontend/frontend/libraries/bootstrap/css/bootstrap.css">
    <!--my css-->
    <link rel="stylesheet" href="/frontend/frontend/styles/main.css">
</head>
<body>

    @yield('content')

    <script src="/frontend/frontend/libraries/jquery//jquery-3.5.1.min.js"></script>
    <script src="/frontend/frontend/libraries/bootstrap/js/bootstrap.js"></script>
    <script src="/frontend/frontend/libraries/retina/retina.min.js"></script>
</body>
</html>
