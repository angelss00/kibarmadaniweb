@extends('layouts.master')

@section('title', 'Edit Kategori')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Edit Kategori</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan:</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
    @endif

    <form action="{{ route('kategoris.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" name="nama" class="form-control" id="nama"
                value="{{ old('nama', $kategori->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi"
                rows="3">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
        </div>

        <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-success">Perbarui</button>
    </form>
</div>
@endsection