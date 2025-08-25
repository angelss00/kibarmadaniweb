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
                    <th width="180px">Catatan</th>
                    <th>Tanggal Pendaftaran</th> <!-- Kolom untuk tanggal pendaftaran -->
                    <th width="180px">Aksi</th>
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
                    <td>{{ $p->created_at->format('d M Y H:i') }}</td> <!-- Tampilkan tanggal pendaftaran -->
                    <td>
                        <div class="btn btn-group">
                            <form action="{{ route('pendaftarans.destroy', $p->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                            <a href="{{ route('pendaftarans.show', $p->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i> Lihat
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada pendaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection