@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Edit Testimoni</h1>

        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Pengguna</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
            </div>
            <div class="form-group">
                <label for="testimony">Testimoni</label>
                <textarea name="testimony" id="testimony" class="form-control" required>{{ old('testimony', $testimonial->testimony) }}</textarea>
            </div>
            <div class="form-group">
                <label for="photo">Foto (opsional)</label>
                <input type="file" name="photo" id="photo" class="form-control">
                @if($testimonial->photo)
                    <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="Foto Testimoni" width="100">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Perbarui Testimoni</button>
        </form>
    </div>
@endsection
