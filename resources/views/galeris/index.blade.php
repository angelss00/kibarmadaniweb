@extends('layouts.master')

@section('content')
<div class="container">
    <h4 class="mb-3">Manajemen Galeri</h4>

    <div class="mb-3">
        <a href="{{ route('galeris.index') }}" class="btn btn-success me-2">+ Tambah Galeri</a>
        <a href="{{ route('galerry_categories.index') }}" class="btn btn-primary me-2">+ Tambah Kategori Galeri</a>
        <a href="{{ route('albums.index') }}" class="btn btn-secondary">+ Tambah Album</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Album</th>
                    <th>Status</th>
                    <th>Beranda</th>
                    <th width="180px" >Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($galeris as $galeri)
                <tr class="text-center">
                    <td class="text-start">
                        <img src="{{ asset($galeri->image_path) }}" alt="{{ $galeri->title }}" width="100" class="img-thumbnail">
                    </td>
                    <td class="text-start">{{ $galeri->title }}</td>
                    <td>{{ $galeri->category->name ?? '-' }}</td>
                    <td>{{ $galeri->album->title ?? '-' }}</td>
                    <td>{{ ucfirst($galeri->status) }}</td>
                    <td>{{ $galeri->is_featured ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        <div class="d-flex gap-1 justify-content-center">
                            <a href="{{ route('galeris.edit', $galeri) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('galeris.destroy', $galeri) }}" method="POST" onsubmit="return confirm('Yakin?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection