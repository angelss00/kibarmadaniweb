@extends('layouts.master')

@section('content')
@php
$currentType = $type ?? request('type');
@endphp

<div class="container py-4">
    <h2 class="fw-bold mb-1">Manajemen Section</h2>
    <div class="text-muted small mb-3">Kelola Keunggulan & Layanan dari satu tempat.</div>

    {{-- Tombol Tambah (kiri, biru, di atas filter) --}}
    <div class="mb-3">
        <a href="{{ route('sections.create', ['type' => $currentType]) }}" class="btn btn-primary"> + Tambah</a>
    </div>

    {{-- Filter Type --}}
    <form class="row g-2 mb-3" method="GET" action="{{ route('sections.index') }}">
        <div class="col-auto">
            <select name="type" class="form-select" onchange="this.form.submit()">
                <option value="">Semua Type</option>
                <option value="keunggulan" {{ $currentType==='keunggulan' ? 'selected' : '' }}>Keunggulan</option>
                <option value="layanan" {{ $currentType==='layanan' ? 'selected' : '' }}>Layanan</option>
            </select>
        </div>
        @if(!empty($currentType))
        <div class="col-auto">
            <a href="{{ route('sections.index') }}" class="btn btn-outline-secondary">
                <i class="fa-solid fa-rotate-left me-1"></i> Reset
            </a>
        </div>
        @endif
    </form>

    {{-- Flash --}}
    @if(session('success'))
    <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Judul</th>
                    <th style="width:140px;">Type</th>
                    <th>Deskripsi</th>
                    <th style="width:90px;">Urutan</th>
                    <th style="width:180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sections as $item)
                <tr>
                    <td class="fw-semibold">{{ $item->title }}</td>
                    <td>
                        <span class="badge {{ $item->type==='keunggulan' ? 'text-bg-primary' : 'text-bg-info' }}">
                            {{ ucfirst($item->type) }}
                        </span>
                    </td>
                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->description), 120) }}</td>
                    <td>{{ $item->order ?? '—' }}</td>
                    <td>
                        <div class="btn btn-group">
                            <a href="{{ route('admin.sections.edit', $item) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.sections.destroy', $item) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-5">
                        Belum ada data. Klik
                        <a href="{{ route('sections.create', ['type' => $currentType]) }}">Tambah</a>
                        untuk membuat.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection