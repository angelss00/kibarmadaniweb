@extends('layouts.master')

@section('title', 'Edit Kategori Galeri')

@section('content')
<div class="container">
    <h1>Edit Kategori Galeri</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('galerry_categories.update', $galerry_category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" name="name" id="name" 
                   class="form-control" 
                   value="{{ old('name', $galerry_category->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $galerry_category->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('galerry_categories.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
