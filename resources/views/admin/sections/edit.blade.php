@extends('layouts.master')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-3">Edit Section</h2>

    <form method="POST" action="{{ route('sections.update', $section) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Type</label>
            <select name="type" class="form-select" required>
                <option value="keunggulan" @selected(old('type',$section->type)=='keunggulan')>Keunggulan</option>
                <option value="layanan" @selected(old('type',$section->type)=='layanan')>Layanan</option>
            </select>
            @error('type') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" value="{{ old('title',$section->title) }}" class="form-control" required>
            @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea id="description" name="description" rows="6" class="form-control">{{ old('description',$section->description) }}</textarea>
            @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a href="{{ route('admin.sections.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>
@endsection

{{-- CKEditor 5 --}}
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#description'), {
        toolbar: [
            'heading', '|', 'bold', 'italic', 'underline', 'link',
            'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'undo', 'redo'
        ],
        link: {
            addTargetToExternalLinks: true
        }
    }).catch(console.error);
</script>
@endpush