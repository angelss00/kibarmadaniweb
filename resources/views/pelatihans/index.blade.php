@extends('layouts.master')

@section('title', 'Manajemen Pelatihan')

@section('content')
<div class="container-fluid">
    <h1 class="mb-3">Manajemen Pelatihan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('pelatihans.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th>
                    <th width="180px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pelatihans as $p)
                <tr class="text-center">
                    <td class="text-start">{{ $p->nama_pelatihan }}</td>
                    <td>{{ $p->tanggal_mulai }} - {{ $p->tanggal_selesai ?? '-' }}</td>
                    <td class="text-start">{{ $p->deskripsi }}</td>
                    <td class="text-start">{{ $p->lokasi }}</td>
                    <td>
                         <div class="d-flex gap-1 justify-content-center">
                            <a href="{{ route('pelatihans.edit', $p->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('pelatihans.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin?')">
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
