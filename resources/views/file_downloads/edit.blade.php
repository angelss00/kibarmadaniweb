@extends('layouts.master')

@section('title', 'Edit File Download')

@section('content')
<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">Edit File Download</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('file-downloads.update', $fileDownload->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" value="{{ $fileDownload->title }}" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control">{{ $fileDownload->description }}</textarea>
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
                <label>Status</label>
                <select name="status" class="form-select">
                    <option value="draft" {{ $fileDownload->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $fileDownload->status == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="archived" {{ $fileDownload->status == 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Uploader</label>
                <input type="text" name="uploader" class="form-control" value="{{ $fileDownload->uploader }}">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('file-downloads.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection