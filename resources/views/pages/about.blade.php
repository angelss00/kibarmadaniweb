@extends('layouts.master')

@section('title', 'Tentang Kami')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <img src="{{ asset('themes/minia/assets/images/logo.png') }}" alt="Logo Kibar Madani" class="img-fluid mb-3" style="max-height: 150px;">
        <h2 class="fw-bold">Tentang LPK Kibar Madani</h2>
        <p class="lead">
            Kibar Madani hadir untuk berkontibusi dalam membangun <em>civil society</em> yaitu masyarakat yang beradab dalam membangun, menjalani, dan memaknai kehidupannya.
            Membangun peradaban terbaik perlu ditanamkan sejak dini, karena itu salah satu usaha Kibar Madani adalah membina anak usia dini melalui pendidikan formal dan non-formal.
        </p>
    </div>

    <div class="mb-5">
        <h3 class="fw-semibold">Makna Kibar Madani</h3>
        <p><strong>Kibar</strong> menurut KBBI berarti: <em>bergerak aktif</em> dan <em>menjadi masyhur</em>.</p>
        <p><strong>Madani</strong> berarti menjunjung tinggi nilai, norma dan hukum yang ditopang oleh penguasaan iman, ilmu, dan teknologi yang berperadaban.</p>
    </div>

    <div class="mb-5">
        <h3 class="fw-semibold">Visi</h3>
        <blockquote class="blockquote">
            <p class="mb-0">To make people civilized (Membentuk masyarakat berbudaya madani)</p>
        </blockquote>
    </div>

    <div class="mb-5">
        <h3 class="fw-semibold">Misi</h3>
        <ul>
            <li>Mengembangkan setiap individu memiliki kecerdasan spiritual, kompeten di bidangnya dan memiliki keunggulan soft skill</li>
            <li>Menyiapkan generasi unggul yang memiliki pondasi spiritual yang tangguh dan adaptif terhadap perubahan</li>
            <li>Mengembangkan gagasan dan metode dalam memudahkan orang dalam pengembangan soft skill dan kompetensi</li>
            <li>Memelopori hal-hal baru dalam mengembangkan produk dan jasa pengembangan soft skill dan kompetensi</li>
            <li>Berusaha kekinian dalam menyajikan program berbasis soft skills dan kompetensi</li>
            <li>Aktif dalam merespon perubahan keperluan soft skills dan kompetensi</li>
            <li>Meningkatan kecerdasan spiritual sebagai pondasi dalam mengembangkan soft skills dan kompetensi</li>
        </ul>
    </div>

    <div class="mb-5 text-center">
        <h3 class="fw-semibold">Core Value</h3>
        <div class="row justify-content-center mt-4">
            <div class="col-md-2 col-sm-6 mb-3">
                <div class="p-3 bg-primary text-white rounded shadow">Kreatif</div>
            </div>
            <div class="col-md-2 col-sm-6 mb-3">
                <div class="p-3 bg-success text-white rounded shadow">Inovatif</div>
            </div>
            <div class="col-md-2 col-sm-6 mb-3">
                <div class="p-3 bg-warning text-white rounded shadow">Brilian</div>
            </div>
            <div class="col-md-2 col-sm-6 mb-3">
                <div class="p-3 bg-info text-white rounded shadow">Aktif</div>
            </div>
            <div class="col-md-2 col-sm-6 mb-3">
                <div class="p-3 bg-danger text-white rounded shadow">Religius</div>
            </div>
        </div>
    </div>
</div>

<!-- ======= Contact Section ======= -->
        <section id="contact" class="contact py-5 bg-light">
            <div class="container" data-aos="fade-up">
                <div class="section-title text-center mb-4">
                    <h2>Kontak Kami</h2>
                    <p>Silakan hubungi kami melalui form berikut atau kunjungi lokasi kami di peta.</p>
                </div>

                <div class="row">
                    <!-- Kolom Peta -->
                    <div class="col-lg-6 mb-4">
                        <div class="shadow rounded overflow-hidden h-100">
                            <iframe style="border:0; width: 100%; height: 100%; min-height: 400px;"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.8399820123126!2d110.39145601477644!3d-7.807675394373471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a582dca6f98d3%3A0x52230eaefcdd915!2sKibar%20Madani!5e0!3m2!1sen!2sid!4v1690724306590!5m2!1sen!2sid"
                                frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>

                    <!-- Kolom Form -->
                    <div class="col-lg-6">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Formulir Kontak</h5>
                                
                                <form action="{{ route('kontak.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="subjek" class="form-label">Subjek</label>
                                        <input type="text" class="form-control" id="subjek" name="subjek" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pesan" class="form-label">Pesan</label>
                                        <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
</section>
<!-- End Contact Section -->
@endsection