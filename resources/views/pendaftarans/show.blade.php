@extends('layouts.master')

@section('title', 'Detail Pendaftaran')

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Detail Pendaftaran</h2>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $pendaftaran->nama }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $pendaftaran->email }}</p>
            <p><strong>Telepon:</strong> {{ $pendaftaran->telepon }}</p>
            <p><strong>Alamat:</strong> {{ $pendaftaran->alamat }}</p>
            <p><strong>Pelatihan:</strong> {{ $pendaftaran->pelatihan->nama_pelatihan ?? 'Tidak ada pelatihan' }}</p>
            <p><strong>Catatan:</strong> {{ $pendaftaran->catatan }}</p>
            <p><strong>Tanggal Pendaftaran:</strong> {{ $pendaftaran->created_at->format('d M Y H:i') }}</p> <!-- Tanggal Pendaftaran -->

            <div class="mt-3">
                <a href="{{ route('pendaftarans.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
