@extends('layouts.master')

@section('content')
<div class="container">
    <h3>Manajemen Galeri</h3>
    <a href="{{ route('galeris.create') }}" class="btn btn-primary mb-3">+ Tambah Galeri</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
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
                    <td>{{ $galeri->title }}</td>
                    <td>{{ $galeri->category->name ?? '-' }}</td>
                    <td>{{ $galeri->album->name ?? '-' }}</td>
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