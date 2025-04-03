<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SPMB SMP DISDIKPORA Cianjur 2025') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{  asset('assets/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <style>
    /* Updated styles to match INAgov */
    :root {
        --primary-color: #4285F4;
        --primary-dark: #3367d6;
        --secondary-color: #112341;
        --light-bg: #f8f9fa;
        --text-dark: #333;
        --text-muted: #6c757d;
        --border-color: #e9ecef;
    }
    
    body {
        font-family: 'Inter', sans-serif;
        color: var(--text-dark);
        background-color: #f8f9fa;
    }
    
    /* Header styles */
    #page-topbar {
        background-color: #ffffff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        padding: 0;
    }
    
    .navbar-header {
        height: auto;
        padding: 0;
    }
    
    .navbar-brand-box {
        padding: 0;
        display: flex;
        align-items: center;
    }
    
    .logo {
        display: flex;
        align-items: center;
    }
    
    .logo img {
        height: 40px;
        max-width: 100%;
        object-fit: contain;
    }
    
    /* Ensure logo is visible on all screen sizes */
    @media (max-width: 991px) {
        .logo img {
            height: 36px; /* Slightly smaller on mobile */
        }
        
        .navbar-brand-box {
            padding: 0;
            margin: 0;
        }
    }
    
    .horizontal-menu {
        margin-left: 20px;
    }
    
    .horizontal-menu .nav {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .horizontal-menu .nav-item {
        margin: 0;
    }

    .horizontal-menu .nav-link {
        color: #333;
        padding: 1.5rem 1rem;
        font-weight: 500;
        transition: all 0.3s;
        border-bottom: 3px solid transparent;
    }

    .horizontal-menu .nav-link:hover,
    .horizontal-menu .nav-link.active {
        color: var(--secondary-color);
        background-color: transparent;
        border-bottom: 3px solid var(--primary-color);
        border-radius: 0;
    }
    
    .auth-buttons .btn {
        border-radius: 4px;
        padding: 0.5rem 1.25rem;
        font-weight: 500;
    }
    
    .btn-outline-dark {
        border-color: #e0e0e0;
    }
    
    .notification-banner {
        background-color: #E8F0FE;
        padding: 0.75rem 0;
        color: #333;
    }
    
    .notification-banner i {
        color: var(--primary-color);
        margin-right: 10px;
    }

    /* Mobile menu styles */
    .navbar-toggler {
        border: none;
        background: transparent;
        padding: 0.5rem;
        font-size: 1.5rem;
        color: #333;
        cursor: pointer;
    }
    
    #mobileNavbar {
        border-top: 1px solid #eee;
    }
    
    #mobileNavbar .nav-link {
        padding: 0.75rem 0;
        border-bottom: 1px solid #f5f5f5;
        font-weight: 500;
    }
    
    #mobileNavbar .nav-link.active {
        color: var(--primary-color);
    }

    @media (max-width: 991px) {
        .horizontal-menu {
            display: none;
        }
        
        .navbar-header {
            padding: 0.75rem 0;
        }
        
        /* Ensure logo is visible on mobile */
        .navbar-brand-box {
            margin-right: auto;
        }
    }
    
    /* Card styles */
    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    
    .card:hover {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .card-header {
        background-color: var(--secondary-color);
        color: white;
        border-radius: 8px 8px 0 0 !important;
        padding: 1rem 1.5rem;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    /* Button styles */
    .btn {
        font-weight: 500;
        padding: 0.5rem 1.25rem;
        border-radius: 4px;
        transition: all 0.3s;
    }
    
    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    
    .btn-primary:hover {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
        transform: translateY(-2px);
    }
    
    .btn-dark {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
    }
    
    .btn-dark:hover {
        background-color: #0a1a33;
        border-color: #0a1a33;
        transform: translateY(-2px);
    }
    
    /* Stats and icon styles */
    .stats-icon {
        width: 60px;
        height: 60px;
        font-size: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
    
    .avatar-lg {
        width: 60px;
        height: 60px;
        background-color: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
    
    /* School card styles */
    .school-card {
        transition: all 0.3s ease;
        border-radius: 8px;
        overflow: hidden;
    }

    .school-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    /* Footer styles */
    .footer-new {
        margin-top: 3rem;
    }
    
    .footer-main {
        background-color: var(--primary-color);
        color: white;
        padding: 3rem 0;
    }
    
    .footer-bottom {
        background-color: var(--primary-dark);
        color: rgba(255, 255, 255, 0.8);
        padding: 1rem 0;
        font-size: 0.9rem;
    }
    
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .footer-links li {
        margin-bottom: 0.75rem;
    }
    
    .footer-links a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: color 0.2s;
    }
    
    .footer-links a:hover {
        color: white;
        text-decoration: underline;
    }
    
    .footer-new h5 {
        color: white;
        margin-bottom: 1.25rem;
        font-weight: 600;
    }
    
    .footer-logo {
        height: 40px;
        margin-bottom: 1rem;
    }
    
    .social-links {
        display: flex;
        gap: 1rem;
    }
    
    .social-link {
        color: white;
        font-size: 1.25rem;
        transition: opacity 0.2s;
    }
    
    .social-link:hover {
        opacity: 0.8;
        color: white;
    }
    
    /* Section styles */
    .section-title {
        position: relative;
        margin-bottom: 1.5rem;
        font-weight: 600;
        color: var(--secondary-color);
        padding-bottom: 0.5rem;
    }
    
    .section-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background-color: var(--primary-color);
    }
    
    /* Utility classes */
    .bg-soft-primary {
        background-color: rgba(66, 133, 244, 0.15) !important;
    }
    
    .bg-soft-success {
        background-color: rgba(52, 195, 143, 0.15) !important;
    }
    
    .bg-soft-warning {
        background-color: rgba(241, 180, 76, 0.15) !important;
    }
    
    .bg-soft-info {
        background-color: rgba(80, 165, 241, 0.15) !important;
    }
    
    .text-primary {
        color: var(--primary-color) !important;
    }
    
    .bg-primary {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%) !important;
    }
    
    .bg-dark {
        background: linear-gradient(135deg, var(--secondary-color) 0%, #0a1a33 100%) !important;
    }
    </style>
    @stack('styles')
    <!-- Styles -->
    @livewireStyles
</head>
<body data-topbar="light" data-layout="horizontal">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <!-- Left side with toggle and logo -->
                    <div class="d-flex align-items-center">
                        <!-- Mobile menu toggle button (moved to left) -->
                        <button class="navbar-toggler d-lg-none me-2" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNavbar" aria-controls="mobileNavbar" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        
                        <!-- LOGO (always visible) -->
                        <div class="navbar-brand-box">
                            <a href="{{ route('myhome') }}" class="logo">
                                <img src="{{ asset('assets/images/logoppdb.png') }}" alt="PPDB Logo" height="40">
                            </a>
                        </div>

                        <!-- Horizontal Menu -->
                        <div class="horizontal-menu d-none d-lg-block ms-3">
                            <!-- Menu items remain the same -->
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('myhome') ? 'active' : '' }}" href="{{ route('myhome') }}">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('news*') ? 'active' : '' }}" href="{{ route('news') }}">Berita</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('schedule') ? 'active' : '' }}" href="{{ route('schedule') }}">Jadwal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('data.pendaftar') ? 'active' : '' }}" href="{{ route('data.pendaftar') }}">Data Pendaftar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('download') ? 'active' : '' }}" href="{{ route('download') }}">Download</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Right side with login button -->
                    <div class="d-flex align-items-center">
                        <div class="auth-buttons">
                            <a href="{{ route('login') }}" class="btn btn-primary">Login Akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Navigation Menu -->
        <div class="collapse navbar-collapse" id="mobileNavbar">
            <div class="container">
                <ul class="navbar-nav d-lg-none py-2">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('myhome') ? 'active' : '' }}" href="{{ route('myhome') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('news*') ? 'active' : '' }}" href="{{ route('news') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('schedule') ? 'active' : '' }}" href="{{ route('schedule') }}">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('data.pendaftar') ? 'active' : '' }}" href="{{ route('data.pendaftar') }}">Data Pendaftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('download') ? 'active' : '' }}" href="{{ route('download') }}">Download</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Notification Banner -->
        <div class="notification-banner">
            <div class="container">
                <div class="d-flex align-items-center">
                    <i class="mdi mdi-information-outline"></i>
                    <span>SPMB SMP DISDIKPORA Cianjur dalam proses perilisan terbatas. Kami sedang mengumpulkan umpan balik untuk memberikan kualitas terbaik saat dirilis resmi.</span>
                </div>
            </div>
        </div>
    </header>

    <div class="main-content">
        <div class="page-content" style="margin-top:40px; padding-bottom:10px">
            <div class="container">
                {{ $slot }}
            </div>
        </div>

        <!-- New Footer -->
        <footer class="footer-new">
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 mb-4 mb-md-0">
                            <h5>SPMB Disdikpora</h5>
                            <ul class="footer-links">
                                <li><a href="{{ route('myhome') }}">Beranda</a></li>
                                <li><a href="{{ route('news') }}">Berita</a></li>
                                <li><a href="{{ route('schedule') }}">Jadwal</a></li>
                                <li><a href="{{ route('data.pendaftar') }}">Data Pendaftar</a></li>
                                <li><a href="{{ route('download') }}">Download</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 mb-4 mb-md-0">
                            <h5>Hubungi Kami</h5>
                            <ul class="footer-links">
                                <li><a href="#">Kontak</a></li>
                                <li><a href="#">Bantuan</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 mb-4 mb-md-0">
                            <h5>Layanan Pendukung</h5>
                            <ul class="footer-links">
                                <li><a href="#">Panduan Pendaftaran</a></li>
                                <li><a href="#">Alur PPDB</a></li>
                                <li><a href="#">Syarat & Ketentuan</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex justify-content-md-end">
                                <div>
                                    <img src="{{ asset('assets/images/home/logodisdikporacianjur.png') }}" alt="SPMB Logo" class="footer-logo mb-3">
                                    <div class="social-links">
                                        <a href="#" class="social-link"><i class="mdi mdi-instagram"></i></a>
                                        <a href="#" class="social-link"><i class="mdi mdi-twitter"></i></a>
                                        <a href="#" class="social-link"><i class="mdi mdi-facebook"></i></a>
                                        <a href="#" class="social-link"><i class="mdi mdi-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-0">© {{ date('Y') }} SPMB Disdikpora Cianjur. Hak Cipta Dilindungi.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <p class="mb-0">Sistem Penerimaan Murid Baru Online Kabupaten Cianjur</p>
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

    <script src="{{ asset('assets/js/app.js') }}"></script>

    @livewireScripts
    @stack('scripts')
</body>
</html>
<style>
    /* New Footer Styles */
    .footer-new {
        margin-top: 0rem;
    }
    
    .footer-main {
        background-color: #4285F4;
        color: white;
        padding: 3rem 0;
    }
    
    .footer-bottom {
        background-color: #3367d6;
        color: rgba(255, 255, 255, 0.8);
        padding: 1rem 0;
        font-size: 0.9rem;
    }
    
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .footer-links li {
        margin-bottom: 0.75rem;
    }
    
    .footer-links a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: color 0.2s;
    }
    
    .footer-links a:hover {
        color: white;
        text-decoration: underline;
    }
    
    .footer-new h5 {
        color: white;
        margin-bottom: 1.25rem;
        font-weight: 600;
    }
    
    .footer-logo {
        height: 40px;
        margin-bottom: 1rem;
    
    }
    
    .social-links {
        display: flex;
        gap: 1rem;
    }
    
    .social-link {
        color: white;
        font-size: 1.25rem;
        transition: opacity 0.2s;
    }
    
    .social-link:hover {
        opacity: 0.8;
        color: white;
    }
</style>