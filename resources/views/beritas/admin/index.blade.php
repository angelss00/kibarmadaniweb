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
                    <th width="180px" >Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($berita as $item)
                <tr class="text-center">
                    <td>{{ $item->id }}</td>
                    <td class="text-start">{{ $item->judul }}</td>
                    <td class="text-start">{{ $item->konten }}</td>
                    <td>
                        <div class="d-flex gap-1 justify-content-center">
                            <a href="{{ route('beritas.admin.edit', $berita) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('beritas.admin.destroy', $berita) }}" method="POST" onsubmit="return confirm('Yakin?')">
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

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $berita->links() }}
    </div>
</div>
@endsection
