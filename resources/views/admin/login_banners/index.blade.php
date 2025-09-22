@extends('layouts.master')

@section('title', 'Manajemen Login Banner')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Login Banner</h3>

    {{-- Tombol Tambah --}}
    <div class="mb-3 d-flex gap-2">
        <a href="{{ route('admin.login_banners.create') }}" class="btn btn-primary"> + Tambah</a>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Preview</th>
                    <th>Quote</th>
                    <th>Author</th>
                    <th>Urutan</th>
                    <th>Status</th>
                    <th width="200px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($banners as $banner)
                <tr class="text-center align-middle">
                    <td>{{ $loop->iteration + ($banners->firstItem() - 1) }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$banner->image_path) }}"
                             style="width:80px;height:60px;object-fit:cover" class="rounded">
                    </td>
                    <td class="text-start">{{ Str::limit($banner->quote, 60) }}</td>
                    <td>{{ $banner->author ?? '-' }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.login_banners.reorder') }}" class="d-flex justify-content-center gap-1">
                            @csrf
                            <input type="number" name="orders[{{ $banner->id }}]" 
                                   value="{{ $banner->sort_order }}" min="0" 
                                   class="form-control form-control-sm" style="width:70px">
                            <button class="btn btn-sm btn-outline-primary">OK</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.login_banners.toggle',$banner) }}">
                            @csrf @method('PATCH')
                            <button class="btn btn-sm {{ $banner->is_active?'btn-success':'btn-secondary' }}">
                                {{ $banner->is_active ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('admin.login_banners.edit',$banner) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.login_banners.destroy',$banner) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus banner ini?')">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada banner</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $banners->links() }}
    </div>
</div>
@endsection
