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
                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus menu ini?')">
                            <i class="fa fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection