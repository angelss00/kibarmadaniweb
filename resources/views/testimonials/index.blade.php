@extends('layouts.master')

@section('title', 'Manajemen Testimoni')

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Manajemen Testimoni</h2>

    <div class="mb-3">
        <a href="{{ route('testimonials.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>Nama Pengguna</th>
                    <th>Testimoni</th>

                    <th>Tanggal</th> <!-- Kolom untuk tanggal testimoni -->
                    <th width="180px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->testimony }}</td>
                    <td>{{ $testimonial->created_at->format('d M Y H:i') }}</td> <!-- Tampilkan tanggal testimoni -->
                    <td>
                        <div class="btn btn-group">
                            <a href="{{ route('testimonials.edit', $testimonial) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('testimonials.destroy', $testimonial) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada testimoni.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection