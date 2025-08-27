@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Manajemen Menu</h2>
    <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">+ Tambah</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th width="170px">Nama</th>
                <th>URL / Route</th>
                <th>Type</th>
                <th>Parent</th>
                <th>Urutan</th>
                <th width="180px">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->nama }}</td>
                <td>{{ $menu->url }}</td>
                <td>{{ ucfirst($menu->type) }}</td>
                <td>
                    {{-- kalau ada parent tampilkan namanya, kalau null tampil root --}}
                    {{ $menu->parent ? $menu->parent->nama : '-' }}
                </td>
                <td>{{ $menu->urutan }}</td>
                <td>
                    <div class="btn btn-group">
                        <a href="{{ route('menus.edit', $menu) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">
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
@endsection