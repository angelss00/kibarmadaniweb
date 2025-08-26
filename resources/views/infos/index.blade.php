<!-- resources/views/infos/index.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Slider</h2>

    <!-- Tombol Tambah Data -->
    <a href="{{ route('infos.create') }}" class="btn btn-primary mb-3"> + Tambah 
    </a>

    <!-- Tabel Data Slider -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($infos as $info)
            <tr>
                <td><img src="{{ Storage::url($info->gambar) }}" width="100" alt="Gambar Info">
                </td>
                <td>{{ $info->judul }}</td>
                <td>{!! Str::limit($info->isi, 50) !!}</td>
                <td>
                    <div class="btn btn-group">
                        <a href="{{ route('infos.edit', $info) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                        <form action="{{ route('infos.destroy', $info) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection