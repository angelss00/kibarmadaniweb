@extends('layouts.master')

@section('title', 'Edit Galeri')

@section('content')
<div class="container mt-4">
    <h3>Edit Galeri</h3>

    <form action="{{ route('galeris.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $galeri->title) }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                rows="3">{{ old('description', $galeri->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-select">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id', $galeri->category_id) == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Album --}}
        <div class="mb-3">
            <label for="album_id" class="form-label">Album</label>
            <select name="album_id" class="form-select">
                <option value="">-- Pilih Album --</option>
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}" {{ old('album_id', $galeri->album_id) == $album->id ? 'selected' : '' }}>
                        {{ $album->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Gambar --}}
        <div class="mb-3">
            <label for="image_file" class="form-label">Ganti Gambar (opsional)</label>
            <input type="file" name="image_file" class="form-control" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>

        {{-- Preview gambar lama --}}
        @if ($galeri->image_path)
            <div class="mb-3">
                <label class="form-label">Gambar Saat Ini:</label><br>
                <img src="{{ asset($galeri->image_path) }}" width="200" style="object-fit: cover;">
            </div>
        @endif

        {{-- Uploader --}}
        <div class="mb-3">
            <label for="uploader" class="form-label">Uploader</label>
            <input type="text" name="uploader" class="form-control"
                value="{{ old('uploader', $galeri->uploader) }}">
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="taken_at" class="form-label">Tanggal Diambil</label>
            <input type="date" name="taken_at" class="form-control"
                value="{{ old('taken_at', optional($galeri->taken_at)->format('Y-m-d')) }}">
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="draft" {{ $galeri->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $galeri->status == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ $galeri->status == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        {{-- Featured --}}
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured"
                {{ $galeri->is_featured ? 'checked' : '' }}>
            <label class="form-check-label" for="is_featured">Tampilkan sebagai unggulan</label>
        </div>

        {{-- Tombol --}}
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('galeris.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
