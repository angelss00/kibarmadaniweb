<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Galeri') - LPK Kibar Madani</title>

    <link href="{{ asset('themes/Medicio/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/Medicio/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('themes/Medicio/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/Medicio/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/Medicio/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
    @include('partialss.topbar')
    @include('partialss.header') {{-- kita akan buat ini juga --}}

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


</body>

</html>