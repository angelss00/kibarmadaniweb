<!-- Favicons -->
<link href="{{ asset('themes/Medicio/assets/img/favicon.jpg') }}" rel="icon">
<link href="{{ asset('themes/Medicio/assets/img/apple-touch-icon.jpg') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('themes/Medicio/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
<link href="{{ asset('themes/Medicio/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('themes/Medicio/assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('themes/Medicio/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('themes/Medicio/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('themes/Medicio/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('themes/Medicio/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('themes/Medicio/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Main CSS -->
<link href="{{ asset('themes/Medicio/assets/css/style.css') }}" rel="stylesheet">


<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <a href="{{ url('/') }}" class="logo me-auto">
      <img src="{{ asset('themes/Medicio/assets/img/logo.png') }}" alt="">
    </a>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto" href="#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="#berita">Berita</a></li>
        <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>

        <li><a class="nav-link" href="{{ route('pelatihans.jadwal') }}" target="_self">Jadwal Pelatihan</a></li>
        <li><a class="nav-link" href="{{ route('galeri') }}" target="_self">Galeri</a></li>

        <li><a class="nav-link scrollto" href="{{ route('pendaftarans.create') }}">Pendaftaran</a></li>
        <li><a class="nav-link scrollto" href="#contact">Kontak Kami</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header>
<!-- End Header -->