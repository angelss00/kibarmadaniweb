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
                <label for="kategori_id" class="form-label">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
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


            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a href="{{ route('file_downloads.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </form>
    </div>
</div>
@endsection