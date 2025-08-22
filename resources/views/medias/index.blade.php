@extends('layouts.master')

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
                     <div class="d-flex gap-1 justify-content-center">
                            <a href="{{ route('medias.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('medias.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin?')">
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
@endsection
