<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- title -->
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta content="Penerimaan Peserta Didik Baru Dinas Pendidikan Pemuda dan Olahraga Kab. Cianjur Tahun 2023"
          name="description"/>
    <meta content="Orion Creative Network" name="author"/>

    <!-- theme favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- third party plugins -->
    <link rel="stylesheet" href="{{ asset('assets-fe/css/vendor.min.css') }}" type="text/css"/>
    <!-- theme css -->
    <link rel="stylesheet" href="{{ asset('assets-fe/css/theme.min.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets-fe/css/app.css') }}" type="text/css"/>

    @stack('css')
</head>

<body>
<div class="header-5">
    <header>
        <nav class="navbar navbar-expand-lg topnav-menu navbar-light zindex-10">
            <div class="container">
                <a class="navbar-brand logo" href="/">
                    <img src="{{asset('assets-fe/images/logo.png')}}" height="50" class="align-top logo-dark" alt=""/>
                    <img src="{{asset('assets-fe/images/logo-light.png')}}" height="60" class="align-top logo-light"
                         alt=""/>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#topnav-menu-content"
                        aria-controls="topnav-menu-content" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav align-items-lg-center d-flex me-auto">

                    </ul>


                    <ul class="navbar-nav align-items-lg-center ">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('myhome') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('datasekolah.*') ? 'active' : '' }}"
                               href="{{ route('datasekolah') }}">Daftar Sekolah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('unduh') }}">Unduh</a>
                        </li>

                        <li class="nav-item ms-2">
                            <a class="btn btn-info btn-sm" href="{{ route('login') }}"> Masuk</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="btn btn-outline-teal btn-sm" href="{{ route('register') }}">Pendaftaran</a>
                        </li>

                    </ul>


                </div>
            </div>
        </nav>

    </header>

    @if(request()->routeIs('cek'))
        <section class="hero-2">
            <div class="container py-3 py-sm-6">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h1 class="hero-title mt-0">PPDB SMP DISIKPORA Cianjur 2024</h1>
                    </div>
                    <div class="col-lg-5">
                        <p class="fs-17 ps-0 ps-sm-4">Penerimaan Peserta Didik Baru Tingkat SMP Dinas Pendidikan Pemuda
                            dan
                            Olahraga Kabupaten Cianjur Tahun 2024 </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="slider pt-3 pt-sm-5 mt-5">
                            <!-- slider -->
                            <div class="form-container">
                                <div class="row align-items-top px-3 px-sm-5">
                                    <div class="col-lg-12">
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="row g-2 align-items-end">

                                                            <form method="post" action="{{ route('indexHasil') }}"
                                                                  style="display:contents">
                                                                @csrf
                                                                <div class="col-sm-auto">
                                                                    <label class=""
                                                                           for="username">No. Pendaftaran</label>
                                                                    <div class="form-control-with-hint me-sm-2">
                                                                        <input type="text" id="username"
                                                                               class="form-control"
                                                                               placeholder="PPDBXXXXX28937"
                                                                               name="username" required>
                                                                        <span
                                                                            class="form-control-feedback uil uil-location-pin-alt fs-18"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-auto">
                                                                    <label for="example-datetime-local-input" class="">Tanggal
                                                                        Lahir</label>
                                                                    <div class="col-md-10">
                                                                        <input class="form-control" type="date"
                                                                               placeholder="Tanggal Lahir"
                                                                               id="example-datetime-local-input"
                                                                               name="tglLahir" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-auto">
                                                                    <button type="submit" id=""
                                                                            class="btn btn-orange my-1 my-sm-0">
                                                                        Cek Kelulusan
                                                                    </button>
                                                                </div>
                                                            </form>


                                                        </div>
                                                    </div>
                                                    <div class="col-sm-auto text-sm-end pt-2 pt-sm-0">
                                                        <div class="navigations">
                                                            <button class="btn btn-info swiper-custom-prev">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24"
                                                                     viewBox="0 0 24 24" fill="none" stroke="white"
                                                                     stroke-width="1.5" stroke-linecap="round"
                                                                     stroke-linejoin="round"
                                                                     class="feather feather-chevron-left">
                                                                    <polyline points="15 18 9 12 15 6"></polyline>
                                                                </svg>
                                                            </button>
                                                            <button class="btn btn-info swiper-custom-next">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24"
                                                                     viewBox="0 0 24 24" fill="none" stroke="white"
                                                                     stroke-width="1.5" stroke-linecap="round"
                                                                     stroke-linejoin="round"
                                                                     class="feather feather-chevron-right">
                                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-container rounded-2" id="coworking-slider" data-toggle="swiper"
                                 data-aos="fade-up"
                                 data-swiper='{"slidesPerView":1,"spaceBetween":0,"loop":true,"roundLengths":true, "autoplay": {"delay": 5000},  "navigation": {"nextEl": ".swiper-custom-next", "prevEl": ".swiper-custom-prev"}}'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slider-item"
                                             style="background-image: url('{{ asset('assets-fe/images/hero/coworking2.jpg') }}');"></div>
                                    </div>
                                    {{--                                <div class="swiper-slide">--}}
                                    {{--                                    <div class="slider-item"--}}
                                    {{--                                         style="background-image: url('{{ asset('assets-fe/images/hero/coworking3.jpg') }}');"></div>--}}
                                    {{--                                </div>--}}
                                    {{--                                <div class="swiper-slide">--}}
                                    {{--                                    <div class="slider-item"--}}
                                    {{--                                         style="background-image: url('{{ asset('assets-fe/images/hero/coworking4.jpg') }}');"></div>--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape bottom d-none d-sm-block">
                <svg width="1440px" height="40px" viewBox="0 0 1440 40" version="1.1" xmlns="http://www.w3.org/2000/svg"
                >
                    <g id="shape-b" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="curve" fill="#fff">
                            <path
                                d="M0,30.013 C239.659,10.004 479.143,0 718.453,0 C957.763,0 1198.28,10.004 1440,30.013 L1440,40 L0,40 L0,30.013 Z"
                                id="Path"></path>
                        </g>
                    </g>
                </svg>
            </div>
        </section>
    @elseif(request()->routeIs('myhome'))
        <section class="hero-2">
            <div class="container py-3 py-sm-6">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h1 class="hero-title mt-0">PPDB SMP DISIKPORA Cianjur 2024</h1>
                    </div>
                    <div class="col-lg-5">
                        <p class="fs-17 ps-0 ps-sm-4">Penerimaan Peserta Didik Baru Tingkat SMP Dinas Pendidikan Pemuda
                            dan
                            Olahraga Kabupaten Cianjur Tahun 2024 </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="slider pt-3 pt-sm-5 mt-5">
                            <!-- slider -->
                            <div class="form-container">
                                <div class="row align-items-top px-3 px-sm-5">
                                    <div class="col-lg-12">
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="row g-2 align-items-end">

                                                            <form method="post" action="{{ route('indexHasil') }}"
                                                                  style="display:contents">
                                                                @csrf
                                                                <div class="col-sm-auto">
                                                                    <label class=""
                                                                           for="username">No. Pendaftaran</label>
                                                                    <div class="form-control-with-hint me-sm-2">
                                                                        <input type="text" id="username"
                                                                               class="form-control"
                                                                               placeholder="PPDBXXXXX28937"
                                                                               name="username" required>
                                                                        <span
                                                                            class="form-control-feedback uil uil-location-pin-alt fs-18"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-auto">
                                                                    <label for="example-datetime-local-input" class="">Tanggal
                                                                        Lahir</label>
                                                                    <div class="col-md-10">
                                                                        <input class="form-control" type="date"
                                                                               placeholder="Tanggal Lahir"
                                                                               id="example-datetime-local-input"
                                                                               name="tglLahir" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-auto">
                                                                    <button type="submit" id=""
                                                                            class="btn btn-orange my-1 my-sm-0">
                                                                        Cek Kelulusan
                                                                    </button>
                                                                </div>
                                                            </form>


                                                        </div>
                                                    </div>
                                                    <div class="col-sm-auto text-sm-end pt-2 pt-sm-0">
                                                        <div class="navigations">
                                                            <button class="btn btn-info swiper-custom-prev">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24"
                                                                     viewBox="0 0 24 24" fill="none" stroke="white"
                                                                     stroke-width="1.5" stroke-linecap="round"
                                                                     stroke-linejoin="round"
                                                                     class="feather feather-chevron-left">
                                                                    <polyline points="15 18 9 12 15 6"></polyline>
                                                                </svg>
                                                            </button>
                                                            <button class="btn btn-info swiper-custom-next">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24"
                                                                     viewBox="0 0 24 24" fill="none" stroke="white"
                                                                     stroke-width="1.5" stroke-linecap="round"
                                                                     stroke-linejoin="round"
                                                                     class="feather feather-chevron-right">
                                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-container rounded-2" id="coworking-slider" data-toggle="swiper"
                                 data-aos="fade-up"
                                 data-swiper='{"slidesPerView":1,"spaceBetween":0,"loop":true,"roundLengths":true, "autoplay": {"delay": 5000},  "navigation": {"nextEl": ".swiper-custom-next", "prevEl": ".swiper-custom-prev"}}'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slider-item"
                                             style="background-image: url('{{ asset('assets-fe/images/hero/coworking2.jpg') }}');"></div>
                                    </div>
                                    {{--                                <div class="swiper-slide">--}}
                                    {{--                                    <div class="slider-item"--}}
                                    {{--                                         style="background-image: url('{{ asset('assets-fe/images/hero/coworking3.jpg') }}');"></div>--}}
                                    {{--                                </div>--}}
                                    {{--                                <div class="swiper-slide">--}}
                                    {{--                                    <div class="slider-item"--}}
                                    {{--                                         style="background-image: url('{{ asset('assets-fe/images/hero/coworking4.jpg') }}');"></div>--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape bottom d-none d-sm-block">
                <svg width="1440px" height="40px" viewBox="0 0 1440 40" version="1.1" xmlns="http://www.w3.org/2000/svg"
                >
                    <g id="shape-b" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="curve" fill="#fff">
                            <path
                                d="M0,30.013 C239.659,10.004 479.143,0 718.453,0 C957.763,0 1198.28,10.004 1440,30.013 L1440,40 L0,40 L0,30.013 Z"
                                id="Path"></path>
                        </g>
                    </g>
                </svg>
            </div>
        </section>
    @elseif(request()->routeIs('cek2'))
        <section class="hero-2">
            <div class="container py-3 py-sm-6">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h1 class="hero-title mt-0">PPDB SMP DISIKPORA Cianjur 2024</h1>
                    </div>
                    <div class="col-lg-5">
                        <p class="fs-17 ps-0 ps-sm-4">Penerimaan Peserta Didik Baru Tingkat SMP Dinas Pendidikan Pemuda
                            dan
                            Olahraga Kabupaten Cianjur Tahun 2024 </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="slider pt-3 pt-sm-5 mt-5">
                            <!-- slider -->
                            <div class="form-container">
                                <div class="row align-items-top px-3 px-sm-5">
                                    <div class="col-lg-12">
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="row g-2 align-items-end">

                                                            <form method="post" action="{{ route('indexHasil2') }}"
                                                                  style="display:contents">
                                                                @csrf
                                                                <div class="col-sm-auto">
                                                                    <label class=""
                                                                           for="username">No. Pendaftaran</label>
                                                                    <div class="form-control-with-hint me-sm-2">
                                                                        <input type="text" id="username"
                                                                               class="form-control"
                                                                               placeholder="PPDBXXXXX28937"
                                                                               name="username" required>
                                                                        <span
                                                                            class="form-control-feedback uil uil-location-pin-alt fs-18"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-auto">
                                                                    <label for="example-datetime-local-input" class="">Tanggal
                                                                        Lahir</label>
                                                                    <div class="col-md-10">
                                                                        <input class="form-control" type="date"
                                                                               placeholder="Tanggal Lahir"
                                                                               id="example-datetime-local-input"
                                                                               name="tglLahir" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-auto">
                                                                    <button type="submit" id=""
                                                                            class="btn btn-orange my-1 my-sm-0">
                                                                        Cek Kelulusan
                                                                    </button>
                                                                </div>
                                                            </form>


                                                        </div>
                                                    </div>
                                                    <div class="col-sm-auto text-sm-end pt-2 pt-sm-0">
                                                        <div class="navigations">
                                                            <button class="btn btn-info swiper-custom-prev">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24"
                                                                     viewBox="0 0 24 24" fill="none" stroke="white"
                                                                     stroke-width="1.5" stroke-linecap="round"
                                                                     stroke-linejoin="round"
                                                                     class="feather feather-chevron-left">
                                                                    <polyline points="15 18 9 12 15 6"></polyline>
                                                                </svg>
                                                            </button>
                                                            <button class="btn btn-info swiper-custom-next">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24"
                                                                     viewBox="0 0 24 24" fill="none" stroke="white"
                                                                     stroke-width="1.5" stroke-linecap="round"
                                                                     stroke-linejoin="round"
                                                                     class="feather feather-chevron-right">
                                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-container rounded-2" id="coworking-slider" data-toggle="swiper"
                                 data-aos="fade-up"
                                 data-swiper='{"slidesPerView":1,"spaceBetween":0,"loop":true,"roundLengths":true, "autoplay": {"delay": 5000},  "navigation": {"nextEl": ".swiper-custom-next", "prevEl": ".swiper-custom-prev"}}'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slider-item"
                                             style="background-image: url('{{ asset('assets-fe/images/hero/coworking2.jpg') }}');"></div>
                                    </div>
                                    {{--                                <div class="swiper-slide">--}}
                                    {{--                                    <div class="slider-item"--}}
                                    {{--                                         style="background-image: url('{{ asset('assets-fe/images/hero/coworking3.jpg') }}');"></div>--}}
                                    {{--                                </div>--}}
                                    {{--                                <div class="swiper-slide">--}}
                                    {{--                                    <div class="slider-item"--}}
                                    {{--                                         style="background-image: url('{{ asset('assets-fe/images/hero/coworking4.jpg') }}');"></div>--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape bottom d-none d-sm-block">
                <svg width="1440px" height="40px" viewBox="0 0 1440 40" version="1.1" xmlns="http://www.w3.org/2000/svg"
                >
                    <g id="shape-b" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="curve" fill="#fff">
                            <path
                                d="M0,30.013 C239.659,10.004 479.143,0 718.453,0 C957.763,0 1198.28,10.004 1440,30.013 L1440,40 L0,40 L0,30.013 Z"
                                id="Path"></path>
                        </g>
                    </g>
                </svg>
            </div>
        </section>
    @endif

</div>
{{ $slot }}


<!-- footer start -->
<section class="py-5 py-sm-6 bg-gradient5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <a class="navbar-brand me-lg-4 me-auto pt-0" href="#">
                    <img src="{{ asset('assets-fe/images/logo.png') }}" height="40" class="d-inline-block align-top"
                         alt=""/>
                </a>
                <div class="">
                    <p class="mt-3 mb-1 text-dark">Penerimaan Peserta Didik Baru Tingkat SMP Dinas Pendidikan Pemuda dan
                        Olahraga Kabupaten Cianjur</p>
                    <p class="mt-lg-5 pt-4 mb-lg-0 mb-4 text-dark">Dinas Pendidikan Pemuda dan Olahraga 2024. All rights
                        reserved.</p>
                </div>
            </div>

            <div class="col-lg-7 offset-lg-1">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <h6 class="mb-4 mt-4 mt-sm-2 text-dark fw-semibold text-uppercase">Navigasi</h6>
                        <ul class="list-unstyled">
                            <li class="my-3"><a href="#" class="text-dark">Pemda Cianjur</a></li>
                            <li class="my-3"><a href="#" class="text-dark">DISDIKPORA Kab. Cianjur</a></li>
                            <li class="my-3"><a href="#" class="text-dark">Lapor</a></li>
                        </ul>
                    </div>
                    {{--                    <div class="col-md-3 col-sm-6">--}}
                    {{--                        <h6 class="mb-4 mt-4 mt-sm-2 text-dark fw-semibold text-uppercase">Contact</h6>--}}
                    {{--                        <ul class="list-unstyled">--}}
                    {{--                            <li class="my-3"><a href="#" class="text-dark">Support</a></li>--}}
                    {{--                            <li class="my-3"><a href="#" class="text-dark">Developers</a></li>--}}
                    {{--                            <li class="my-3"><a href="#" class="text-dark">Customer Service</a></li>--}}
                    {{--                            <li class="my-3"><a href="#" class="text-dark">Get Started Guide</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </div>--}}
                    <div class="col-md-5 offset-md-1">
                        <h6 class="mb-4 mt-4 mt-sm-2 text-dark fw-semibold text-uppercase">Informasi</h6>
                        <div class="input-group my-3">
                            <input type="text" class="form-control h-auto" placeholder="Your email"
                                   aria-label="keywords"/>
                            <a href="#" class="btn btn-secondary input-group-text"><i class="icon-xs"
                                                                                      data-feather="mail"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer end -->

<!-- back to top -->
<a class="btn btn-soft-orange shadow-none btn-icon btn-back-to-top" href='#'><i class="icon-xxs"
                                                                                data-feather="arrow-up"></i></a>

<!-- javascript -->
<!-- vendor js -->
<script src="{{ asset('assets-fe/js/vendor.min.js') }}"></script>
<!-- theme js -->
<script src="{{ asset('assets-fe/js/theme.min.js') }}"></script>

@stack('js')

</body>

</html>
