<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

@include('includes.backend.styles')

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @if (Auth::user()->roles == 'admin' || Auth::user()->roles == 'staff')
      @include('includes.backend.sidebar')
    @else
      @include('includes.profile.sidebar')
    @endif
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @if (Auth::user()->roles == 'admin' || Auth::user()->roles == 'staff')
          @include('includes.backend.navbar')
        @else
          @include('includes.profile.navbar')
        @endif
          
        <!-- End of Topbar -->
        @if (Auth::user()->roles == 'admin' || Auth::user()->roles == 'staff')
          @yield('content')
        @else
          @yield('profile')
        @endif
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('includes.backend.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

@include('includes.backend.scripts')
@stack('scripts')

</body>

</html>
