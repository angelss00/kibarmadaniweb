@extends('layouts.master')

@section('title', 'Manajemen Berita')

@section('content')
<div class="container">
    <h4 class="mb-3">Manajemen Berita</h4>

    <div class="mb-3">
        <a href="{{ route('beritas.admin.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Slug</th> {{-- Tambahan kolom slug --}}
                    <th width="180px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($berita as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td class="text-start">{{ $item->judul }}</td>
                    <td>{{ $item->slug }}</td> {{-- Tampilkan slug --}}
                    <td>
                        <div class="btn btn-group">
                            <a href="{{ route('beritas.admin.edit', $item) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('beritas.admin.destroy', $item) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        </div>
            </div>
            </td>
            </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection