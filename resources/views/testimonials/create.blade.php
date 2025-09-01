@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Testimoni</h1>

    <form action="{{ route('testimonials.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Pengguna</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="testimony" class="form-label">Testimoni</label>
            <textarea name="testimony" id="testimony" class="form-control" rows="5" required>{{ old('testimony') }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>
@endsection