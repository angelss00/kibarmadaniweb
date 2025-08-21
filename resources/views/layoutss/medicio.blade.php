<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')LPK Kibar Madani</title>

    <link href="{{ asset('themes/Medicio/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/Medicio/assets/img/favicon.jpg') }}" rel="icon">
    <link href="{{ asset('themes/Medicio/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/Medicio/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/Medicio/assets/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />


</head>

<body>
    @include('partialss.topbar')
    @include('partialss.header')

    <main id="main">
        @yield('content')
    </main>

    @include('partialss.footer')

    <!-- Vendor JS Files -->
    <script src="{{ asset('themes/Medicio/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/Medicio/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('themes/Medicio/assets/js/main.js') }}"></script>
    <script src="{{ asset('themes/Medicio/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            GLightbox({
                selector: '.glightbox'
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800, // durasi animasi 0.8 detik
            once: true, // animasi cuma sekali saat scroll masuk viewport
        });
    </script>



</body>

</html>