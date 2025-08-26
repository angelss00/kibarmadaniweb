@extends('layoutss.medicio')

@section('title', 'Download File')

@section('content')
<section id="downloads" class="my-5">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h2>Download File</h2>
            <p>Pilih file yang ingin Anda unduh</p>
        </div>

        <div class="row g-4">
            @forelse($downloads as $file)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    @if($file->gambar)
                    <img src="{{ asset($file->gambar) }}" class="card-img-top" alt="{{ $file->title }}" style="height: 180px; object-fit: cover;">
                    @else
                    <img src="{{ asset('themes/medicio/assets/img/no-image.png') }}" class="card-img-top" alt="No Image" style="height: 180px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $file->title }}</h5>
                        <p class="mb-1"><i class="bx bx-folder-open"></i> {{ $file->kategori->nama ?? '-' }}</p>
                        <p class="mb-1"><i class="bx bx-file"></i> {{ number_format($file->file_size / 1024, 2) }} KB</p>
                        <p class="mb-3"><span class="badge bg-{{ $file->status == 'aktif' ? 'success' : 'secondary' }}">{{ ucfirst($file->status) }}</span></p>
                        <a href="{{ route('file_downloads.download', $file) }}" class="btn btn-primary mt-auto">
                            <i class="bx bx-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada file untuk diunduh.</p>
            </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $downloads->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
@endsection