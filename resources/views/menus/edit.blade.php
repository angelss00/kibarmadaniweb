@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Edit Menu</h2>

    <form action="{{ route('menus.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Menu</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $menu->nama) }}" required>
        </div>

        <div class="mb-3">
            <label>URL / Route / Section</label>
            <input type="text" name="url" class="form-control" value="{{ old('url', $menu->url) }}"
                placeholder="contoh: hero (untuk scroll), galeri (untuk route), https://google.com (untuk url)" required>
        </div>

        <div class="mb-3">
            <label>Tipe</label>
            <select name="type" class="form-control" required>
                <option value="scroll" {{ old('type', $menu->type) == 'scroll' ? 'selected' : '' }}>Scroll</option>
                <option value="url" {{ old('type', $menu->type) == 'url' ? 'selected' : '' }}>URL</option>
            </select>
        </div>


        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Update
        </button>
        <a href="{{ route('menus.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection