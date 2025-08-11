<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard') | LPK KIBAR MADANI - Minimal Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('themes/minia/assets/images/favicon.icoo') }}">

    <!-- Plugin CSS -->
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('themes/minia/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('themes/minia/assets/css/preloader.min.css') }}" type="text/css" />
    <link href="{{ asset('themes/minia/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/minia/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/minia/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @stack('styles')
  </head>

  <body data-sidebar="light">
    <div id="layout-wrapper">
      @include('partials.header')
      @include('partials.sidebar')

      <div class="main-content">
        <div class="page-content">
          <div class="container-fluid">
            @yield('content')
          </div>
        </div>
      </div>

      @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('themes/minia/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/js/app.js') }}"></script>
    @stack('scripts')
  </body>
</html>