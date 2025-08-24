@extends('layoutss.medicio')

@section('title', 'LPK KIBAR MADANI')

@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">

      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image: url(themes/Medicio/assets/img/slide/slide-1.jpg)">
        <div class="container">
          <h2>Welcome to <span>Kibar Madani</span></h2>
          <p>LPK Kibar Madani menjadi narasumber dalam kegiatan Pelatihan Berbasis Kompetensi (PBK) pada skema “Training Need Analysis” untuk 25 SDM Sekolah Tinggi Ilmu Pelayaran Seluruh Indonesia, di bawah pembinaan direktorat perhubungan laut Kementerian Perhubungaan RI. Kegiatan diselenggarakan di Hotel Grand Mercure Yogyakarta</p>
          <a href="#about" class="btn-get-started scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item" style="background-image: url(themes/Medicio/assets/img/slide/slide-2.jpg)">
        <div class="container">
          <h2>Pelatihan Berbasis Kompetensi (PBK) Skema “Master Trainer”</h2>
          <p>LPK Kibar Madani memberikan Pelatihan Berbasis Kompetensi pada skema “Master Trainer” di Universitas Negeri Yogyakarta. Peserta terdiri dari Guru Besar dan dosen senior di lingkungan UNY. Uji kompetensi bekerjasama dengan LSP Trainer Kompeten Indonesia.</p>
          <a href="#about" class="btn-get-started scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item" style="background-image: url(themes/Medicio/assets/img/slide/slide-3.jpg)">
        <div class="container">
          <h2>Training Need Analysis</h2>
          <p>LPK Kibar Madani menjadi narasumber dalam kegiatan Pelatihan Berbasis Kompetensi (PBK) pada skema “Training Need Analysis” untuk 25 SDM Sekolah Tinggi Ilmu Pelayaran Seluruh Indonesia, di bawah pembinaan direktorat perhubungan laut Kementerian Perhubungaan RI. Kegiatan diselenggarakan di Hotel Grand Mercure Yogyakarta</p>
          <a href="#about" class="btn-get-started scrollto">Read More</a>
        </div>
      </div>

    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>
</section><!-- End Hero -->

