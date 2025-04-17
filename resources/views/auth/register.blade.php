<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <title>Registrasi Akun - {{ config('app.name') }}</title>
    {{--    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">--}}
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


    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>

    <link href="{{asset("assets/libs/sweetalert2/sweetalert2.min.css")}}" rel="stylesheet" type="text/css"/>

</head>

<body class="bg-soft-secondary bg-opacity-25">
<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8">
                <div class="text-center mb-3">
                    <a href="{{ route('myhome') }}" class="">
                        <img src="{{ asset('assets/images/logoppdb.png') }}" alt="" height="70"
                             class="auth-logo logo-dark mx-auto">
                        <img src="{{ asset('assets/images/logoppdb.png') }}" alt="" height="70"
                             class="auth-logo logo-light mx-auto">
                    </a>
                </div>
                <div class="card">
                    <div class="card-body mt-2">
                        <h4 class="font-size-24 text-dark text-center fw-bold">REGISTRASI AKUN</h4>
                        <p class="mb-3 text-center">{{ config('app.name') }}</p>
                        <div class="row">
                            <form action="{{ route('register.store') }}" method="POST" id="pendaftaran">
                                @csrf
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="username"><i class="mdi mdi-code-string"></i>
                                            USERNAME / NO. PENDAFTARAN </label>
                                        <input type="text"
                                               class="form-control form-control-lg @error('username') is-invalid @enderror"
                                               id="username"
                                               placeholder=""
                                               name="username"
                                               value="{{ old('username') ? old('username') : $username  }}"
                                               readonly>
                                    </div>
                                    {{--                                    <div class="mb-4">--}}
                                    {{--                                        <label class="form-label" for="useremail">Email <span--}}
                                    {{--                                                class="text-danger">*</span></label>--}}
                                    {{--                                        <input type="email"--}}
                                    {{--                                               class="form-control @error('email') is-invalid @enderror"--}}
                                    {{--                                               id="useremail"--}}
                                    {{--                                               placeholder="Masukan Email"--}}
                                    {{--                                               name="email"--}}
                                    {{--                                               value="{{ old('email')  }}">--}}
                                    {{--                                        @error('email')--}}
                                    {{--                                        <div class="invalid-feedback">--}}
                                    {{--                                            {{ $message }}--}}
                                    {{--                                        </div>--}}
                                    {{--                                        @enderror--}}
                                    {{--                                    </div>--}}
                                    <div class="mb-4">
                                        <label class="form-label" for="userpassword"><i
                                                class="mdi mdi-form-textbox-password"></i> PASSWORD <span
                                                class="text-danger">*</span></label>
                                        <input type="password"
                                               class="form-control form-control-lg @error('password') is-invalid @enderror"
                                               id="userpassword"
                                               placeholder="Password"
                                               name="password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="confirm_userpassword"><i
                                                class="mdi mdi-ticket-confirmation-outline"></i> KONFIRMASI
                                            PASSWORD <span
                                                class="text-danger">*</span></label>
                                        <input type="password"
                                               class="form-control form-control-lg @error('confirm_password') is-invalid @enderror"
                                               id="confirm_userpassword"
                                               placeholder="Konfirmasi Password"
                                               name="confirm_password">
                                        @error('confirm_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>
                                    <div class="mb-4 align-content-center">
                                        <div id="captcha" class="mt-4" wire:ignore></div>
                                        @error('captcha')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="d-grid mt-4">
                                        <button class="btn btn-lg btn-dark waves-effect waves-light" type="submit"
                                                id="btnSubmit"><i
                                                class="mdi mdi-account-plus"></i>
                                            Registrasi Akun
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-2 text-center">
                    <p class="text-grey-50 fs-5 ">Sudah Memiliki Akun ? <a href="{{ route('login') }}"
                                                                           class="fw-medium text-dark fw-bold"> Login
                            Akun </a>
                    </p>
                    <p class="text-grey-50">©
                        2025
                        Dinas Pendidikan Pemuda dan Olahraga Kab. Cianjur
                    </p>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>
<!-- end Account pages -->

<!-- JAVASCRIPT -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="{{asset("")}}assets/libs/jquery/jquery.min.js"></script>
<script src="{{asset("")}}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset("")}}assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset("")}}assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset("")}}assets/libs/node-waves/waves.min.js"></script>
<!-- Sweet Alerts js -->
<script src="{{asset("")}}assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="{{asset("")}}assets/js/pages/sweet-alerts.init.js"></script>

<script src="{{asset("")}}assets/js/app.js"></script>
{{--<script>--}}
{{--    $(document).on('click', '#btnSubmit', function (e) {--}}
{{--        var username = $("#username").val();--}}
{{--        var password = $("#userpassword").val();--}}
{{--        e.preventDefault();--}}
{{--        Swal.fire({--}}
{{--            title: 'Segera ScreenShoot Popup ini!',--}}
{{--            icon: "warning",--}}
{{--            html: '<pre>Username : ' + username + ' <br> Password : ' + password + '</pre>',--}}
{{--            confirmButtonText: 'Lanjutkan!',--}}
{{--        }).then(function (result) {--}}
{{--            $('#pendaftaran').submit();--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}


</body>
</html>
