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
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('users.create') }}" class="btn btn-primary">+ Tambah</a>

        {{-- (Opsional) Info jumlah data yang tampil --}}
        @if($users->total() > 0)
        <small class="text-muted">
            Menampilkan {{ $users->firstItem() }}–{{ $users->lastItem() }} dari {{ $users->total() }} data
        </small>
        @endif
    </div>

    {{-- Tabel Data User --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th width="60">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr class="text-center">
                    {{-- Nomor urut yang benar di setiap halaman --}}
                    <td>{{ $users->firstItem() + $loop->index }}</td>

                    <td class="text-start">{{ $user->name }}</td>
                    <td class="text-start">{{ $user->email }}</td>
                    <td>{{ $user->role ? ucfirst($user->role) : '-' }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Aksi">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus user ini?')">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data user.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="d-flex justify-content-end">
            {{ $users->onEachSide(1)->links() }}
            {{-- Jika pakai Bootstrap 5:
            {{ $users->onEachSide(1)->links('pagination::bootstrap-5') }} --}}
        </div>
    </div>
</div>
@endsection