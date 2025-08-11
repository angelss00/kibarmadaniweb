@extends('layouts.master')

@section('title', 'Manajemen Visi Misi')

@section('content')
<div class="container-fluid">
    <h1>Manajemen Visi Misi</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($visiMisi->isEmpty())
        <p>Belum ada data visi misi.</p>
        <a href="{{ route('admin.visi-misi.create') }}" class="btn btn-primary">Tambah Visi Misi</a>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Visi</th>
                <th>Misi</th>
                <th>Makna Kibar Madani</th>
                <th>Upload Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visiMisi as $item)
            <tr>
                <td>{{ Str::limit($item->visi, 50) }}</td>
                <td>{{ Str::limit($item->misi, 50) }}</td>
                <td>{{ Str::limit($item->makna_kibar, 50) }}</td>
                <td>
                    {{-- Form upload gambar --}}
                    <form action="{{ route('admin.visi-misi.upload-image', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" required>
                        <button type="submit" class="btn btn-sm btn-primary mt-1">Upload</button>
                    </form>

                    {{-- Tampilkan thumbnail gambar yang sudah diupload --}}
                    @if($item->images->count())
                        <div class="mt-2 d-flex gap-2 flex-wrap">
                            @foreach($item->images as $img)
                                <img src="{{ asset('storage/visi_misi_images/' . $img->image_path) }}" alt="Gambar" style="max-width: 80px; border-radius: 4px;">
                            @endforeach
                        </div>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.visi-misi.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.visi-misi.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
