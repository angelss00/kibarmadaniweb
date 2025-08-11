@extends('layouts.master')

@section('title', 'Tambah Visi Misi')

@section('content')
<div class="container-fluid">
    <h1>Tambah Visi Misi</h1>

    <form action="{{ route('admin.visi-misi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="visi" class="form-label">Visi</label>
            <textarea class="form-control" id="visi" name="visi" rows="3" required>{{ old('visi') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="misi" class="form-label">Misi</label>
            <textarea class="form-control" id="misi" name="misi" rows="3" required>{{ old('misi') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="makna_kibar" class="form-label">Makna Kibar Madani</label>
            <textarea class="form-control" id="makna_kibar" name="makna_kibar" rows="3" required>{{ old('makna_kibar') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.visi-misi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
