<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | LPK KIBAR MADANI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('themes/minia/assets/images/logo.png') }}">

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('themes/minia/assets/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('themes/minia/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('themes/minia/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('themes/minia/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                {{-- LEFT: FORM LOGIN --}}
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5 text-center">
                                    <a href="{{ url('/') }}" class="d-block auth-logo">
                                        <img src="{{ asset('themes/minia/assets/images/logo.png') }}" alt="" height="28">
                                    </a>
                                </div>
                                <div class="auth-content my-auto">
                                    <div class="text-center">
                                        <h5 class="mb-0">Welcome Back !</h5>
                                        <p class="text-muted mt-2">Sign in to continue to LPK Kibar Madani.</p>
                                    </div>
                                    @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Password</label>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <a href="#" class="text-muted">Forgot password?</a>
                                                </div>
                                            </div>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                                                <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon">
                                                    <i class="mdi mdi-eye-outline"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                                    <label class="form-check-label" for="remember">Remember me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">© <script>
                                            document.write(new Date().getFullYear())
                                        </script>
                                        <i class="mdi mdi-heart text-danger"></i> by kibarmadani
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: SLIDER --}}
                <div class="col-xxl-9 col-lg-8 col-md-7 position-relative">
                    <div id="loginCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                        @if($banners->count() > 1)
                        <div class="carousel-indicators">
                            @foreach($banners as $i => $b)
                            <button type="button" data-bs-target="#loginCarousel" data-bs-slide-to="{{ $i }}"
                                class="{{ $i===0 ? 'active' : '' }}"
                                @if($i===0) aria-current="true" @endif
                                aria-label="Slide {{ $i+1 }}"></button>
                            @endforeach
                        </div>
                        @endif

                        <div class="carousel-inner h-100">
                            @foreach($banners as $i => $b)
                            <div class="carousel-item h-100 {{ $i===0 ? 'active' : '' }}">
                                <div class="h-100 w-100 d-flex align-items-center justify-content-center text-center text-white"
                                    style="background: url('{{ asset('storage/'.$b->image_path) }}') center/cover no-repeat;">
                                    {{-- Overlay --}}
                                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-50"></div>

                                    {{-- Text --}}
                                    <div class="position-relative px-4">
                                        <i class="bx bxs-quote-alt-left display-6 text-success"></i>
                                        <h4 class="mt-4 fw-medium lh-base text-white">“{{ $b->quote }}”</h4>
                                        <div class="mt-3">
                                            <h5 class="font-size-18 text-white">{{ $b->author ?? 'LPK KIBAR MADANI' }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @if($banners->count() > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#loginCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#loginCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('themes/minia/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/js/pages/pass-addon.init.js') }}"></script>
    <script src="{{ asset('themes/minia/assets/libs/pace-js/pace.min.js') }}"></script>
</body>

</html>