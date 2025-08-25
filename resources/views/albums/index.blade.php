@extends('layouts.master')

@section('title', 'Manajemen Album')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Album Galeri</h3>

    {{-- Tombol Tambah dan Kembali rapat --}}
    <div class="mb-3 d-flex gap-2">
        <a href="{{ route('albums.create') }}" class="btn btn-success"> + Tambah</a>
        <a href="{{ route('galeris.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Kembali ke Galeri
        </a>
    </div>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel album --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th width="180px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($albums as $album)
                <tr class="text-center">
                    <td class="text-start">{{ $album->title }}</td>
                    <td class="text-start">{{ strip_tags($album->description) }}</td>
                    <td>
                        <div class="btn btn-group">
                            <a href="{{ route('albums.edit', $album) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('albums.destroy', $album) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i> Hapus</button>
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