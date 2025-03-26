<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Login Akun - {{ config('app.name') }}</title>
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

<body class="bg-soft-secondary bg-opacity-25">
<div class="account-pages my-5 pt-5">
    <div class="container">
        {{ $slot }}
        <!-- end row -->
    </div>
</div>
<!-- end Account pages -->

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}" data-navigate-once></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}" data-navigate-once></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}" data-navigate-once></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}" data-navigate-once></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}" data-navigate-once></script>

<script src="{{ asset('assets/js/app.js') }}" data-navigate-once></script>
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
@stack('script')
</body>
</html>
