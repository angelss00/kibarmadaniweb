@extends('layoutss.medicio') {{-- Atau layout Minia kamu --}}

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Galeri Foto</h2>
    
    <div class="row">
        @forelse($galeris as $galeri)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <img src="{{ asset($galeri->image_path) }}" class="card-img-top" alt="{{ $galeri->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $galeri->title }}</h5>
                        <p class="card-text">{{ $galeri->description }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>Belum ada galeri yang tersedia.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
