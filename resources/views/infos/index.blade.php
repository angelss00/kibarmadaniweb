<!-- resources/views/infos/index.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Slider</h2>
    
    <!-- Tombol Tambah Data -->
    <a href="{{ route('infos.create') }}" class="btn btn-primary mb-3">
        <i class="fa fa-plus"></i> Tambah Info
    </a>

    <!-- Tabel Data Slider -->
    <table class="table table-bordered">
        <thead style="background-color: black; color: white;">
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
                <td><img src="{{ Storage::url('sliders/' . $info->gambar) }}" width="100" alt="Gambar Info"></td>
                <td>{{ $info->judul }}</td>
                <td>{{ Str::limit($info->isi, 50) }}</td>
                <td>
                    <!-- Edit dan Delete -->
                    <a href="{{ route('infos.edit', $info->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('infos.destroy', $info->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                            <i class="fa fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
