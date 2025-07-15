@extends('layouts.app')

@section('title', 'Edit Media')

@section('content')
<div class="container mt-4">
    <h3>Edit Media</h3>

    <form action="{{ route('media.update', $media->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $media->judul) }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $media->deskripsi) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Ganti File (opsional)</label>
            <input type="file" name="file" class="form-control">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti file.</small>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('media.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
