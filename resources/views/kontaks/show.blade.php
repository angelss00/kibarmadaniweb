@extends('layouts.master')

@section('title', 'Detail Kontak')

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Detail Kontak</h2>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $kontak->name }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $kontak->email }}</p>
            <p><strong>Telepon:</strong> {{ $kontak->telepon }}</p>
            <p><strong>Pesan:</strong> {{ $kontak->message }}</p>
            <p><strong>Tanggal Pengiriman:</strong> {{ $kontak->created_at->format('d M Y H:i') }}</p> <!-- Tanggal Pengiriman -->

            <div class="mt-3">
                <a href="{{ route('kontaks.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
