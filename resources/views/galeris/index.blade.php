@extends('layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Manajemen Galeri</h4>
        <div>
            <a href="{{ route('galeris.create') }}" class="btn btn-success me-2">
                + Tambah Galeri
            </a>
            <a href="{{ route('galerry_categories.create') }}" class="btn btn-primary me-2">
                + Tambah Kategori Galeri
            </a>
            <a href="{{ route('albums.create') }}" class="btn btn-secondary">
                + Tambah Album
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Album</th>
                <th>Status</th>
                <th>Beranda</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($galeris as $galeri)
            <tr>
                <td>
                    <img src="{{ asset($galeri->image_path) }}" alt="{{ $galeri->title }}" width="100" class="img-thumbnail">
                </td>

                <td>{{ $galeri->title }}</td>
                <td>{{ $galeri->category->name ?? '-' }}</td>
                <td>{{ $galeri->album->title ?? '-' }}</td>
                <td>{{ ucfirst($galeri->status) }}</td>
                <td>{{ $galeri->is_featured ? 'Ya' : 'Tidak' }}</td>
                <td>
                    <a href="{{ route('galeris.edit', $galeri->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('galeris.destroy', $galeri->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection