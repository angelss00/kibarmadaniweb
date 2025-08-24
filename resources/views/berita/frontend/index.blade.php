@extends('layoutss.medicio')

@section('title', 'Semua Berita')

@section('content')
<div style="padding-top: 80px;">
    <div class="container my-5">
        <h2 class="mb-4 text-center">Semua Berita</h2>

        <div class="row g-4">
            @foreach ($berita as $b)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('themes/minia/assets/images/logo.png') }}" class="card-img-top p-10" alt="Logo" style="height: 70px; object-fit: contain; background: #f8f9fa;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $b->judul }}</h5>
                        <a href="{{ route('berita.frontend.show', $b->slug) }}" class="btn btn-primary mt-auto align-self-start">Baca Selengkapnya</a>
                    </div>
                    <div class="card-footer text-muted small">
                        {{ $b->created_at->format('d M Y') }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $berita->links() }}
        </div>
    </div>
</div>
@endsection