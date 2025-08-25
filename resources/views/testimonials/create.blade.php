@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Tambah Testimoni</h1>

        <form action="{{ route('testimonials.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Pengguna</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="testimony">Testimoni</label>
                <textarea name="testimony" id="testimony" class="form-control" required>{{ old('testimony') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Testimoni</button>
        </form>
    </div>
@endsection
