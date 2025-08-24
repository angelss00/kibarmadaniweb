@extends('layouts.master')

@section('content')
<div class="container" style="max-width: 1000px;">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h5 mb-0">Edit Slide</h1>
    <a href="{{ route('infos.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
  @endif

  <form action="{{ route('infos.update', $info) }}" method="POST" enctype="multipart/form-data" class="card shadow-sm">
    @csrf @method('PUT')
    <div class="card-body">
      <div class="row g-4">
        {{-- Kiri --}}
        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Nama Slider</label>
            <input type="text" name="slider_name" class="form-control" value="{{ old('slider_name', $info->slider_name) }}">
          </div>

          <div class="mb-3">
            <label class="form-label">Judul <span class="text-danger">*</span></label>
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                   value="{{ old('judul', $info->judul) }}">
            @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Subjudul</label>
            <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $info->subtitle) }}">
          </div>

          <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori_id" class="form-select">
              <option value="">— Pilih Kategori —</option>
              @foreach($kategoris as $k)
                <option value="{{ $k->id }}" @selected(old('kategori_id', $info->kategori_id)==$k->id)>{{ $k->nama ?? 'Kategori #'.$k->id }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Konten</label>
            <textarea name="isi" rows="5" class="form-control">{{ old('isi', $info->isi) }}</textarea>
          </div>
        </div>

        {{-- Kanan --}}
        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Gambar (jpg/png/webp, maks 2MB)</label>
            <input type="file" name="gambar" class="form-control" accept="image/*" onchange="previewImg(this)">
            <div class="mt-2">
              @if($info->gambar)
                <img id="imgPreview" src="{{ asset('storage/'.$info->gambar) }}"
                     style="max-width:100%;height:220px;object-fit:cover" class="rounded border">
              @else
                <img id="imgPreview" src="" style="display:none;max-width:100%;height:220px;object-fit:cover" class="rounded border">
              @endif
            </div>
          </div>

          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label">Link URL</label>
              <input type="url" name="link_url" class="form-control" value="{{ old('link_url', $info->link_url) }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Teks Tombol</label>
              <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $info->button_text) }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Urutan</label>
              <input type="number" min="0" name="sort_order" class="form-control" value="{{ old('sort_order', $info->sort_order) }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Mulai Tayang</label>
              <input type="datetime-local" name="start_at" class="form-control"
                     value="{{ old('start_at', optional($info->start_at)->format('Y-m-d\TH:i')) }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Selesai Tayang</label>
              <input type="datetime-local" name="end_at" class="form-control"
                     value="{{ old('end_at', optional($info->end_at)->format('Y-m-d\TH:i')) }}">
            </div>
          </div>

          <div class="form-check form-switch mt-3">
            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                   {{ old('is_active', $info->is_active) ? 'checked' : '' }}>
            <label class="form-check-label">Aktif</label>
          </div>
        </div>
      </div>
    </div>

    <div class="card-footer d-flex justify-content-end gap-2">
      <a href="{{ route('infos.index') }}" class="btn btn-light">Batal</a>
      <button class="btn btn-primary">Update</button>
    </div>
  </form>
</div>

<script>
function previewImg(input){
  const img = document.getElementById('imgPreview');
  if (input.files && input.files[0]) {
    img.src = URL.createObjectURL(input.files[0]);
    img.style.display = 'block';
  }
}
</script>
@endsection
