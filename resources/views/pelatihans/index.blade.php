@extends('layouts.master')

@section('title', 'Manajemen Pelatihan')

@section('content')
<div class="container-fluid">
    <h1>Manajemen Pelatihan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pelatihans.create') }}" class="btn btn-primary mb-3">Tambah Pelatihan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelatihans as $p)
                <tr>
                    <td>{{ $p->nama_pelatihan }}</td>
                    <td>{{ $p->tanggal_mulai }} - {{ $p->tanggal_selesai ?? '-' }}</td>
                    <td>{{ $p->deskripsi }}</td>
                    <td>{{ $p->lokasi }}</td>
                    <td>
                        <a href="{{ route('pelatihans.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pelatihans.destroy', $p->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
