@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Tambah Menu</h2>

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Menu</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label>URL / Route / Section</label>
            <input type="text" name="url" class="form-control" value="{{ old('url') }}"
                placeholder="contoh: hero (untuk scroll), galeri (untuk route), https://google.com (untuk url)" required>
        </div>

        <div class="mb-3">
            <label>Tipe</label>
            <select name="type" class="form-control" required>
                <option value="scroll" {{ old('type') == 'scroll' ? 'selected' : '' }}>Scroll</option>
                <option value="route" {{ old('type') == 'route' ? 'selected' : '' }}>Route</option>
                <option value="url" {{ old('type') == 'url' ? 'selected' : '' }}>URL</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Urutan Menu</label>
            <input type="number" name="urutan" class="form-control" value="{{ old('urutan') }}" required>
        </div>

        <div class="mb-3">
            <label>Parent Menu (Opsional)</label>
            <select name="parent_id" class="form-control">
                <option value="">-- Pilih Parent Menu --</option>
                @foreach($parentMenus as $parent)
                    <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                        {{ $parent->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Simpan
        </button>
        <a href="{{ route('menus.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection
