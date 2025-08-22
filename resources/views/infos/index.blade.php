@extends('layouts.master')

@section('content')
<div class="container">
    <h4>Daftar Info</h4>
    <a href="{{ route('infos.create') }}" class="btn btn-primary mb-3">+ Tambah</a>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>Judul</th>
                <th>Isi</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th width="180px" >Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($infos as $info)
            <tr>
                <td>{{ $info->judul }}</td>
                <td>{{ $info->isi }}</td>
                <td>{{ $info->kategori->nama }}</td>
                <td>{{ $info->created_at->format('d-m-Y') }}</td>
                <td class="text-center">
                     <div class="d-flex gap-1 justify-content-center">
                            <a href="{{ route('infos.edit', $info) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('infos.destroy', $info) }}" method="POST" onsubmit="return confirm('Yakin?')">
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