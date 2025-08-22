@extends('layouts.master')

@section('title', 'Manajemen Album')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Album Galeri</h3>

    <div class="mb-3">
        <a href="{{ route('albums.create') }}" class="btn btn-primary me-2">
            + Tambah
        </a>
        <a href="{{ route('galeris.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke Galeri
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th width="180px" >Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($albums as $album)
                <tr class="text-center">
                    <td class="text-start">{{ $album->title }}</td>
                    <td class="text-start">{{ $album->description }}</td>
                    <td>
                        <div class="d-flex gap-1 justify-content-center">
                            <a href="{{ route('albums.edit', $album) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('albums.destroy', $album) }}" method="POST" onsubmit="return confirm('Yakin?')">
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