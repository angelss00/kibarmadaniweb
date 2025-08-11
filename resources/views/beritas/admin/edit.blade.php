@extends('layouts.master')

@section('title', 'Edit Berita')

@section('content')
<div class="container">
    <h2 class="text-center">Edit Berita</h2>

    <form action="{{ route('beritas.admin.update', $berita->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
        </div>

        <div class="mb-3">
            <label>Konten</label>
            <textarea name="konten" class="form-control" rows="5" required>{{ $berita->konten }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('beritas.admin.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
