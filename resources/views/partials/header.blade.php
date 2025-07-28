<header id="page-topbar">
    <div class="navbar-header d-flex justify-content-between align-items-center px-3">

        <!-- LEFT: Logo + Sidebar Toggle -->
        <div class="d-flex align-items-center">

            <!-- LOGO -->
            <div class="navbar-brand-box d-flex align-items-center">
                <a href="{{ url('/') }}" class="logo logo-light d-flex align-items-center">
                    <img src="{{ asset('themes/minia/assets/images/logo.png') }}" alt="logo" height="20" class="me-2">
                </a>
            </div>

            <!-- Toggle Sidebar -->
            <button type="button" class="btn btn-sm px-5 font-size-16 header-item"
                id="vertical-menu-btn">
                <i class="bx bx-menu"></i>
            </button>


            <!-- Search -->
            <form class="app-search d-none d-lg-block ms-3">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn btn-primary position-absolute end-0 top-0 mt-1 me-2">
                        <i class="bx bx-search-alt"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- RIGHT: Icons -->
        <div class="d-flex align-items-center">

            <!-- Language -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect"
                    id="lang-dropdown" data-bs-toggle="dropdown">
                </button>
            </div>

            <!-- Dark Mode -->
            <button type="button" class="btn header-item noti-icon waves-effect">
                <i class="bx bx-moon"></i>
            </button>

            <!-- Grid Menu -->
            <button type="button" class="btn header-item noti-icon waves-effect">
                <i class="bx bx-grid-alt"></i>
            </button>

            <!-- Notification -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    data-bs-toggle="dropdown">
                    <i class="bx bx-bell bx-tada"></i>
                    <span class="badge bg-danger rounded-pill">5</span>
                </button>
            </div>

            <!-- Settings -->
            <button type="button" class="btn header-item noti-icon waves-effect">
                <i class="bx bx-cog bx-spin"></i>
            </button>

            <!-- User Dropdown -->
            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect d-flex align-items-center"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user me-2"
                        src="{{ asset('themes/minia/assets/images/users/avatar-1.jpg') }}"
                        alt="User Avatar">
                    <span class="d-none d-xl-inline-block">{{ Auth::user()->name ?? 'Admin' }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block ms-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> Profil</a>
                    <a class="dropdown-item" href="#"><i class="bx bx-cog font-size-16 align-middle me-1"></i> Pengaturan</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item"><i class="bx bx-power-off font-size-16 align-middle me-1"></i> Keluar</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>