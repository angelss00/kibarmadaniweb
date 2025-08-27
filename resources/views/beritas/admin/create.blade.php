@extends('layouts.master')

@section('title', 'Tambah Berita')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Berita</h3>
    <form action="{{ route('beritas.admin.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Konten</label>
            <textarea name="konten" id="editor" class="form-control" rows="8" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Simpan
        </button>
        <a href="{{ route('beritas.admin.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
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
