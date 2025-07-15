@extends('layouts.app')

@section('title', 'Data Media')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Media</h3>
    <a href="{{ route('media.create') }}" class="btn btn-primary mb-3">+ Tambah Media</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($media as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td><a href="{{ asset('storage/' . $item->file) }}" target="_blank">Unduh</a></td>
                <td>
                    <a href="{{ route('media.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('media.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
