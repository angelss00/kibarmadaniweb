@extends('layouts.master')

@section('title', 'Edit Visi Misi')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            <h4>Edit Visi Misi</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12"> <!-- full width -->
            <div class="card">
                <div class="card-body">

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

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="{{ route('admin.visi-misi.index') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i> Batal
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ['visi', 'misi', 'makna_kibar'].forEach(id => {
        ClassicEditor.create(document.querySelector('#' + id))
            .catch(error => console.error(error));
    });
</script>
@endpush