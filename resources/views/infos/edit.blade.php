<!-- resources/views/infos/edit.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Info</h2>

    <form action="{{ route('infos.update', $info->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $info->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control" id="isi" name="isi" rows="4" required>{{ old('isi', $info->isi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (Opsional)</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
            @if($info->gambar)
                <img src="{{ Storage::url('sliders/' . $info->gambar) }}" width="100" alt="Gambar Info">
            @endif
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Perbarui
        </button>
        <a href="{{ route('infos.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection
