@extends('layouts.app')

@section('title', 'Edit Menu')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Edit Menu</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:
