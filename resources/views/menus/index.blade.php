@extends('layouts.app')

@section('title', 'Data Menu')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Menu</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">+ Tambah Menu</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama Menu</th>
                <th>Deskripsi</th>
                <th style="width: 150px;">Aksi</th>
            </t
