@extends('layouts.master')

@section('title', 'Manajemen Visi Misi')

@section('content')
<div class="container-fluid">
    <h1 class="mb-3">Manajemen Visi Misi</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($visiMisi->isEmpty())
        <p>Belum ada data visi misi.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Visi</th>
                        <th>Misi</th>
                        <th>Makna Kibar Madani</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visiMisi as $item)
                    <tr class="text-center">
                        <td class="text-start">{{ Str::limit($item->visi, 50) }}</td>
                        <td class="text-start">{{ Str::limit($item->misi, 50) }}</td>
                        <td class="text-start">{{ Str::limit($item->makna_kibar, 50) }}</td>
                        <td>
                            <a href="{{ route('admin.visi-misi.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.visi-misi.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
