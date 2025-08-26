@extends('layouts.master')

@section('title', 'Manajemen User')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Manajemen User</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tombol Tambah --}}
    <div class="mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>

    {{-- Tabel Data User --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th width="20px">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="180px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- ISI TABEL TIDAK DIUBAH --}}
                @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>
                        <div class="btn btn-group">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @if($users->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data user.</td>
                </tr>
                @endif
            </tbody>
        </table>
        <td>{{ $users->firstItem() + $index }}</td>

        <!-- Pagination -->
        <div class="d-flex justify-content-end">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>

        <!-- Custom CSS untuk pagination -->
        <style>
            .pagination .page-link {
                padding: 0.75rem 1.25rem;
                /* buat tombol lebih besar */
                font-size: 1rem;
                /* ukuran font lebih besar */
            }

            .pagination .page-item.active .page-link {
                background-color: #0d6efd;
                /* warna aktif biru */
                border-color: #0d6efd;
            }

            .pagination .page-item .page-link:hover {
                background-color: #0b5ed7;
                border-color: #0a58ca;
                color: #fff;
            }
        </style>

    </div>
</div>
@endsection