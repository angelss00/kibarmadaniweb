@extends('layouts.master')

@section('title', 'Tambah Menu')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Tambah Menu</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali input Anda:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Menu</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('menus.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
