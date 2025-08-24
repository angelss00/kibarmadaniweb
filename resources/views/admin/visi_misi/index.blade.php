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
                        <th width="180px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visiMisi as $item)
                        <tr class="text-center">
                            <td class="text-start">{!! Str::limit(strip_tags($item->visi), 50) !!}</td>
                            <td class="text-start">{!! Str::limit(strip_tags($item->misi), 50) !!}</td>
                            <td class="text-start">{!! Str::limit(strip_tags($item->makna_kibar), 50) !!}</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('admin.visi-misi.edit', $item) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.visi-misi.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
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
    @endif
</div>
@endsection
