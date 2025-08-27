@extends('layoutss.medicio')

@section('content')
<section class="py-4" style="margin-top:100px;">
  <div class="container">

    <style>
      /* biar saat klik #visi/#misi/#makna gak ketutup header */
      .anchor { scroll-margin-top: 100px; } /* samain dengan margin-top di section */
      .card-clean { border:0; border-radius:12px; box-shadow:0 .24rem .7rem rgba(0,0,0,.06); }
      .card-head { display:flex; align-items:center; gap:.5rem; padding:.75rem 1rem; border-bottom:1px solid #eee; }
      .icon-dot { width:34px; height:34px; border-radius:50%; display:grid; place-items:center; color:#fff; font-size:1rem; }
      .icon-visi  { background:#0d6efd; }
      .icon-misi  { background:#198754; }
      .icon-makna { background:#f1c40f; color:#1f2d3d; }
      .card-body p, .card-body li { line-height:1.65; text-align:justify; }
      .block { margin-bottom:.75rem; }
    </style>

    {{-- VISI --}}
    <div id="visi" class="anchor block">
      <div class="card card-clean">
        <div class="card-head">
          <span class="icon-dot icon-visi"><i class="bi bi-bullseye"></i></span>
          <div>
            <h2 class="h5 mb-0">Visi</h2>
            <small class="text-muted">Gambaran tujuan utama</small>
          </div>
        </div>
        <div class="card-body">
          @forelse($sections->get('visi', collect()) as $item)
            {!! $item->description !!}
          @empty
            <p class="text-muted mb-0">Belum ada data Visi.</p>
          @endforelse
        </div>
      </div>
    </div>

    {{-- MISI --}}
    <div id="misi" class="anchor block">
      <div class="card card-clean">
        <div class="card-head">
          <span class="icon-dot icon-misi"><i class="bi bi-flag"></i></span>
          <div>
            <h2 class="h5 mb-0">Misi</h2>
            <small class="text-muted">Langkah strategis yang dilakukan</small>
          </div>
        </div>
        <div class="card-body">
          @forelse($sections->get('misi', collect()) as $item)
            {!! $item->description !!}
          @empty
            <p class="text-muted mb-0">Belum ada data Misi.</p>
          @endforelse
        </div>
      </div>
    </div>

    {{-- MAKNA --}}
    <div id="makna" class="anchor block">
      <div class="card card-clean">
        <div class="card-head">
          <span class="icon-dot icon-makna"><i class="bi bi-stars"></i></span>
          <div>
            <h2 class="h5 mb-0">Makna</h2>
            <small class="text-muted">Nilai & filosofi yang dipegang</small>
          </div>
        </div>
        <div class="card-body">
          @forelse($sections->get('makna', collect()) as $item)
            {!! $item->description !!}
          @empty
            <p class="text-muted mb-0">Belum ada data Makna.</p>
          @endforelse
        </div>
      </div>
    </div>

  </div>
</section>
@endsection
