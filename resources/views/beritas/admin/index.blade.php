@extends('layouts.master')

@section('title', 'Manajemen Berita')

@section('content')
<div class="container">
    <h4 class="mb-3">Manajemen Berita</h4>

    <div class="mb-3">
        <a href="{{ route('beritas.admin.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($berita as $item)
                <tr class="text-center">
                    <td>{{ $item->id }}</td>
                    <td class="text-start">{{ $item->judul }}</td>
                    <td class="text-start">{{ $item->konten }}</td>
                    <td>
                        <a href="{{ route('beritas.admin.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('beritas.admin.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $berita->links() }}
    </div>
</div>
@endsection
