@extends('layouts.master')

@section('title', 'Edit Pelatihan')

@section('content')
<div class="container-fluid">
    <h1>Edit Pelatihan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pelatihans.update', $pelatihan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Pelatihan</label>
            <input type="text" name="nama_pelatihan" class="form-control" value="{{ old('nama_pelatihan', $pelatihan->nama_pelatihan) }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $pelatihan->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', $pelatihan->tanggal_mulai) }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai', $pelatihan->tanggal_selesai) }}">
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $pelatihan->lokasi) }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pelatihans.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
