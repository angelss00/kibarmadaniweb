@extends('layoutss.medicio')

@section('content')
<section class="py-5" style="margin-top: 100px;"> {
  <div class="container">
    <h2 class="mb-4 text-center">Galeri Foto</h2>

    <div class="row align-items-start">
      @forelse($galeris as $galeri)
      <div class="col-lg-6 col-md-6 mb-4">
        <a href="{{ asset($galeri->image_path) }}" class="glightbox" data-title="{{ $galeri->title }}">
          <img src="{{ asset($galeri->image_path) }}" class="card-img-top" alt="{{ $galeri->title }}" style="height: 230px; object-fit: cover;">
        </a>
        <div class="card-body">
          <h5 class="card-title">{{ $galeri->title }}</h5>
          <p class="card-text">{{ $galeri->description }}</p>
        </div>
      </div>
      @empty
      <div class="col-12 text-center">
        <p>Belum ada galeri yang tersedia.</p>
      </div>
      @endforelse
    </div>

  </div>
</section>
@endsection
