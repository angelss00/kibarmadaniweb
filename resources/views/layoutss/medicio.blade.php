<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title', 'LPK KIBAR MADANI')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('themes/Medicio/assets/img/favicon.jpg') }}" rel="icon">
    <link href="{{ asset('themes/Medicio/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Roboto:300,400,500,600,700|Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('themes/Medicio/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/Medicio/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/Medicio/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/Medicio/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/Medicio/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/Medicio/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/Medicio/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/Medicio/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Template Main CSS File -->
    <link href="{{ asset('themes/Medicio/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    {{-- Topbar --}}
    @include('partialss.topbar')

    {{-- Header --}}
    @include('partialss.header')

    {{-- Main Content --}}
    <main id="main">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partialss.footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('themes/Medicio/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('themes/Medicio/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('themes/Medicio/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/Medicio/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('themes/Medicio/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('themes/Medicio/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


    <!-- Template Main JS File -->
    <script src="{{ asset('themes/Medicio/assets/js/main.js') }}"></script>

</body>

</html>