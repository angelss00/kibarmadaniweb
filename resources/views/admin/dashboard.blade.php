@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-12">
        <div id="dashboardCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="card bg-primary text-white text-center border-0 rounded-4"
                        style="height: 320px;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center h-100">
                            <h2 class="fw-bold mb-3">Selamat Datang di Dashboard</h2>
                            <p class="mb-0 fs-5">Kelola semua konten website dengan mudah dan cepat.</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="card bg-success text-white text-center border-0 rounded-4"
                        style="height: 320px;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center h-100">
                            <h2 class="fw-bold mb-3">Manajemen Galeri & Informasi</h2>
                            <p class="mb-0 fs-5">Cek dan kelola info, kontak, media, dan lainnya.</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="card bg-warning text-dark text-center border-0 rounded-4"
                        style="height: 320px;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center h-100">
                            <h2 class="fw-bold mb-3">Desain Responsive & Modern</h2>
                            <p class="mb-0 fs-5">Dashboard berbasis Laravel & Minia Template</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#dashboardCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#dashboardCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</div>

{{-- About Us Section --}}
<div class="container mb-5">
    <div class="row justify-content-center" data-aos="fade-up">
        <div class="col-lg-8 text-center">
            <h2 class="fw-bold mb-4">Tentang Kami</h2>
            <p class="fs-5 text-muted">
                LPK Kibar Madani adalah lembaga pelatihan yang berkomitmen memberikan pendidikan berkualitas,
                berbasis teknologi dan pengembangan keterampilan kerja. Sistem dashboard ini hadir untuk mempermudah
                pengelolaan data internal secara efisien dan modern.
            </p>
        </div>
    </div>

    <div class="row text-center mt-4" data-aos="fade-up" data-aos-delay="200">
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <i class="bx bx-group text-primary" style="font-size: 3rem;"></i>
                <h5 class="fw-bold mt-3">Pelatihan Berkualitas</h5>
                <p class="text-muted">Kami menyediakan pelatihan bersertifikat dengan tenaga pengajar profesional.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <i class="bx bx-devices text-success" style="font-size: 3rem;"></i>
                <h5 class="fw-bold mt-3">Teknologi Terkini</h5>
                <p class="text-muted">Dashboard terintegrasi dengan sistem digital yang modern dan mobile-friendly.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <i class="bx bx-world text-warning" style="font-size: 3rem;"></i>
                <h5 class="fw-bold mt-3">Jaringan Luas</h5>
                <p class="text-muted">Kami memiliki jaringan kerja sama dengan industri dan instansi pendidikan.</p>
            </div>
        </div>
    </div>
</div>

        {{-- Visi dan Misi Section --}}
        <div class="container mb-5">

            <div class="row justify-content-center text-center mb-4" data-aos="fade-up">
                <div class="col-lg-8">
                    <h2 class="fw-bold">Visi & Misi</h2>
                    <p class="text-muted fs-5">Komitmen kami dalam mencetak generasi unggul dan berdaya saing tinggi.</p>
                </div>
            </div>

            {{-- Visi --}}
            <div class="row mb-4" data-aos="fade-up">
                <div class="col-12">
                    <div class="p-4 border rounded shadow-sm bg-light">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bx bx-bulb text-primary me-3" style="font-size: 2.5rem;"></i>
                            <h5 class="fw-bold mb-0">Visi Kami</h5>
                        </div>
                        <p class="text-muted fs-6 mb-0">
                            Menjadi lembaga pelatihan yang unggul dalam mengembangkan sumber daya manusia melalui pendidikan berbasis spiritual, kompetensi, dan soft skill yang adaptif terhadap perkembangan zaman.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Misi --}}
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-12">
                    <div class="p-4 border rounded shadow-sm bg-light">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bx bx-target-lock text-success me-3" style="font-size: 2.5rem;"></i>
                            <h5 class="fw-bold mb-0">Misi Kami</h5>
                        </div>
                        <ul class="text-muted fs-6 mb-0 ps-3">
                            <li>Mengembangkan setiap individu memiliki kecerdasan spiritual, kompeten di bidangnya dan memiliki keunggulan soft skill.</li>
                            <li>Menyiapkan generasi unggul yang memiliki pondasi spiritual yang tangguh dan adaptif terhadap perubahan Core Value.</li>
                            <li><strong>Kreatif</strong> – mengembangkan gagasan dan metode dalam memudahkan orang dalam pengembangan soft skill dan kompetensi.</li>
                            <li><strong>Inovatif</strong> – memelopori hal-hal baru dalam mengembangkan produk dan jasa pengembangan soft skill dan kompetensi.</li>
                            <li><strong>Brillian</strong> – berusaha kekinian dalam menyajikan program berbasis soft skills dan kompetensi.</li>
                            <li><strong>Aktif</strong> – dalam merespon perubahan keperluan soft skills dan kompetensi.</li>
                            <li><strong>Religius</strong> – meningkatan kecerdasan spiritual sebagai pondasi dalam mengembangkan soft skills dan kompetensi.</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


@endsection