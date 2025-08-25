<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">
    <a href="{{ url('/') }}" class="logo me-auto">
      <img src="{{ asset('themes/Medicio/assets/img/logo.png') }}" alt="Logo">
    </a>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        @foreach($menus as $menu)
        <li>
          <a
            class="nav-link {{ $menu->type === 'scroll' ? 'scrollto' : '' }}"
            href="
                                @if($menu->type === 'route')
                                    {{ route($menu->url) }}
                                @elseif($menu->type === 'scroll')
                                    {{ url('/') }}#{{ $menu->url }}
                                @else
                                    {{ $menu->url }}
                                @endif
                            ">
            {{ $menu->nama }}
          </a>
        </li>
        @endforeach
      </ul>

      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>

  </div>
</header>