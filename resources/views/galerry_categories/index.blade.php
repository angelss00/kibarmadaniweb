@extends('layouts.master')

@section('title', 'Manajemen Kategori Galeri')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Kategori Galeri</h3>

    <div class="mb-3 d-flex gap-2">
        <!-- Tombol Tambah -->
        <a href="{{ route('galerry_categories.create') }}" class="btn btn-primary">
            + Tambah
        </a>

        <!-- Tombol Kembali dengan FA, mepet ke tombol Tambah -->
        <a href="{{ route('galeris.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th width="180px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                <tr class="text-center">
                    <td class="text-start">{{ $cat->name }}</td>
                    <td class="text-start">{!! $cat->description !!}</td>
                    <td>
                        <div class="d-flex gap-1 justify-content-center">
                            <a href="{{ route('galerry_categories.edit', $cat) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('galerry_categories.destroy', $cat) }}" method="POST" onsubmit="return confirm('Yakin?')">
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
