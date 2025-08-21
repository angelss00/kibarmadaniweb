@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Visi Misi</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.visi-misi.update', $visiMisi->id) }}" method="POST">
        @csrf
        @method('PUT') 
        <div class="mb-3">
            <label for="visi" class="form-label">Visi</label>
            <textarea name="visi" id="visi" class="form-control" rows="3" required>{{ old('visi', $visiMisi->visi) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="misi" class="form-label">Misi</label>
            <textarea name="misi" id="misi" class="form-control" rows="5" required>{{ old('misi', $visiMisi->misi) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="makna_kibar" class="form-label">Makna Kibar Madani</label>
            <textarea name="makna_kibar" id="makna_kibar" class="form-control" rows="3" required>{{ old('makna_kibar', $visiMisi->makna_kibar) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.visi-misi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
