<!-- resources/views/infos/edit.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Info</h2>

    <form action="{{ route('infos.update', $info->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" 
                   value="{{ old('judul', $info->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" 
                        {{ old('kategori_id', $info->kategori_id) == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control" id="isi" name="isi" rows="6" required>
                {{ old('isi', $info->isi) }}
            </textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (Opsional)</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
            @if($info->gambar)
                <img src="{{ Storage::url($info->gambar) }}" width="100" alt="Gambar Info">
            @endif
        </div>

        <button type="submit" class="btn btn-success mt-2">
            <i class="fa fa-save"></i> Update
        </button>
        <a href="{{ route('infos.index') }}" class="btn btn-secondary mt-2">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#isi'))
        .catch(error => console.error(error));
</script>
@endpush
