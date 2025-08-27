@extends('layoutss.medicio')

@section('title', 'LPK KIBAR MADANI')

@section('content')

@php
$berita = $berita ?? collect();
$visiMisi = $visiMisi ?? null;
$keunggulan = $keunggulan ?? collect();
$layanan = $layanan ?? collect();
$testimonials = $testimonials ?? collect();
$infos = $infos ?? collect();
@endphp

<!-- ======= Hero ======= -->
<section id="hero" data-aos="fade">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

    {{-- Indicators --}}
    <div class="carousel-indicators">
      @foreach($infos->take(3) as $i => $info)
      <button type="button"
        data-bs-target="#heroCarousel"
        data-bs-slide-to="{{ $i }}"
        @class(['active'=> $i === 0])
        aria-label="Slide {{ $i+1 }}"></button>
      @endforeach
    </div>

    {{-- Slides --}}
    <div class="carousel-inner">
      @foreach($infos->take(3) as $i => $info)
      <div class="carousel-item {{ $i === 0 ? 'active' : '' }}"
        style="background-image: url('{{ asset("storage/$info->gambar") }}')">
        <div class="container">
          <h2>{{ $info->judul }}</h2>
          <p>{!! $info->isi !!}</p>
          <a href="{{ $info->link_url ?? '#hero' }}" class="btn-get-started scrollto">Read More</a>
        </div>
      </div>
      @endforeach
    </div>

    {{-- Controls --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right"></span>
    </button>
  </div>
</section>

<main id="main">

  {{-- ===== Jadwal Pelatihan ===== --}}
  <section id="pelatihans" data-aos="fade-up">
    <div class="container">
      <div class="section-title text-center">
        <h2>Jadwal Pelatihan Terbaru</h2>
        <p>Ikuti pelatihan kami untuk meningkatkan keterampilan Anda</p>
      </div>

      @if($pelatihans->count())
      <div class="text-center mb-4">
        <a href="{{ route('pelatihans.jadwal') }}" class="btn btn-outline-primary btn-lg">Lihat Semua Jadwal</a>
      </div>
      @endif

      <div class="row justify-content-center g-4">
        @forelse($pelatihans as $p)
        <div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="{{ 100 + $loop->index * 100 }}">
          <div class="card h-100 shadow-sm rounded-4 overflow-hidden hover-shadow">
            <img src="{{ $p->gambar ? asset('storage/'.$p->gambar) : asset('themes/medicio/assets/img/pelatihan/default.jpg') }}"
              class="card-img-top" style="height:180px;object-fit:cover">
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

  {{-- ===== Berita ===== --}}
  <section id="berita" data-aos="fade-up">
    <div class="container">
      <div class="section-title text-center">
        <h2>Berita Terbaru</h2>
        <p>Update informasi dan kegiatan terbaru dari kami</p>
      </div>

      <div class="text-center mb-4">
        <a href="{{ route('berita.frontend.index') }}" class="btn btn-outline-primary btn-lg">Lihat Semua Berita</a>
      </div>

      <div class="row justify-content-center g-4">
        @forelse($berita as $b)
        <div class="col-md-4 col-sm-6 position-relative" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 100 }}">
          <div class="card h-100 shadow-sm rounded-4 hover-shadow overflow-hidden">
            <img src="{{ asset('themes/minia/assets/images/logo.png') }}"
              alt="Logo" style="width:40px;height:40px;object-fit:contain;position:absolute;top:12px;left:12px;z-index:2">
            <div class="card-body d-flex flex-column" style="padding-top:60px;">
              <h5 class="card-title">{{ $b->judul }}</h5>
              <p class="text-truncate">{{ \Illuminate\Support\Str::limit(strip_tags($b->isi), 100) }}</p>
              <a href="{{ route('berita.frontend.show', $b->slug) }}" class="btn btn-sm btn-primary mt-auto">Baca Selengkapnya</a>
            </div>
            <div class="card-footer small text-muted">{{ $b->created_at->format('d M Y') }}</div>
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

  {{-- ===== Testimonials ===== --}}
  <section id="testimonials" class="section-bg py-5" data-aos="fade-up">
    <div class="container">

      <div class="section-title text-center mb-4">
        <h2>Testimonials</h2>
        <p>Apa Kata Mereka?</p>
      </div>

      @if($testimonials->isNotEmpty())
      <div class="testimonials-slider swiper pb-5"> {{-- pb-5 biar ada ruang buat bullet --}}
        <div class="swiper-wrapper">
          @foreach($testimonials as $t)
          <div class="swiper-slide h-auto">
            <div class="testimonial-item shadow-sm rounded-4 bg-white p-4 text-center h-100 d-flex flex-column justify-content-between">
              <p class="mb-3 text-muted fst-italic">
                <i class="bx bxs-quote-alt-left text-primary"></i>
                {{ $t->testimony }}
                <i class="bx bxs-quote-alt-right text-primary"></i>
              </p>
              <h5 class="fw-bold mb-0">{{ $t->name }}</h5>
            </div>
          </div>
          @endforeach
        </div>

        {{-- Bullet pindah ke luar wrapper --}}
        <div class="swiper-pagination position-relative mt-4"></div>
      </div>
      @else
      <p class="text-center text-muted">Belum ada testimoni.</p>
      @endif

    </div>
  </section>



  {{-- ===== Layanan Kami ===== --}}
  <section class="bg-light" data-aos="fade-up">
    <div class="container">
      <h2 class="fw-bold mb-3 text-primary">Layanan Kami</h2>
      <div class="row g-4">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="accordion" id="layananAccordion">
            @forelse($layanan as $i => $item)
            @php $cid = 'layanan-'.$loop->index; @endphp
            <div class="accordion-item mb-2 border rounded-3">
              <h2 class="accordion-header">
                <button class="accordion-button {{ $i>0?'collapsed':'' }}" type="button"
                  data-bs-toggle="collapse" data-bs-target="#{{ $cid }}"
                  aria-expanded="{{ $i===0?'true':'false' }}" aria-controls="{{ $cid }}">
                  {{ $item->title }}
                </button>
              </h2>
              <div id="{{ $cid }}" class="accordion-collapse collapse {{ $i===0?'show':'' }}" data-bs-parent="#layananAccordion">
                <div class="accordion-body text-muted">{{ strip_tags($item->description) }}</div>
              </div>
            </div>
            @empty
            <div class="text-muted">Belum ada layanan.</div>
            @endforelse
          </div>
        </div>
        <div class="col-lg-6 text-center" data-aos="fade-left">
          <img src="{{ asset('themes/Medicio/assets/img/pelatihan.png') }}" alt="Pembicara" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  {{-- ===== Keunggulan ===== --}}
  <section data-aos="fade-up">
    <div class="container">
      <div class="section-title text-center">
        <h2 class="fw-bold">Keunggulan Kami</h2>
        <p class="small text-muted">Mengapa memilih Kibar Madani?</p>
      </div>
      @php
      $icons = ['fa-solid fa-user-tie','fa-solid fa-book-open','fa-solid fa-network-wired','fa-solid fa-certificate'];
      @endphp
      <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-4">
        @forelse($keunggulan as $item)
        <div class="col" data-aos="zoom-in" data-aos-delay="{{ 100 + $loop->index * 100 }}">
          <div class="card h-100 border-0 shadow-sm rounded-4 text-center hover-shadow">
            <div class="card-body p-4 d-flex flex-column align-items-center">
              <i class="{{ $icons[$loop->index] ?? 'fa-solid fa-circle-info' }} mb-3 fs-1 text-primary"></i>
              <h5 class="card-title fw-semibold mb-2">{{ $item->title }}</h5>
              <p class="card-text text-muted mb-0">{{ \Illuminate\Support\Str::limit(strip_tags($item->description),140) }}</p>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted">Belum ada keunggulan.</div>
        @endforelse
      </div>
    </div>
  </section>

  {{-- ===== Kontak ===== --}}
  <section id="contact" class="contact" data-aos="fade-up">
    <div class="container">
      <div class="section-title text-center">
        <h2>Kontak Kami</h2>
        <p>Temukan lokasi kami dengan mudah melalui peta di bawah ini</p>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="shadow rounded overflow-hidden">
            <iframe src="https://www.google.com/maps/embed?pb=..."
              style="border:0;width:100%;height:400px" allowfullscreen loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ===== Form Kontak ===== --}}
  <section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="shadow rounded p-4 bg-white">
            <form action="{{ route('kontak.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6 mb-3"><input type="text" name="nama" class="form-control" placeholder="Nama Anda" required></div>
                <div class="col-md-6 mb-3"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
              </div>
              <div class="mb-3"><input type="text" name="subjek" class="form-control" placeholder="Subjek" required></div>
              <div class="mb-3"><textarea name="pesan" rows="5" class="form-control" placeholder="Tulis pesan Anda..." required></textarea></div>
              <div class="text-center"><button type="submit" class="btn btn-primary px-4">Kirim Pesan</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

{{-- ===== AOS ===== --}}
<link href="{{ asset('themes/medicio/assets/vendor/aos/aos.css') }}" rel="stylesheet">
<script src="{{ asset('themes/medicio/assets/vendor/aos/aos.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    if (window.AOS) AOS.init({
      duration: 600,
      offset: 80,
      easing: 'ease-out',
      once: true
    });
  });
</script>

@endsection