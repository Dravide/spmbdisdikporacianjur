<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <title>{{ $title }} - Penerimaan Peserta Didik Baru Dinas Pendididkan Pemuda dan Olahraga Kab. Cianjur Tahun
        Pelajaran
        2024/2025</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="_token" content="{{ csrf_token() }}">
    <meta content="Penerimaan Peserta Didik Baru Dinas Pendidikan Pemuda dan Olahraga Kab. Cianjur Tahun 2023"
          name="description"/>
    <meta content="Orion Creative Network" name="author"/>
    <!-- App favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Stack -->
    @stack('css')

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/ppdb-custom.css') }}" id="app-style" rel="stylesheet" type="text/css"/>

    @vite('resources/js/app.js')
</head>

<body data-topbar="light" data-layout="horizontal">

<!-- Begin page -->
<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box text-center">
                    <a href="{{ route('pendaftaran.beranda') }}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logoppdb.png') }}" alt="logo-sm-dark" height="22">
                            </span>
                        <span class="logo-lg">
                                <img src="{{ asset('assets/images/logoppdb.png') }}" alt="logo-dark" height="40">
                            </span>
                    </a>


                    <a href="{{ route('pendaftaran.beranda') }}" class="logo logo-light">

                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logoppdb.png') }}" alt="logo-sm-light" height="22">
                            </span>
                        <span class="logo-lg">
                                <img src="{{ asset('assets/images/logoppdb.png') }}" alt="logo-light" height="40">
                            </span>
                    </a>
                </div>
            </div>
            <div class="d-flex">
                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="ri-fullscreen-line"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user"
                             src="https://placehold.co/200x200/png?text=Profile"
                             alt="Header Avatar">
                        <span
                            class="d-none d-xl-inline-block ms-1">{{ Auth::user()->username }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('cpdb.cetak_akun') }}" target="_blank"><i
                                class="ri-download-2-line align-middle me-1"></i> Kartu Akun</a>
                        <hr class="my-1">
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i
                                class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content pt-4">
            <div class="container-fluid">


                @if(Auth::user()->dataPendaftar == null)
                    @if(Route::is('beranda'))
                    <x-Pendaftaran.selamat-datang/>
                    @else
                    <x-Pendaftaran.selamat-datang2/>
                    @endif
                
                
                @else
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Pendaftaran Calon Peserta Didik
                                    Baru {{ Auth::user()->dataPendaftar->jenis == 'dalam' ? 'Dalam Kab. Cianjur' : 'Luar Kab. Cianjur' }}</h4>
                                <div class="page-title-right">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row mb-2">
                        <x-Pendaftaran.nav/>

                        <div class="col-xl-9">
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="btn-toolbar" role="toolbar">
                                    <h4 class="my-1">{{ $title }}</h4>
                                </div>

                                <div class="btn-toolbar justify-content-md-end" role="toolbar">


                                    <div class="btn-group ms-2 mb-3">
                                        <x-Pendaftaran.konfirmasi id="{{ Auth::user()->username }}"
                                                                  jalur="{{ Auth::user()->dataPendaftar->id_jalur }}"/>
                                    </div>

                                </div>
                            </div>
                            <x-pendaftaran.batasusia/>
                            {{ $slot }}
                            <!-- end card -->
                        </div>
                    </div>
                    <!-- end row -->
                @endif
            </div> <!-- container-fluid -->
        </div>

    </div>

    <!-- End Page-content -->

    <footer class=" footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">Copyright <strong>Orion Creative Network</strong>
                    {{ date('Y') }} © All Right Reserved
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        <strong>Build Dev-V.7.6-SIMANJUR 2024</strong> - Dinas Pendidikan Pemuda dan Olahraga Kab.
                        Cianjur
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->
<!-- END layout-wrapper -->
<!-- right offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel"
     style="width: 550px;">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Preview Berkas</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="data text-center"></div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
@stack('js')
<script src="{{ asset('assets/js/dash.js') }}"></script>

</body>
</html>
