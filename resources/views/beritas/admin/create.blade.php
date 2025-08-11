@extends('layouts.master')

@section('title', 'Tambah Berita')

@section('content')
<div class="container">
    <h2 class="text-center">Tambah Berita</h2>
    <form action="{{ route('berita.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Konten</label>
            <textarea name="konten" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('beritas.admin.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
