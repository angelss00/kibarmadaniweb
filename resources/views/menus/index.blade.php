@extends('layouts.master')

@section('title', 'Data Menu')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Menu</h3>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('menus.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Nama Menu</th>
                    <th>Deskripsi</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->description }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Hapus menu ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection