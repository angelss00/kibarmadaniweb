@extends('layouts.app')

@section('title', 'Tambah Kontak')

@section('content')
<div class="container mt-4">
    <h3>Tambah Kontak</h3>

    <form action="{{ route('kontaks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea name="pesan" class="form-control" rows="4" required>{{ old('pesan') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kontaks.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection