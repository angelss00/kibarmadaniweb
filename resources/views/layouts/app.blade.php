<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi') - STMIK EL RAHMA</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Bootstrap 5 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Tambahan CSS jika ada --}}
    @stack('styles')

</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="#"> Admin Panel Website LPK Kibar Madani</a>
        {{-- Bisa ditambahkan menu jika diperlukan --}}
        <div class="ms-auto d-flex align-items-center">
            @auth
            <span class="navbar-text text-white me-3">
                {{ Auth::user()->name }}
            </span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
            </form>
            @endauth
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

            {{-- Sidebar --}}
            <div class="col-md-3 bg-light min-vh-100 p-3">
                {{-- User Info --}}
                {{-- <div class="mb-4">
<strong> Halo, {{ Auth::user()->name ?? 'Guest' }}</strong>
                <form action="{{ route('logout') }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                </form>
            </div> --}}
            @include('layouts.menu')

        </div>

        {{-- Main Content --}}
        <div class="col-md-9 p-4">
            @yield('content')
        </div>

    </div>
    </div>

    {{-- Footer --}}
    <footer class="text-center py-4 text-muted">
        <small>&copy; {{ date('Y') }} STMIK El Rahma Yogyakarta</small>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Tambahan JS jika ada --}}
    @stack('scripts')
</body>

</html>