<main id="main">


  <!-- ======= Tentang Kami (Tanpa Nilai Inti) ======= -->
  <section id="about">
    <div class="mb-5 p-4 bg-white shadow-sm rounded">
      <h2 class="mb-3 border-bottom pb-2"><i class="bi bi-eye-fill me-2"></i>Visi</h2>
      <p class="lead" style="white-space: pre-line;">
        {{ strip_tags($visiMisi->visi ?? 'Belum ada data visi') }}
      </p>
    </div>

    <div class="mb-5 p-4 bg-white shadow-sm rounded">
      <h2 class="mb-3 border-bottom pb-2"><i class="bi bi-flag-fill me-2"></i>Misi</h2>
      <p class="lead" style="white-space: pre-line;">
        {{ strip_tags($visiMisi->misi ?? 'Belum ada data misi') }}
      </p>
    </div>

    <div class="mb-5 p-4 bg-white shadow-sm rounded">
      <h2 class="mb-3 border-bottom pb-2"><i class="bi bi-info-circle-fill me-2"></i>Makna Kibar Madani</h2>
      <p class="lead" style="white-space: pre-line;">
        {{ strip_tags($visiMisi->makna_kibar ?? 'Belum ada data makna') }}
      </p>
    </div>
  </section>


  </div>
  </section>



  </div>
  </section>


  <!--  berita  -->
  <section id="berita" class="my-5">
    <div class="container">
      <h2 class="text-center mb-4">Berita Terbaru</h2>
      <div class="row justify-content-center g-4">
        <div class="text-center mt-4">
          <a href="{{ route('berita.frontend.index') }}" class="btn btn-outline-primary">Lihat Semua Berita</a>
        </div>
        @forelse($berita as $b)
        <div class="col-md-4 col-sm-6 position-relative" data-aos="fade-up">
          <div class="card h-100 shadow-sm" style="min-height: 180px;">
            <img src="{{ asset('themes/minia/assets/images/logo.png') }}"
              alt="Logo"
              style="
                            width: 40px;
                            height: 40px;
                            object-fit: contain;
                            position: absolute;
                            top: 12px;
                            left: 12px;
                            border-radius: 4px;
                            box-shadow: 0 0 5px rgba(0,0,0,0.1);
                            background: transparent;
                         ">
            <div class="card-body d-flex flex-column" style="padding-top: 60px;">
              <h5 class="card-title">{{ $b->judul }}</h5>
              <a href="{{ route('berita.frontend.show', $b->id) }}" class="btn btn-sm btn-primary mt-auto align-self-start">Baca Selengkapnya</a>
            </div>
            <div class="card-footer text-muted small" style="font-size: 0.75rem;">
              {{ $b->created_at->format('d M Y') }}
            </div>
          </div>
        </div>
        @empty
        <p class="text-center">Belum ada berita.</p>
        @endforelse
      </div>
    </div>
  </section>


 {{-- ===================== LAYANAN KAMI ===================== --}}
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-bold mb-4 text-primary">Layanan Kami</h2>

    <div class="row g-4 align-items-start">
      {{-- Kiri: Accordion --}}
      <div class="col-lg-6">
        <div class="accordion" id="layananAccordion">
          @foreach ($layanan as $idx => $item)
          @php
            $collapseId = 'layanan-'.$loop->index;
            $show = $idx === 0 ? 'show' : '';
            $collapsed = $idx === 0 ? '' : 'collapsed';
          @endphp

          <div class="accordion-item mb-2 border rounded-3 overflow-hidden">
            <h2 class="accordion-header">
              <button class="accordion-button {{ $collapsed }} py-3"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#{{ $collapseId }}"
                aria-expanded="{{ $idx===0 ? 'true':'false' }}"
                aria-controls="{{ $collapseId }}">
                <span class="fw-semibold">{{ $item->title }}</span>
              </button>
            </h2>
            <div id="{{ $collapseId }}"
              class="accordion-collapse collapse {{ $show }}"
              data-bs-parent="#layananAccordion">
              <div class="accordion-body text-muted">
                {{ strip_tags($item->description) }}
              </div>
            </div>
          </div>
          @endforeach

          @if($layanan->isEmpty())
          <div class="text-muted">Belum ada layanan.</div>
          @endif
        </div>
      </div>

      {{-- Kanan: Hanya gambar --}}
      <div class="col-lg-6 text-center">
        <img src="{{ asset('themes/Medicio/assets/img/pelatihan.png') }}" 
             alt="Pembicara" 
             class="img-fluid" 
             style="max-width: 100%; height: auto;">
      </div>
    </div>
  </div>
</section>


  <style>
    .accordion-button:not(.collapsed) {
      box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .15);
    }
  </style>


  {{-- tambahan kecil biar header yang aktif kelihatan "highlight" --}}
  <style>
    .accordion-button:not(.collapsed) {
      box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .15);
      border-radius: .75rem;
    }

    .accordion-item {
      border-radius: .75rem;
      overflow: hidden;
    }
  </style>


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
        'fa-solid fa-user-tie',        // item 1
        'fa-solid fa-book-open',       // item 2
        'fa-solid fa-network-wired',   // item 3
        'fa-solid fa-certificate',     // item 4
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



  <!-- ======= Contact Section (Maps Only) ======= -->
  <section id="contact" class="contact py-5">
    <div class="container" data-aos="fade-up">

      <div class="section-title text-center mb-4">
        <h2>Kontak Kami</h2>
        <p>Temukan lokasi kami dengan mudah melalui peta di bawah ini.</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="shadow rounded overflow-hidden">
            <iframe style="border:0; width: 100%; height: 400px;"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.8399820123126!2d110.39145601477644!3d-7.807675394373471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a582dca6f98d3%3A0x52230eaefcdd915!2sKibar%20Madani!5e0!3m2!1sen!2sid!4v1690724306590!5m2!1sen!2sid"
              frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Form Kontak -->
  <div class="row justify-content-center mt-5">
    <div class="col-lg-10">
      <div class="shadow rounded p-4 bg-white">
        <form action="{{ route('kontak.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
            </div>
            <div class="col-md-6 mb-3">
              <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
          </div>
          <div class="mb-3">
            <input type="text" name="subjek" class="form-control" placeholder="Subjek" required>
          </div>
          <div class="mb-3">
            <textarea name="pesan" rows="5" class="form-control" placeholder="Tulis pesan Anda di sini..." required></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary px-4">Kirim Pesan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Form Kontak -->

  <!-- End Contact Section -->

</main><!-- End #main -->

@endsection