@extends('layouts.master')

@section('title', 'Tambah Pelatihan')

@section('content')
<div class="container-fluid">
    <h1 class="mb-3">Tambah Pelatihan</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pelatihans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Pelatihan</label>
                    <input type="text" name="nama_pelatihan" class="form-control" value="{{ old('nama_pelatihan') }}" required>
                </div>

                <div class="mb-3">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*" id="gambarInput">
                    <div class="mt-2">
                        {{-- Preview: jika sudah ada di database, tampilkan --}}
                        @if(isset($pelatihan) && $pelatihan->gambar)
                        <img id="previewGambar" src="{{ asset('storage/' . $pelatihan->gambar) }}"
                            alt="Preview Gambar" width="150">
                        @else
                        <img id="previewGambar" src="#" alt="Preview Gambar" width="150" style="display: none;">
                        @endif
                    </div>
                </div>


                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control text-start" rows="4">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('pelatihans.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi'))
        .catch(error => {
            console.error(error);
        });

    // Preview gambar sebelum upload
    document.getElementById('gambarInput').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById('previewGambar');
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    });
</script>
@endpush
@endsection