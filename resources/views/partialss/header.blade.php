<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">
    <a href="{{ url('/') }}" class="logo me-auto">
      <img src="{{ asset('themes/Medicio/assets/img/logo.png') }}" alt="Logo">
    </a>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        @php
          // Builder href
          $makeHref = function($item) {
            // Visi/Misi/Makna -> /visi-misi#anchor
            if (in_array($item->type, ['visi','misi','makna'])) {
              return route('visi.misi') . '#' . ltrim($item->url, '#');
            }
            // Scroll di homepage -> /#section
            if ($item->type === 'scroll' && $item->url) {
              return url('/') . '#' . ltrim($item->url, '#');
            }
            // Route bernama (kalau kamu pakai type 'route')
            if ($item->type === 'route' && $item->url) {
              return route($item->url);
            }
            // URL biasa
            return $item->url ?: url('/');
          };

          // Perlu smooth scroll?
          $needScroll = fn($item) => in_array($item->type, ['visi','misi','makna','scroll']);
        @endphp

        @foreach($menus as $menu)
          @if($menu->children->count())
            <li class="dropdown">
              <a href="#">
                <span>{{ $menu->nama }}</span> <i class="bi bi-chevron-down"></i>
              </a>
              <ul>
                @foreach($menu->children as $child)
                  <li>
                    <a
                      class="{{ $needScroll($child) ? 'scrollto' : '' }}"
                      href="{{ $makeHref($child) }}"
                    >
                      {{ $child->nama }}
                    </a>
                  </li>
                @endforeach
              </ul>
            </li>
          @else
            <li>
              <a
                class="nav-link {{ $needScroll($menu) ? 'scrollto' : '' }}"
                href="{{ $makeHref($menu) }}"
              >
                {{ $menu->nama }}
              </a>
            </li>
          @endif
        @endforeach
      </ul>

      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </div>
</header>
