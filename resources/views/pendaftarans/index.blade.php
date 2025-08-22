@extends('layouts.master')

@section('title', 'Manajemen Pendaftaran')

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Manajemen Pendaftaran</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
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
                         <div class="d-flex gap-1 justify-content-center">
                            <form action="{{ route('pendaftarans.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center">Belum ada pendaftar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
