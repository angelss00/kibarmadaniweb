@extends('layouts.master')

@section('title', 'Edit Berita')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Edit Berita</h2>

    <form action="{{ route('beritas.admin.update', $berita->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
        </div>

        <div class="mb-3">
            <label>Konten</label>
            <textarea name="konten" class="form-control editor" rows="8" required>{{ $berita->konten }}</textarea>
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

@push('styles')
<!-- Trumbowyg CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trumbowyg/dist/ui/trumbowyg.min.css">
@endpush

@push('scripts')
<!-- jQuery sudah ada dari layout -->
<script src="https://cdn.jsdelivr.net/npm/trumbowyg/dist/trumbowyg.min.js"></script>
<script>
    $(document).ready(function() {
        $('.editor').trumbowyg({
            btns: [
                ['viewHTML'],
                ['undo', 'redo'],
                ['formatting'],
                ['strong', 'em', 'underline'],
                ['superscript', 'subscript'],
                ['link'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
            ]
        });
    });
</script>
@endpush