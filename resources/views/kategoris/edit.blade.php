@extends('layouts.master')

@section('title', 'Edit Kategori')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Edit Kategori</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan:</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
    @endif

    <form action="{{ route('kategoris.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" name="nama" class="form-control" id="nama"
                value="{{ old('nama', $kategori->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi"
                rows="3">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    let editorInstance;
    ClassicEditor
        .create(document.querySelector('#deskripsi'))
        .then(editor => {
            editorInstance = editor;

            // Update textarea sebelum submit
            document.getElementById('kategoriForm').addEventListener('submit', function(e) {
                document.getElementById('deskripsi').value = editor.getData();
            });
        })
        .catch(error => console.error(error));
</script>
@endpush