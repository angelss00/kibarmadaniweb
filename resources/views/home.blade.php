@extends('layouts.app')

@section('content')
<h1>Berita Terbaru</h1>
@foreach($berita as $b)
    <h3>{{ $b->judul }}</h3>
    <p>{{ Str::limit($b->konten, 100) }}</p>
    <a href="{{ route('frontend.berita.show', $b->id) }}">Baca Selengkapnya</a>
@endforeach
@endsection
