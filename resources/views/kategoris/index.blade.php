@extends('layouts.master')

@section('title', 'Data Kategori')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Kategori</h3>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('kategoris.create') }}" class="btn btn-primary mb-3">+ Tambah</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th style="width: 180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategoris as $index => $kategori)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kategori->nama }}</td>
                <td>{!! $kategori->deskripsi !!}</td> <!-- render HTML dari CKEditor -->
                <td>
                    <div class="btn btn-group">
                        <a href="{{ route('kategoris.edit', $kategori) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                        <form action="{{ route('kategoris.destroy', $kategori) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                    </div>
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