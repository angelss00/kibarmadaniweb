@extends('layouts.master')

@section('title', 'Edit Berita')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Berita</h2>

    <form action="{{ route('beritas.admin.update', $berita->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
        </div>

        <div class="mb-3">
            <label>Konten</label>
            <textarea name="konten" id="editor" class="form-control editor" rows="8" required>{{ $berita->konten }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a href="{{ route('beritas.admin.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>

    </form>
</div>
@endsection



@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            // Update textarea setiap kali konten berubah
            editor.model.document.on('change:data', () => {
                document.querySelector('#editor').value = editor.getData();
            });

            // Initialize textarea dengan data awal (kosong)
            document.querySelector('#editor').value = editor.getData();
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endpush