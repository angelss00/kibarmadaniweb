<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">

        <!-- Sidebar Menu -->
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title" data-key="t-main">Navigasi</li>

                <li>
                    <a href="{{ route('home') }}">
                        <i class="bx bx-home-circle"></i>
                        <span data-key="t-home">Home</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="bx bx-layout"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="bx bx-user"></i>
                        <span data-key="t-users">Manajemen Pengguna</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('kategoris.index') }}">
                        <i class="bx bx-category"></i>
                        <span data-key="t-kategori">Kategori</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('infos.index') }}">
                        <i class="bx bx-info-circle"></i>
                        <span data-key="t-info">Info</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('file_downloads.index') }}">
                        <i class="bx bx-download"></i>
                        <span data-key="t-downloads">File Download</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('galeris.index') }}">
                        <i class="bx bx-image-alt"></i>
                        <span data-key="t-gallery">Galeri</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('kontaks.index') }}">
                        <i class="bx bx-phone"></i>
                        <span data-key="t-kontak">Kontak</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('menus.index') }}">
                        <i class="bx bx-food-menu"></i>
                        <span data-key="t-menu">Menu</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('beritas.admin.index') }}">
                        <i class="bx bx-news"></i>
                        <span>Berita</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pendaftarans.index') }}">
                        <i class="bx bx-group"></i>
                        <span>Manajemen Pendaftaran</span>
                    </a>

                </li>
                <li>
                    <a href="{{ route('pelatihans.index') }}">
                        <i class="bx bx-calendar"></i>
                        <span>Jadwal Pelatihan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.sections.index') }}">
                        <i class="bx bx-rocket"></i>
                        <span>Halaman Statis</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('testimonials.index') }}">
                        <i class="bx bx-comment-detail"></i>
                        <span>Testimonial</span>
                    </a>
                </li>


                <li class="menu-title mt-2" data-key="t-other">Lainnya</li>

                <li>
                    <a href="{{route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bx bx-power-off"></i>
                        <span data-key="t-logout">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <!-- Sidebar Dynamic Menu -->
        @if(isset($mainMenus) && $mainMenus->count())
        @foreach($mainMenus as $menu)
        @if($menu->children->count())
        <div class="list-group-item">
            <strong>{{ $menu->title }}</strong>
            <div class="list-group ps-3">
                @foreach($menu->children as $child)
                <a href="{{ url($child->url) }}" class="list-group-item list-group-item-action">
                    {{ $child->title }}
                </a>
                @endforeach
            </div>
        </div>
        @else
        <a href="{{ url($menu->url) }}" class="list-group-item list-group-item-action">
            {{ $menu->title }}
        </a>
        @endif
        @endforeach
        @endif

    </div>
</div>
<!-- Left Sidebar End -->