@extends('layouts.master')

@section('title', 'Data Kontak')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Kontak</h3>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th style="width: 100px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kontaks as $index => $kontak)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kontak->name }}</td>
                <td>{{ $kontak->email }}</td>
                <td>{{ $kontak->message }}</td>
                <td>
                            <form action="{{ route('kontaks.destroy', $kontak) }}" method="POST" onsubmit="return confirm('Yakin?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data kontak.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection