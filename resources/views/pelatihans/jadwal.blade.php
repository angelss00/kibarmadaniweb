@extends('layoutss.medicio')

@section('title', 'Jadwal Pelatihan')

@section('content')
<main class="container" style="margin-top:150px;">
    <h2 class="text-center mb-4">Jadwal Pelatihan</h2>

    @if($pelatihans->isEmpty())
        <p class="text-center">Belum ada jadwal pelatihan tersedia.</p>
    @else
        <div class="row">
            @foreach($pelatihans as $p)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $p->judul }}</h5>
                        <p class="card-text text-muted">
                            📍 {{ $p->lokasi ?? '-' }} <br>
                            🗓 {{ \Carbon\Carbon::parse($p->tanggal_mulai)->translatedFormat('d F Y') }}
                            -
                            {{ \Carbon\Carbon::parse($p->tanggal_selesai)->translatedFormat('d F Y') }}
                        </p>
                        @if($p->deskripsi)
                            <p>{{ Str::limit($p->deskripsi, 150) }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</main>
@endsection
