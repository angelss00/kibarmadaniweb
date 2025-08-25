<!-- resources/views/infos/create.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Info</h2>

    <form action="{{ route('infos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control" id="isi" name="isi" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Simpan
        </button>
        <a href="{{ route('infos.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection
