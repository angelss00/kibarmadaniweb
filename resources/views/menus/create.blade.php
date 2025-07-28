@extends('layouts.master')

@section('title', 'Tambah Menu')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Tambah Menu</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali input Anda:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menus.store') }}" method="POST">
