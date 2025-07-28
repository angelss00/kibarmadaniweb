@extends('layouts.master')

@section('title', 'Edit Kontak')

@section('content')
<div class="container mt-4">
    <h3>Edit Kontak</h3>

    <form action="{{ route('kontaks.update', $kontak->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $kontak->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $kontak->email) }}" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Pesan</label>
            <textarea name="message" class="form-control" rows="4" required>{{ old('message', $kontak->message) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('kontaks.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
