@extends('layouts.master')

@section('title', 'File Download')

@section('content')
    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">File Download</h5>
            <a href="{{ route('file_downloads.create') }}" class="btn btn-sm btn-primary">+ Tambah File</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="table-dark">
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
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $file->title }}</td>
                                <td>{{ $file->category->name ?? '-' }}</td>
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

