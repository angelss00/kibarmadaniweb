@extends('layouts.master')

@section('title', 'Manajemen Album')

@section('content')
<div class="container mt-4">
    <h3>Album Galeri</h3>
    <a href="{{ route('albums.create') }}" class="btn btn-primary mb-3">+ Tambah Album</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
            <tr>
                <td>{{ $album->title }}</td>
                <td>{{ $album->description }}</td>
                <td>
                    <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus album ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
