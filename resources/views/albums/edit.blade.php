@extends('layouts.master')
@section('title', 'Edit Album')

@section('content')
<div class="container-fluid">
    <!-- Page Title -->
    <div class="row mb-3">
        <div class="col-12">
            <h4 class="mb-0">Edit Album</h4>
        </div>
    </div>

    <!-- Form Edit Album -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('albums.update', $album->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Album -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Nama Album <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('title') is-invalid @enderror"
                                id="title"
                                name="title"
                                value="{{ old('title', $album->title) }}"
                                required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                id="description"
                                name="description"
                                rows="4">{{ old('description', $album->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('albums.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
</div>
@endsection
