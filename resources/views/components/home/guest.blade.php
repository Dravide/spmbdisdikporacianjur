<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} - {{ config('app.name', 'SPMB SMP DISDIKPORA Cianjur 2025') }}</title>
    <meta name="title" content="{{ $title }} - {{ config('app.name', 'SPMB SMP DISDIKPORA Cianjur 2025') }}">
<meta name="description" content="SPMB SMP Disdikpora Cianjur Tahun 2025 memberikan kesempatan bagi calon siswa untuk mendaftar melalui jalur domisili, prestasi, afirmasi, dan mutasi. ">
<meta name="keywords" content="SPMB SMP Disdikpora Cianjur 2025, pendaftaran SMP Cianjur, penerimaan murid baru Cianjur 2025, jalur prestasi SMP Cianjur, jalur afirmasi SMP Cianjur, pendaftaran SMP jalur domisili Cianjur, SPMB SMP Cianjur 2025.">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="1 days">
<meta name="author" content="DISDIKPORA CIANJUR">
<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="https://spmbsmpdisdikporacianjur.com/" />
<meta property="og:title" content="Beranda - SPMB SMP DISDIKPORA Cianjur 2025" />
<meta property="og:description" content="SPMB SMP Disdikpora Cianjur Tahun 2025 memberikan kesempatan bagi calon siswa untuk mendaftar melalui jalur domisili, prestasi, afirmasi, dan mutasi." />
<meta property="og:image" content="{{ asset('assets-fe/banner/spmb.png') }}" />

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="https://spmbsmpdisdikporacianjur.com/" />
<meta property="twitter:title" content="Beranda - SPMB SMP DISDIKPORA Cianjur 2025" />
<meta property="twitter:description" content="SPMB SMP Disdikpora Cianjur Tahun 2025 memberikan kesempatan bagi calon siswa untuk mendaftar melalui jalur domisili, prestasi, afirmasi, dan mutasi." />
<meta property="twitter:image" content="{{ asset('assets-fe/banner/spmb.png') }}" />
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
    
    /* Header styles - Updated for transparency and blur */
    #page-topbar {
        background-color: rgba(255, 255, 255, 0.8); /* Transparent white background */
        backdrop-filter: blur(5px); /* Blur effect */
        -webkit-backdrop-filter: blur(10px); /* For Safari support */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        padding: 0;
        position: fixed; /* Make header fixed */
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000; /* Ensure header stays on top */
    }
    
    /* Adjust main content to account for fixed header */
    .main-content {
        padding-top: 70px; /* Adjust this value based on your header height */
    }
    
    /* Notification banner - Updated for transparency */
    .notification-banner {
        background-color: rgba(232, 240, 254, 0.9); /* Semi-transparent background */
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        padding: 0.75rem 0;
        color: #333;
    }

    body {
        font-family: 'Inter', sans-serif;
        color: var(--text-dark);
        background-color: #f8f9fa;
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
                            <div class="horizontal-menu d-none d-lg-block ms-4">
                                <!-- Menu items remain the same -->
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->routeIs('myhome') ? 'active' : '' }}" href="{{ route('myhome') }}">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-smart-home"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 8.71l-5.333 -4.148a2.666 2.666 0 0 0 -3.274 0l-5.334 4.148a2.665 2.665 0 0 0 -1.029 2.105v7.2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-7.2c0 -.823 -.38 -1.6 -1.03 -2.105" /><path d="M16 15c-2.21 1.333 -5.792 1.333 -8 0" /></svg>
                                            Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        
                                        <a class="nav-link {{ request()->routeIs('news*') ? 'active' : '' }}" href="{{ route('news') }}">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                            Berita</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->routeIs('schedule') ? 'active' : '' }}" href="{{ route('schedule') }}">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>
                                            Jadwal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->routeIs('alur.pendaftaran') ? 'active' : '' }}" href="{{ route('alur.pendaftaran') }}">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-timeline-event"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 20m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M10 20h-6" /><path d="M14 20h6" /><path d="M12 15l-2 -2h-3a1 1 0 0 1 -1 -1v-8a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-3l-2 2z" /></svg>
                                            Alur Pendaftaran</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->routeIs('data.pendaftar') ? 'active' : '' }}" href="{{ route('data.pendaftar') }}">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-list-details"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 5h8" /><path d="M13 9h5" /><path d="M13 15h8" /><path d="M13 19h5" /><path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /></svg>
                                            Data Pendaftar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->routeIs('download') ? 'active' : '' }}" href="{{ route('download') }}">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-down-to-arc"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3v12" /><path d="M16 11l-4 4l-4 -4" /><path d="M3 12a9 9 0 0 0 18 0" /></svg>
                                            Unduh Berkas</a>
                                    </li>
                            
                                </ul>
                            </div>
                    </div>

                    <!-- Right side with login button -->
                    <div class="d-flex align-items-center">
                        <div class="auth-buttons">
                            <a href="#" class="btn btn-primary">Login Akun</a>
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
                                <a class="nav-link {{ request()->routeIs('myhome') ? 'active' : '' }}" href="{{ route('myhome') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-smart-home me-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 8.71l-5.333 -4.148a2.666 2.666 0 0 0 -3.274 0l-5.334 4.148a2.665 2.665 0 0 0 -1.029 2.105v7.2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-7.2c0 -.823 -.38 -1.6 -1.03 -2.105" /><path d="M16 15c-2.21 1.333 -5.792 1.333 -8 0" /></svg>
                                    Beranda
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('news*') ? 'active' : '' }}" href="{{ route('news') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-news me-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                    Berita
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('schedule') ? 'active' : '' }}" href="{{ route('schedule') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week me-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>
                                    Jadwal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('alur.pendaftaran') ? 'active' : '' }}" href="{{ route('alur.pendaftaran') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-timeline-event me-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 20m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M10 20h-6" /><path d="M14 20h6" /><path d="M12 15l-2 -2h-3a1 1 0 0 1 -1 -1v-8a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-3l-2 2z" /></svg>
                                    Alur Pendaftaran
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('data.pendaftar') ? 'active' : '' }}" href="{{ route('data.pendaftar') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-list-details me-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 5h8" /><path d="M13 9h5" /><path d="M13 15h8" /><path d="M13 19h5" /><path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /></svg>
                                    Data Pendaftar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('download') ? 'active' : '' }}" href="{{ route('download') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-down-to-arc me-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3v12" /><path d="M16 11l-4 4l-4 -4" /><path d="M3 12a9 9 0 0 0 18 0" /></svg>
                                    Unduh Berkas
                                </a>
                            </li>
                         

                        </ul>
                    </div>
                </div>
        
        <!-- Notification Banner -->
        <div class="notification-banner">
            <div class="container">
                <div class="d-flex align-items-center">
                    <i class="mdi mdi-information-outline"></i>
                    <span>SPMB SMP DISDIKPORA Cianjur dalam proses perilisan terbatas. Data yang kami tampilkan adalah <strong>Data Pendaftar Tahun 2024/2025</strong>.</span>
                </div>
            </div>
        </div>
    </header>

    <div class="main-content">
        <div class="page-content" style="margin-top:40px;padding-bottom:10px;padding-top: 10px;">
            <div class="container">
                {{ $slot }}
            </div>
        </div>

        <!-- New Footer -->
        <footer class="footer-new">
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <!-- Logo and description column -->
                        <div class="col-md-4 mb-4 mb-md-0">
                            <img src="{{ asset('assets/images/logoppdb.png') }}" alt="PPDB Logo" class="footer-logo mb-3">
                            <p class="text-white-50 mb-3">
                                Sistem Penerimaan Murid Baru Online Kabupaten Cianjur untuk memudahkan proses pendaftaran sekolah secara transparan dan efisien.
                            </p>
                            <div class="social-links">
                                <a href="https://www.instagram.com/disdikpora.cianjur/" class="social-link"><i class="mdi mdi-instagram"></i></a>
                                <a href="https://disdikpora.cianjurkab.go.id/#" class="social-link"><i class="mdi mdi-web"></i></a>
                                <a href="https://www.facebook.com/disdikporacianjurkab/" class="social-link"><i class="mdi mdi-facebook"></i></a>
                                <a href="https://www.youtube.com/@disdikpora.cianjur/" class="social-link"><i class="mdi mdi-youtube"></i></a>
                            </div>
                        </div>
                        
                        <!-- Hot links column -->
                        <div class="col-md-2 mb-4 mb-md-0">
                            <h5 class="text-white">Layanan</h5>
                            <ul class="footer-links">
                                <li><a href="{{ route('alur.pendaftaran') }}">Alur Pendaftaran</a></li>
                                <li><a href="{{ route('download') }}">Unduh Berkas</a></li>
                                <li><a href="{{ route('news') }}">Berita</a></li>
                                <li><a href="{{ route('schedule') }}">Jadwal</a></li>
                    
                            </ul>
                        </div>
                        
                        <!-- More info column -->
                        <div class="col-md-3 mb-4 mb-md-0">
                            <h5 class="text-white">Informasi</h5>
                            <ul class="footer-links">
                                <li><a href="#">Data Pendaftar</a></li>
                                <li><a href="#">Login Akun</a></li>
                                <li><a href="#">Registrasi Akun</a></li>
                                <li><a href="#">Lupa Password</a></li>
                            </ul>
                        </div>
                        
                        <!-- Customer care column -->
                        <div class="col-md-3">
                            <h5 class="text-white">Link Terkait</h5>
                            <ul class="footer-links">
                                <li><a href="https://cianjurkab.go.id/">PEMKAB Cianjur</a></li>
                                <li><a href="https://disdikpora.cianjurkab.go.id/welcome">DISDIKPORA Cianjur</a></li>
                                <li><a href="https://pip.kemendikdasmen.go.id/home_v1">Cek Penerima PIP</a></li>
                                <li><a href="https://nisn.data.kemdikbud.go.id/">Pencarian NISN</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <p class="mb-0">Copyright © 2025 DISDIKPORA CIANJUR - V.8.2.1</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="d-flex justify-content-md-end">
                                <a href="#" class="social-link me-3"><i class="mdi mdi-instagram"></i></a>
                                <a href="#" class="social-link me-3"><i class="mdi mdi-twitter"></i></a>
                                <a href="#" class="social-link"><i class="mdi mdi-facebook"></i></a>
                            </div>
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
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4SSZSVW1RD"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4SSZSVW1RD');
</script>
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
    
    /* Enhanced Mobile Navigation */
    #mobileNavbar .nav-link {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        border-bottom: 1px solid #f5f5f5;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    #mobileNavbar .nav-link.active {
        color: var(--primary-color);
        background-color: rgba(66, 133, 244, 0.08);
        border-left: 3px solid var(--primary-color);
    }
    
    #mobileNavbar .nav-link:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }
    
    #mobileNavbar .navbar-nav {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        background-color: white;
        margin: 0.5rem 0 1rem;
    }
</style>