@extends('layouts.app')

@section('title', 'Tambah Media')

@section('content')
<div class="container mt-4">
    <h3>Tambah Media</h3>

    <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">File (PDF/DOCX/ZIP, dll)</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('media.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection