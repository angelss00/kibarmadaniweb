@extends('layoutss.medicio')

@section('title', 'Form Pendaftaran')

@section('content')
<main class="container" style="margin-top:150px;">
    <h2 class="text-center mb-4">Form Pendaftaran Pelatihan</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pendaftarans.store') }}" method="POST" class="card p-4 shadow">
        @csrf
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>No. Telepon</label>
            <input type="text" name="telepon" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label>Pilih Pelatihan</label>
            <select name="pelatihan_id" class="form-control" required>
                <option value="">-- Pilih --</option>
                @foreach($pelatihans as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_pelatihan }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control" rows="2"></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">Daftar</button>
    </form>
</main>
@endsection
