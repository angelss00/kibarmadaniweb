@extends('layouts.master')

@section('title', 'File Download')

@section('content')
<div class="container">
    <h4>Daftar Info</h4>
    <a href="{{ route('file_downloads.create') }}" class="btn btn-primary mb-3">+ Tambah</a>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th style="width: 40px;">No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Ukuran</th>
                <th>Status</th>
                <th>Unduhan</th>
                <th style="width: 120px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($downloads as $index => $file)
            <tr class="text-center">
                <td>{{ $index + 1 }}</td>
                <td class="text-start">{{ $file->title }}</td>
                <td>{{ $file->kategori->nama ?? '-' }}</td>
                <td>{{ number_format($file->file_size / 1024, 2) }} KB</td>
                <td>{{ ucfirst($file->status) }}</td>
                <td>{{ $file->download_count }}</td>
                <td>
                    <a href="{{ route('file_downloads.edit', $file->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('file_downloads.destroy', $file->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus file ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada file.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
</div>
@endsection