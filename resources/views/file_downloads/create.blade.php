@extends('layouts.master')

@section('title', 'Tambah File Download')

@section('content')
<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">Tambah File Download</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('file_downloads.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="categori_id" class="form-select">
                    <option value="">- Pilih Kategori -</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>File Upload</label>
                <input type="file" name="file" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-select">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                    <option value="archived">Archived</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Uploader</label>
                <input type="text" name="uploader" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('file_downloads.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
