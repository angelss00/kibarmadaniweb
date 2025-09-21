@extends('layouts.master')

@section('title', 'Edit Login Banner')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Login Banner</h3>

    <form action="{{ route('admin.login_banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Gambar</label><br>
            <img src="{{ asset('storage/'.$banner->image_path) }}" alt="preview" class="rounded mb-2" style="max-height:150px">
            <input type="file" name="image" class="form-control">
            <small class="text-muted">Kosongkan jika tidak mengganti gambar.</small>
        </div>

        <div class="mb-3">
            <label>Quote</label>
            <textarea name="quote" class="form-control" rows="4" required>{{ old('quote', $banner->quote) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Author (opsional)</label>
            <input type="text" name="author" class="form-control" value="{{ old('author', $banner->author) }}">
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Urutan</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $banner->sort_order) }}" min="0">
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-check mt-4">
                    <input type="checkbox" name="is_active" class="form-check-input" id="aktif"
                        {{ old('is_active', $banner->is_active) ? 'checked' : '' }}>
                    <label for="aktif" class="form-check-label">Aktif</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Update
        </button>
        <a href="{{ route('admin.login_banners.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection
