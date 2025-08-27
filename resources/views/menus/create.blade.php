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
            <label>URL / Section</label>
            <input type="text" name="url" class="form-control" value="{{ old('url') }}"
                   placeholder="contoh: /tentang-kami, /jadwal-pelatihan, https://google.com" required>
        </div>

        <div class="mb-3">
            <label>Tipe</label>
            <select name="type" class="form-control" required>
                <option value="scroll" {{ old('type') == 'scroll' ? 'selected' : '' }}>Scroll</option>
                <option value="url" {{ old('type') == 'url' ? 'selected' : '' }}>URL</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Parent (opsional)</label>
            <select name="parent_id" class="form-select">
                <option value="">— Tanpa Parent (Root Menu) —</option>
                @foreach($parentOptions as $opt)
                    <option value="{{ $opt->id }}" {{ old('parent_id') == $opt->id ? 'selected' : '' }}>
                        {{ $opt->nama }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">
                Pilih "Tentang Kami" kalau mau bikin submenu Jadwal Pelatihan di bawahnya
            </small>
        </div>

        <div class="mb-3">
            <label class="form-label">Urutan</label>
            <input type="number" name="urutan" class="form-control" value="{{ old('urutan',0) }}" min="0">
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
