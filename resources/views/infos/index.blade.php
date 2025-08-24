@extends('layouts.master')

@section('content')
<div class="container">
  <h1 class="h4 mb-3">Manajemen Slider (Infos)</h1>

  {{-- Flash --}}
  @if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  <div class="mb-3">
    <a href="{{ route('infos.create') }}" class="btn btn-primary btn-sm">+ Tambah Data</a>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
      <thead class="table-light">
        <tr>
          <th style="width:70px;">Gambar</th>
          <th>Judul</th>
          <th>Slider</th>
          <th>Urutan</th>
          <th>Status</th>
          <th>Jadwal</th>
          <th style="width:160px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($infos as $info)
          <tr>
            <td>
              @if($info->gambar)
                <img src="{{ Storage::disk('public')->url($info->gambar) }}"
                     class="img-thumbnail"
                     style="width:60px;height:40px;object-fit:cover;">
              @endif
            </td>
            <td>
              <strong>{{ $info->judul }}</strong>
              @if($info->subtitle)
                <div class="text-muted small">{{ $info->subtitle }}</div>
              @endif
            </td>
            <td><code>{{ $info->slider_name }}</code></td>
            <td>{{ $info->sort_order }}</td>
            <td>
              @if($info->is_active)
                <span class="badge bg-success">Aktif</span>
              @else
                <span class="badge bg-secondary">Nonaktif</span>
              @endif
            </td>
            <td class="small">
              {{ optional($info->start_at)->format('d M Y H:i') ?? '—' }}
              –
              {{ optional($info->end_at)->format('d M Y H:i') ?? '—' }}
            </td>
            <td>
              <a href="{{ route('infos.edit', $info) }}" class="btn btn-sm btn-warning">Edit</a>
              <a href="{{ route('infos.delete', $info) }}" class="btn btn-sm btn-danger">Hapus</a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center text-muted">Belum ada data</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
