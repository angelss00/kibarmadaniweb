@extends('layouts.master')

@section('title', 'Data Kontak')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Kontak</h3>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('kontaks.create') }}" class="btn btn-primary mb-3">+ Tambah Kontak</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th style="width: 150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kontaks as $index => $kontak)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kontak->name }}</td>
                <td>{{ $kontak->email }}</td>
                <td>{{ $kontak->message }}</td>
                <td>
                    <a href="{{ route('kontaks.edit', $kontak->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('kontaks.destroy', $kontak->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus kontak ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data kontak.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection