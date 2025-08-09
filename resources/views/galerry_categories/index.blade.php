@extends('layouts.master')

@section('title', 'Manajemen Kategori Galeri')

@section('content')
<div class="container mt-4">
    <h3>GalerI Kategori</h3>
    <a href="{{ route('galerry_categories.create') }}" class="btn btn-primary mb-3 me-2">
        + Tambah Galeri Category
    </a>
    <a href="{{ route('galeris.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Kembali ke Galeri
    </a>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->description }}</td>
                <td>
                    <a href="{{ route('galerry_categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('galerry_categories.destroy', $cat->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus kategori ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection