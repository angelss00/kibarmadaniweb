<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.master') 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')
<div class="container-fluid py-4">
    <h1 class="mb-4">Dashboard</h1>
    <h3 class="mb-3">Selamat Datang</h3>
    <div class="row g-3">

        <!-- Card Pendaftar -->
        <div class="col-lg-6">
            <div class="card border-start border-4 border-primary shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title text-primary mb-1">Pendaftar</h5>
                        <h2 class="mb-0">{{ $jumlahPendaftar }}</h2>
                    </div>
                    <i class="bi bi-person-plus" style="font-size: 3rem; color: #0d6efd;"></i>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('pendaftarans.index') }}" class="text-decoration-none">Lihat Semua &raquo;</a>
                </div>
            </div>
        </div>

        <!-- Card Kontak -->
        <div class="col-lg-6">
            <div class="card border-start border-4 border-success shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title text-success mb-1">Kontak Masuk</h5>
                        <h2 class="mb-0">{{ $jumlahKontak }}</h2>
                    </div>
                    <i class="bi bi-envelope" style="font-size: 3rem; color: #198754;"></i>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('kontaks.index') }}" class="text-decoration-none">Lihat Semua &raquo;</a>
                </div>
            </div>
        </div>

        <!-- Card Pelatihan -->
        <div class="col-lg-6">
            <div class="card border-start border-4 border-warning shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title text-warning mb-1">Jadwal Pelatihan</h5>
                        <h2 class="mb-0">{{ $jumlahPelatihan }}</h2>
                    </div>
                    <i class="bi bi-envelope" style="font-size: 3rem; color: #b88415ff;"></i>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('pelatihans.index') }}" class="text-decoration-none">Lihat Semua &raquo;</a>
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
