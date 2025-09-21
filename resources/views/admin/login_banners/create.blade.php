@extends('layouts.master')

@section('title', 'Tambah Login Banner')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Login Banner</h3>

    <form action="{{ route('admin.login_banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- tampilkan error biar keliatan kalau ada yang salah --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
            </ul>
        </div>
        @endif

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Quote</label>
            <textarea name="quote" class="form-control" rows="4" required>{{ old('quote') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Author (opsional)</label>
            <input type="text" name="author" class="form-control" value="{{ old('author') }}">
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Urutan</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order',0) }}" min="0">
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-check mt-4">
                    <input type="checkbox" name="is_active" class="form-check-input" id="aktif" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label for="aktif" class="form-check-label">Aktif</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        <a href="{{ route('admin.login_banners.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
    </form>

</div>
@endsection