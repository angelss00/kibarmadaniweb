@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Info</h2>

    <form action="{{ route('infos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control" id="isi" name="isi" required style="min-height:200px;"></textarea>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Simpan
        </button>
        <a href="{{ route('infos.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#isi'))
        .then(editor => {
            editor.ui.view.editable.element.style.minHeight = '200px';
            // pastikan textarea asli selalu update
            editor.model.document.on('change:data', () => {
                document.querySelector('#isi').value = editor.getData();
            });
        })
        .catch(error => console.error(error));
</script>
@endpush
