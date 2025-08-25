@extends('layoutss.medicio')

@section('title', 'LPK KIBAR MADANI')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <!-- Carousel Indicators -->
    <ol class="carousel-indicators" id="hero-carousel-indicators">
      @foreach ($infos as $index => $info)
      <li data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
      @endforeach
    </ol>

    <!-- Carousel Slides -->
    <div class="carousel-inner" role="listbox">
      @foreach ($infos as $index => $info)
      <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" style="background-image: url('{{ asset('storage/sliders/' . $info->gambar) }}');">
        <div class="container">
          <h2>{{ $info->judul }}</h2>
          <p>{{ $info->isi }}</p>
          <a href="{{ $info->link_url ?? '#' }}" class="btn-get-started scrollto">Read More</a>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Carousel Controls -->
    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>
  </div>
</section>

<main id="main">

  <!-- ======= Tentang Kami ======= -->
  <section id="about">
    <div class="mb-5 p-4 bg-white shadow-sm rounded">
      <h2 class="mb-3 border-bottom pb-2"><i class="bi bi-eye-fill me-2"></i>Visi</h2>
      <p class="lead" style="white-space: pre-line;">{{ strip_tags($visiMisi->visi ?? 'Belum ada data visi') }}</p>
    </div>

    <div class="mb-5 p-4 bg-white shadow-sm rounded">
      <h2 class="mb-3 border-bottom pb-2"><i class="bi bi-flag-fill me-2"></i>Misi</h2>
      <p class="lead" style="white-space: pre-line;">{{ strip_tags($visiMisi->misi ?? 'Belum ada data misi') }}</p>
    </div>

    <div class="mb-5 p-4 bg-white shadow-sm rounded">
      <h2 class="mb-3 border-bottom pb-2"><i class="bi bi-info-circle-fill me-2"></i>Makna Kibar Madani</h2>
      <p class="lead" style="white-space: pre-line;">{{ strip_tags($visiMisi->makna_kibar ?? 'Belum ada data makna') }}</p>
    </div>
  </section>

  <!-- ======= Berita ======= -->
  <section id="berita" class="my-5">
    <div class="container">
      <h2 class="text-center mb-4">Berita Terbaru</h2>
      <div class="row justify-content-center g-4">
        @forelse($berita as $item)
        <div class="col-md-4 col-sm-6 position-relative" data-aos="fade-up">
          <div class="card h-100 shadow-sm" style="min-height: 180px;">
            <img src="{{ asset('themes/minia/assets/images/logo.png') }}" alt="Logo"
              style="width: 40px; height: 40px; object-fit: contain; position: absolute; top: 12px; left: 12px; border-radius: 4px; box-shadow: 0 0 5px rgba(0,0,0,0.1); background: transparent;">
            <div class="card-body d-flex flex-column" style="padding-top: 60px;">
              <h5 class="card-title">{{ $item->judul }}</h5>
              <a href="{{ route('berita.frontend.show', $item->slug) }}" class="btn btn-sm btn-primary mt-auto align-self-start">Baca Selengkapnya</a>
            </div>
            <div class="card-footer text-muted small" style="font-size: 0.75rem;">
              {{ $item->created_at->format('d M Y') }}
            </div>
          </div>
        </div>
        @empty
        <p class="text-center">Belum ada berita.</p>
        @endforelse
      </div>
      <div class="text-center mt-4">
        <a href="{{ route('berita.frontend.index') }}" class="btn btn-outline-primary">Lihat Semua Berita</a>
      </div>
    </div>
  </section>

  <!-- ======= Testimonials ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Apa Kata Mereka?</h2>
        <p>Bagaimana pengalaman mereka? Simak testimoni dari pengguna yang sudah merasakan manfaat kami.</p>
      </div>
      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
          @foreach($testimonials as $testimonial)
          <div class="swiper-slide">
            <div class="testimonial-item">
              <p><i class="bx bxs-quote-alt-left quote-icon-left"></i> {{ $testimonial->testimony }} <i class="bx bxs-quote-alt-right quote-icon-right"></i></p>
              <h3>{{ $testimonial->name }}</h3>
            </div>
          </div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-navigation">
          <div class="swiper-button-prev"><i class="bx bx-chevron-left"></i></div>
          <div class="swiper-button-next"><i class="bx bx-chevron-right"></i></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= Layanan Kami ======= -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="fw-bold mb-4 text-primary">Layanan Kami</h2>
      <div class="row g-4 align-items-start">
        <div class="col-lg-6">
          <div class="accordion" id="layananAccordion">
            @forelse ($layanan as $idx => $item)
            @php
            $collapseId = 'layanan-'.$loop->index;
            $show = $idx === 0 ? 'show' : '';
            $collapsed = $idx === 0 ? '' : 'collapsed';
            @endphp
            <div class="accordion-item mb-2 border rounded-3 overflow-hidden">
              <h2 class="accordion-header">
                <button class="accordion-button {{ $collapsed }} py-3" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}" aria-expanded="{{ $idx===0 ? 'true':'false' }}" aria-controls="{{ $collapseId }}">
                  <span class="fw-semibold">{{ $item->title }}</span>
                </button>
              </h2>
              <div id="{{ $collapseId }}" class="accordion-collapse collapse {{ $show }}" data-bs-parent="#layananAccordion">
                <div class="accordion-body text-muted">{{ strip_tags($item->description) }}</div>
              </div>
            </div>
            @empty
            <div class="text-muted">Belum ada layanan.</div>
            @endforelse
          </div>
        </div>
        <div class="col-lg-6 text-center">
          <img src="{{ asset('themes/Medicio/assets/img/pelatihan.png') }}" alt="Pembicara" class="img-fluid" style="max-width: 100%; height: auto;">
        </div>
      </div>
    </div>
  </section>

  {{-- ===================== KEUNGGULAN KAMI ===================== --}}
  <section class="py-5">
    <div class="container">
      {{-- Heading --}}
      <div class="text-center mb-4">
        <h2 class="fw-bold">KEUNGGULAN KAMI</h2>
        <div class="small text-muted">Mengapa memilih Kibar Madani?</div>
      </div>

      {{-- Cards --}}
      @php
      // List icon sesuai urutan item
      $icons = [
      'fa-solid fa-user-tie', // item 1
      'fa-solid fa-book-open', // item 2
      'fa-solid fa-network-wired', // item 3
      'fa-solid fa-certificate', // item 4
      ];
      @endphp

      <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-4">
        @forelse ($keunggulan as $item)
        <div class="col">
          <div class="card h-100 border-0 shadow-sm rounded-4 text-center hover-shadow">
            <div class="card-body p-4 d-flex flex-column align-items-center">

              {{-- Icon manual berdasarkan index --}}
              <i class="{{ $icons[$loop->index] ?? 'fa-solid fa-circle-info' }} 
                        mb-3 fs-1 text-primary"></i>

              <h5 class="card-title fw-semibold mb-2">
                {{ $item->title }}
              </h5>
              <p class="card-text text-muted mb-0">
                {{ \Illuminate\Support\Str::limit(strip_tags($item->description), 140) }}
              </p>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted">
          Belum ada keunggulan.
        </div>
        @endforelse
      </div>
    </div>
  </section>


  <style>
    .hover-shadow:hover {
      box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .08) !important;
      transform: translateY(-2px);
      transition: .2s;
    }
  </style>


  <style>
    .hover-shadow:hover {
      box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .08) !important;
      transform: translateY(-2px);
      transition: .2s;
    }
  </style>


</main>

@endsection