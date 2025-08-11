@extends('layouts.master')

@section('title', 'Manajemen Berita')

@section('content')

<div class="mb-3">
    <a href="{{ route('beritas.admin.create') }}" class="btn btn-primary">Tambah Berita</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Konten</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($berita as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->konten }}</td>
            <td>
                <a href="{{ route('beritas.admin.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('beritas.admin.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Pagination --}}
{{ $berita->links() }}

@endsection
