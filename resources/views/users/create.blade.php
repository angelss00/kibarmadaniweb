@extends('layouts.master')

@section('title', 'Tambah User')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah User</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ups!</strong> Ada beberapa masalah dengan inputan Anda:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" class="form-select" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="dosen">Users</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" name="password" class="form-control" required minlength="6">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Ulangi Kata Sandi</label>
            <input type="password" name="password_confirmation" class="form-control" required minlength="6">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-success me-2">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>
@endsection
