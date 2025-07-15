@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Kategori</h3>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>

    @endif

    <a href="{{ route('kategoris.create') }}" class="btn btn-primary mb-3">+ Tambah
        Kategori</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th style="width: 150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategoris as $index => $kategori)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kategori->nama }}</td>
                <td>{{ $kategori->deskripsi }}</td>
                <td>
                    <a href="{{ route('kategoris.edit', $kategori->id) }}"
                        class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('kategoris.destroy', $kategori->id)
}}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty

            <tr>
                <td colspan="4" class="text-center">Belum ada data kategori.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection