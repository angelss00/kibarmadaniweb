@extends('layouts.master')

@section('title', 'Data Kontak')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Kontak</h3>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal Kirim</th> <!-- Kolom untuk Tanggal -->
                <th style="width: 180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kontaks as $index => $kontak)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kontak->name }}</td>
                <td>{{ $kontak->email }}</td>
                <td>{{ $kontak->message }}</td>
                <td>
                    <!-- Menampilkan Tanggal Pengiriman -->
                    {{ $kontak->created_at->format('d M Y H:i') }}
                </td>
                <td>
                    <!-- Tombol Hapus -->

                    <div class="btn btn-group">
                        <form action="{{ route('kontaks.destroy', $kontak) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                        <a href="{{ route('kontaks.show', $kontak->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i> Lihat
                        </a>
                    </div>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada data kontak.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection