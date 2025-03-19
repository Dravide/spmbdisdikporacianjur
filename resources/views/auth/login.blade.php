<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Login - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta content="Sistem Penerimaan Murid Baru - Dinas Pendidikan Pemuda dan Olahraga Kab. Cianjur Tahun 2025"
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

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>

</head>

<body>
<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8">
                <div class="text-cente mb-3">
                    <a href="{{ route('myhome') }}" class="">
                        <img src="{{ asset('assets/images/logoppdb.png') }}" alt="" height="70"
                             class="auth-logo logo-dark mx-auto">
                        <img src="{{ asset('assets/images/logoppdb.png') }}" alt="" height="70"
                             class="auth-logo logo-light mx-auto">
                    </a>
                </div>
                <div class="card">
                    <form class="form-horizontal" action="{{ route('login.store') }}" method="POST">
                    <div class="card-body mt-2">
                        <div class="">
                            <!-- end row -->
                            <h4 class="font-size-24 text-dark text-center fw-bold">LOGIN AKUN</h4>
                            <p class="mb-3 text-center">{{ config('app.name') }}</p>
                             @if(session()->has('jenisDiubah'))
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{ session('jenisDiubah') }}
                        </div>
                    @endif

                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="username"><i class="mdi mdi-code-string"></i> USERNAME / NO. PENDAFTARAN <span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                   class="form-control form-control-lg @error('username')is-invalid @enderror"
                                                   id="username"
                                                   placeholder="Username / No. Pendaftaran"
                                                   name="username"
                                                   value="{{ old('username') }}">
                                            @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword"><i class="mdi mdi-form-textbox-password"></i> PASSWORD <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control form-control-lg" id="userpassword"
                                                   placeholder="Password"
                                                   name="password">
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                           id="flexSwitchCheckDefault" onclick="myFunction()">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"><i class="mdi mdi-onepassword"></i>
                                                        Lihat Password</label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="text-md-end mt-3 mt-md-0">
                                                    <a href="{{ route('lupapassword') }}" class="text-muted"><i
                                                            class="mdi mdi-lock"></i> Lupa
                                                        Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-grid mt-2">
                                            <button class="btn btn-lg btn-dark waves-effect waves-light"
                                                    type="submit"><i
                                                    class="mdi mdi-login-variant"></i> Login Akun
                                            </button>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>

                    </form>
                </div>

                <div class="mt-2 text-center">
                    <p class="text-grey-50">Belum Memiliki Akun ? <a href="{{ route('register') }}"
                                                                     class="fw-medium text-info"> Register </a>
                    </p>
                    <p class="text-grey-50">©
                        <script>document.write(new Date().getFullYear())</script>
                        DISDIKPORA Kab. Cianjur
                    </p>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>
<!-- end Account pages -->

<!-- JAVASCRIPT -->
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/assets/libs/node-waves/waves.min.js"></script>

<script src="/assets/js/app.js"></script>
<script>
    function myFunction() {
        var x = document.getElementById("userpassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>
</html>
