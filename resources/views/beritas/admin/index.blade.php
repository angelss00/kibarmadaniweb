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
        <table class="table table-bordered table-striped mb-0">
            <thead class="table-dark text-center">
                <tr>
                    <th style="width:70px;">No</th>
                    <th>Judul</th>
                    <th>Slug</th>
                    <th style="width:200px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($berita as $item)
                    <tr class="text-center">
                        {{-- No (support paginate & non-paginate) --}}
                        <td>
                            @php
                                $no = method_exists($berita, 'firstItem')
                                      ? ($berita->firstItem() + $loop->index)
                                      : $loop->iteration;
                            @endphp
                            {{ $no }}
                        </td>

                        <td class="text-start">{{ $item->judul }}</td>
                        <td class="text-start">{{ $item->slug ?? '-' }}</td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Aksi">
                                <a href="{{ route('beritas.admin.edit', ['berita' => $item]) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('beritas.admin.destroy', ['berita' => $item]) }}"
                                      method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center">Tidak ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
</div>
@endsection
