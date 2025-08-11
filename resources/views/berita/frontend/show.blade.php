@extends('layoutss.medicio')

@section('content')
<div class="container" style="padding-top: 150px;">
    <h1>{{ $berita->judul }}</h1>
    <div>{!! $berita->konten !!}</div>
    <a href="{{ route('berita.frontend.index') }}" class="btn btn-secondary mt-3">Kembali ke Semua Berita</a>
</div>
@endsection
