<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SPMB Disdikpora Cianjur') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <style>
   .horizontal-menu .nav {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

.horizontal-menu .nav-item {
    margin: 0 10px;
}

.horizontal-menu .nav-link {
    color: rgba(0, 0, 0, 0.7);
    padding: 0.5rem 0.75rem;
    font-weight: 500;
    transition: all 0.3s;
}

.horizontal-menu .nav-link:hover,
.horizontal-menu .nav-link.active {
    color: #fff;
}

@media (max-width: 991px) {
    .horizontal-menu {
        display: none;
    }
}
.stats-icon {
    width: 60px;
    height: 60px;
    font-size: 24px;
}
.school-card {
    transition: all 0.3s ease;
    border-radius: 8px;
}

.school-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.avatar-lg {
    width: 60px;
    height: 60px;
    background-color: rgba(255,255,255,0.2);
}

.bg-dark {
    background: linear-gradient(135deg, #2b2b2b 0%, #1a1a1a 100%);
}
    </style>
    @stack('styles')
    <!-- Styles -->
    @livewireStyles
</head>
<body data-topbar="light" data-layout="horizontal">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{ route('myhome') }}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logoppdb.png') }}" alt="logo" height="40">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logoppdb.png') }}" alt="logo" height="40">
                            </span>
                        </a>

                        <a href="{{ route('myhome') }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logoppdb.png') }}" alt="logo" height="40">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logoppdb.png') }}" alt="logo" height="40">
                            </span>
                        </a>
                    </div>

                    <!-- Horizontal Menu -->
                    <div class="horizontal-menu d-none d-lg-block">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('myhome') }}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Informasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Jadwal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sekolah</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Bantuan</a>
                            </li>
                        </ul>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="dropdown d-none d-sm-inline-block me-2">
                            <button type="button" class="btn header-item" id="mode-setting-btn">
                                <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                                <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                            </button>
                        </div>

                        <div class="auth-buttons">
                            @auth
                                <a href="{{ route('dashboard') }}" class="btn btn-sm btn-dark">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-dark me-2">Login</a>
                                <a href="{{ route('register') }}" class="btn btn-sm btn-dark">Daftar</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="main-content">
        <div class="page-content" style="margin-top:40px;">
            <div class="container">
                {{ $slot }}
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        {{ date('Y') }} © SPMB Disdikpora Cianjur.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Sistem Penerimaan Murid Baru Online Kabupaten Cianjur
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <!-- pace js -->
    <script src="{{ asset('assets/libs/pace-js/pace.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/app.js') }}"></script>

    @livewireScripts
    @stack('scripts')
</body>
</html>