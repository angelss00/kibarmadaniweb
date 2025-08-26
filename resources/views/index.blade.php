@extends('layoutss.medicio')

@section('title', 'LPK KIBAR MADANI')

@section('content')

@php
// Pastikan semua variabel ada
$berita = $berita ?? collect();
$visiMisi = $visiMisi ?? null;
$keunggulan = $keunggulan ?? collect();
$layanan = $layanan ?? collect();
$testimonials = $testimonials ?? collect();
$infos = $infos ?? collect();
@endphp

<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <!-- Carousel Indicators -->
    <ol class="carousel-indicators">
      @for ($i = 0; $i < min($infos->count(), 3); $i++)
        <li data-bs-target="#heroCarousel" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
        @endfor
    </ol>

    <!-- Carousel Slides -->
    <div class="carousel-inner">
      @foreach ($infos->take(3) as $index => $info)
      <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" style="background-image: url('{{ asset("storage/$info->gambar") }}');">
        <div class="container">
          <h2>{{ $info->judul }}</h2>
          <p>{!! $info->isi !!}</p>
          <a href="{{ $info->link_url ?? '#hero' }}" class="btn-get-started scrollto">Read More</a>
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



  <section id="pelatihans" class="my-5">
    <div class="container">
      <div class="section-title text-center mb-4">
        <h2>Jadwal Pelatihan Terbaru</h2>
        <p>Ikuti pelatihan kami untuk meningkatkan keterampilan Anda</p>
      </div>
      {{-- Tombol Lihat Semua --}}
      @if($pelatihans->count())
      <div class="text-center mb-4">
        <a href="{{ route('pelatihans.jadwal') }}" class="btn btn-outline-primary btn-lg">Lihat Semua Jadwal</a>
      </div>
      @endif
      <div class="row justify-content-center g-4">
        @forelse($pelatihans as $p)
        <div class="col-md-4 col-sm-6">
          <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
            @if($p->gambar)
            <img src="{{ asset('storage/' . $p->gambar) }}" class="card-img-top" alt="{{ $p->nama_pelatihan }}" style="height: 180px; object-fit: cover;">
            @else
            <img src="{{ asset('themes/medicio/assets/img/pelatihan/default.jpg') }}" class="card-img-top" alt="{{ $p->nama_pelatihan }}" style="height: 180px; object-fit: cover;">
            @endif
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{ $p->nama_pelatihan }}</h5>
              <p class="mb-1"><i class="bx bx-calendar"></i> {{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}</p>
              @if($p->lokasi)
              <p class="mb-0"><i class="bx bx-map"></i> {{ $p->lokasi }}</p>
              @endif
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center">
          <p>Belum ada jadwal pelatihan.</p>
        </div>
        @endforelse
      </div>


    </div>
  </section>



  <!-- Berita Terbaru -->
  <section id="berita" class="my-5">
    <div class="container">
      <div class="section-title text-center mb-4">
        <h2>Berita Terbaru</h2>
        <p>Update informasi dan kegiatan terbaru dari kami</p>
      </div>

      {{-- Tombol Lihat Semua --}}
      <div class="text-center mb-4">
        <a href="{{ route('berita.frontend.index') }}" class="btn btn-outline-primary btn-lg">Lihat Semua Berita</a>
      </div>

      <div class="row justify-content-center g-4">
        @forelse($berita as $b)
        <div class="col-md-4 col-sm-6 position-relative">
          <div class="card h-100 shadow-sm rounded-4" style="min-height: 200px; overflow: hidden;">
            {{-- Logo --}}
            <img src="{{ asset('themes/minia/assets/images/logo.png') }}" alt="Logo"
              style="width: 40px; height: 40px; object-fit: contain; position: absolute; top: 12px; left: 12px; border-radius: 4px; box-shadow: 0 0 5px rgba(0,0,0,0.1); background: transparent;">

            <div class="card-body d-flex flex-column" style="padding-top: 60px;">
              <h5 class="card-title">{{ $b->judul }}</h5>
              <p class="text-truncate">{{ Str::limit($b->isi, 100) }}</p>
              <a href="{{ route('berita.frontend.show', $b->slug) }}" class="btn btn-sm btn-primary mt-auto align-self-start">Baca Selengkapnya</a>
            </div>

            <div class="card-footer text-muted small" style="font-size: 0.75rem;">
              {{ $b->created_at->format('d M Y') }}
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center">
          <p>Belum ada berita.</p>
        </div>
        @endforelse
      </div>
    </div>
  </section>


  <!-- ======= Testimonials ======= -->
  <section id="testimonials" class="testimonials section-bg py-5">
    <div class="container">

      <div class="section-title text-center mb-5">
        <h2>Testimonials</h2>
        <p>Apa Kata Mereka?</p>
      </div>

      @if($testimonials->isNotEmpty())
      <div class="testimonials-slider swiper">
        <div class="swiper-wrapper">
          @foreach($testimonials as $testimonial)
          <div class="swiper-slide">
            <div class="testimonial-item text-center p-4 shadow-sm rounded-4 bg-white">
              <p class="mb-3">
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                {{ $testimonial->testimony }}
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <h3 class="text-center">{{ $testimonial->name }}</h3>
            </div>
          </div>
          @endforeach
        </div>
        <div class="swiper-pagination mt-4"></div>
      </div>
      @else
      <p class="text-center text-muted">Belum ada testimoni.</p>
      @endif

    </div>
  </section>


  <!-- ======= Layanan Kami ======= -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="fw-bold mb-4 text-primary">Layanan Kami</h2>
      <div class="row g-4 align-items-start">
        <div class="col-lg-6">
          <div class="accordion" id="layananAccordion">
            @if($layanan->count())
            @foreach ($layanan as $idx => $item)
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
            @endforeach
            @else
            <div class="text-muted">Belum ada layanan.</div>
            @endif
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
      <div class="text-center mb-4">
        <h2 class="fw-bold">KEUNGGULAN KAMI</h2>
        <div class="small text-muted">Mengapa memilih Kibar Madani?</div>
      </div>

      @php
      $icons = [
      'fa-solid fa-user-tie',
      'fa-solid fa-book-open',
      'fa-solid fa-network-wired',
      'fa-solid fa-certificate',
      ];
      @endphp

      <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-4">
        @if($keunggulan->count())
        @foreach ($keunggulan as $item)
        <div class="col">
          <div class="card h-100 border-0 shadow-sm rounded-4 text-center hover-shadow">
            <div class="card-body p-4 d-flex flex-column align-items-center">
              <i class="{{ $icons[$loop->index] ?? 'fa-solid fa-circle-info' }} mb-3 fs-1 text-primary"></i>
              <h5 class="card-title fw-semibold mb-2">{{ $item->title }}</h5>
              <p class="card-text text-muted mb-0">{{ \Illuminate\Support\Str::limit(strip_tags($item->description), 140) }}</p>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <div class="col-12 text-center text-muted">Belum ada keunggulan.</div>
        @endif
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

</main>

@endsection