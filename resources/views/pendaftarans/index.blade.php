@extends('layouts.master')

@section('title', 'Manajemen Pendaftaran')

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Manajemen Pendaftaran</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Pelatihan</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pendaftarans as $p)
            <tr>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->telepon }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->pelatihan->nama_pelatihan ?? '-' }}</td>
                <td>{{ $p->catatan }}</td>
                <td>
                    <form action="{{ route('pendaftarans.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center">Belum ada pendaftar.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
