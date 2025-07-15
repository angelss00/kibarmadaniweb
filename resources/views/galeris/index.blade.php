@extends('layouts.app')

@section('title', 'Data Galeri')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Galeri</h3>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('galeris.create') }}" class="btn btn-primary mb-3">+ Tambah Gambar</a>

    <div class="row">
        @forelse ($galeris as $galeri)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $galeri->gambar) }}" class="card-img-top" alt="{{ $galeri->judul }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $galeri->judul }}</h5>
                    <p class="card-text">{{ $galeri->deskripsi }}</p>
                    <a href="{{ route('galeris.edit', $galeri->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('galeris.destroy', $galeri->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center">Belum ada data galeri.</p>
        @endforelse
    </div>
</div>
@endsection