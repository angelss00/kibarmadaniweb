@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Testimoni</h1>

    <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Pengguna</label>
            <input type="text" name="name" id="name" class="form-control"
                value="{{ old('name', $testimonial->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="testimony" class="form-label">Testimoni</label>
            <textarea name="testimony" id="testimony" class="form-control" rows="5" required>{{ old('testimony', $testimonial->testimony) }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Update
            </button>
            <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>
@endsection