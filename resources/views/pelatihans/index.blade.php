@extends('layouts.master')

@section('title', 'Manajemen Pelatihan')

@section('content')
<div class="container-fluid">
    <h1 class="mb-3">Manajemen Pelatihan</h1>

    <div class="mb-3">
        <a href="{{ route('pelatihans.create') }}" class="btn btn-success me-2">+ Tambah Pelatihan</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th width="180px">Gambar</th>
                    <th>Nama Pelatihan</th>
                    <th width="200px">Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th>
                    <th width="180px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pelatihans as $p)
                <tr>
                    <td>
                        @if($p->gambar)
                        <img src="{{ asset('storage/' . $p->gambar) }}"
                             alt="{{ $p->nama_pelatihan }}"
                             width="100"
                             class="img-thumbnail";>
                        @else
                        -
                        @endif
                    </td>
                    <td class="text-start">{{ $p->nama_pelatihan }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d M Y') }}
                        @if($p->tanggal_selesai)
                        - {{ \Carbon\Carbon::parse($p->tanggal_selesai)->format('d M Y') }}
                        @endif
                    </td>
                    <td class="text-start">{!! Str::limit($p->deskripsi, 100) !!}</td>
                    <td class="text-start">{{ $p->lokasi }}</td>
                    <td>
                        <div class="d-flex gap-1 justify-content-center">
                            <a href="{{ route('pelatihans.edit', $p->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('pelatihans.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
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
                <tr>
                    <td colspan="6" class="text-center">Belum ada pelatihan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3 d-flex justify-content-center">
        {{ $pelatihans->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
