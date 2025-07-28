@extends('layouts.master')

@section('title', 'Tambah Galeri')

@section('content')
<div class="container mt-4">
    <h3>Tambah Gambar Galeri</h3>

    <form action="{{ route('galeris.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image_file" class="form-label">Upload Gambar</label>
            <input type="file" name="image_file" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="album_id" class="form-label">Album</label>
            <select name="album_id" class="form-control">
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}">{{ $album->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="uploader" class="form-label">Uploader</label>
            <input type="text" name="uploader" class="form-control" value="{{ old('uploader') }}">
        </div>

        <div class="mb-3">
            <label for="taken_at" class="form-label">Tanggal Diambil</label>
            <input type="date" name="taken_at" class="form-control" value="{{ old('taken_at') }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="draft">Draft</option>
                <option value="published">Published</option>
                <option value="archived">Archived</option>
            </select>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_featured" class="form-check-input" id="is_featured">
            <label class="form-check-label" for="is_featured">Tampilkan di Beranda</label>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('galeris.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
