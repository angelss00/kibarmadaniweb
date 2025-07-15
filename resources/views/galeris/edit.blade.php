@extends('layouts.app')

@section('title', 'Edit Galeri')

@section('content')
<div class="container mt-4">
    <h3>Edit Gambar Galeri</h3>

    <form action="{{ route('galeris.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $galeri->judul) }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Ganti Gambar (opsional)</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
        </div>
        @if ($galeri->gambar)
        <div class="mb-3">
            <label class="form-label">Gambar Saat Ini:</label><br>
            <img src="{{ asset('storage/' . $galeri->gambar) }}" width="200" style="object-fit: cover;">
        </div>
        @endif
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('galeris.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
S