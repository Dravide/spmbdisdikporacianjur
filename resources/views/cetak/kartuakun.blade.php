<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
    <title>Kartu Akun {{ $data->username }}</title>
{{--    <link href="assets/css/bootstrap.min.css" rel="stylesheet"--}}
{{--          type="text/css"/>--}}
{{--    <!-- App Css-->--}}
{{--    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css"/>--}}
{{--    <style>--}}
{{--        @font-face {--}}
{{--            font-family: 'Work Sans';--}}
{{--            font-weight: normal;--}}
{{--            font-style: normal;--}}
{{--            font-variant: normal;--}}
{{--            src: url(https://fonts.gstatic.com/s/worksans/v18/QGY_z_wNahGAdqQ43RhVcIgYT2Xz5u32K0nXBiEJpp_c.woff2) format('woff2');--}}
{{--        }--}}

{{--        body {--}}
{{--            font-family: 'Work Sans', sans-serif;--}}
{{--        }--}}
{{--        --}}
{{--    </style>--}}
    <style>
        @charset "UTF-8";
        /*
        Template Name: Upzet -  Admin & Dashboard Template
        Author: Themesdesign
        Version: 1.1.0
        Contact: themesdesign.in@gmail.com
        File: Custom Bootstrap Css File
        */
        /*!
         * Bootstrap v5.1.3 (https://getbootstrap.com/)
         * Copyright 2011-2021 The Bootstrap Authors
         * Copyright 2011-2021 Twitter, Inc.
         * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
         */
        :root {
            --bs-blue: #0bb197;
            --bs-indigo: #564ab1;
            --bs-purple: #5664d2;
            --bs-pink: #e83e8c;
            --bs-red: #ff3d60;
            --bs-orange: #f1734f;
            --bs-yellow: #fcb92c;
            --bs-green: #0ac074;
            --bs-teal: #050505;
            --bs-cyan: #4aa3ff;
            --bs-white: #fff;
            --bs-gray: #74788d;
            --bs-gray-dark: #343a40;
            --bs-gray-100: #f8f9fa;
            --bs-gray-200: #eff2f7;
            --bs-gray-300: #f1f5f7;
            --bs-gray-400: #ced4da;
            --bs-gray-500: #adb5bd;
            --bs-gray-600: #74788d;
            --bs-gray-700: #505d69;
            --bs-gray-800: #343a40;
            --bs-gray-900: #212529;
            --bs-primary: #0bb197;
            --bs-secondary: #74788d;
            --bs-success: #0ac074;
            --bs-info: #4aa3ff;
            --bs-warning: #fcb92c;
            --bs-danger: #ff3d60;
            --bs-pink: #e83e8c;
            --bs-light: #eff2f7;
            --bs-dark: #343a40;
            --bs-primary-rgb: 11, 177, 151;
            --bs-secondary-rgb: 116, 120, 141;
            --bs-success-rgb: 10, 192, 116;
            --bs-info-rgb: 74, 163, 255;
            --bs-warning-rgb: 252, 185, 44;
            --bs-danger-rgb: 255, 61, 96;
            --bs-pink-rgb: 232, 62, 140;
            --bs-light-rgb: 239, 242, 247;
            --bs-dark-rgb: 52, 58, 64;
            --bs-white-rgb: 255, 255, 255;
            --bs-black-rgb: 0, 0, 0;
            --bs-body-color-rgb: 80, 93, 105;
            --bs-body-bg-rgb: 243, 243, 244;
            --bs-font-sans-serif: "Work Sans", sans-serif;
            --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
            --bs-body-font-family: var(--bs-font-sans-serif);
            --bs-body-font-size: 0.875rem;
            --bs-body-font-weight: 400;
            --bs-body-line-height: 1.5;
            --bs-body-color: #505d69;
            --bs-body-bg: #f3f3f4; }

        *,
        *::before,
        *::after {
            -webkit-box-sizing: border-box;
            box-sizing: border-box; }

        @media (prefers-reduced-motion: no-preference) {
            :root {
                scroll-behavior: smooth; } }

        body {
            margin: 0;
            font-family: var(--bs-body-font-family);
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            color: var(--bs-body-color);
            text-align: var(--bs-body-text-align);
            background-color: var(--bs-body-bg);
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0); }
        .text-center {
            text-align: center !important; }
        .card {
            margin-bottom: 24px;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08); }

        .card-drop {
            font-size: 20px;
            line-height: 0;
            color: inherit; }

        .card-title {
            font-size: 15px;
            margin: 0 0 7px 0;
            font-weight: 500; }

        .card-title-desc {
            color: #74788d;
            margin-bottom: 24px; }

        .card-primary {
            color: #fff;
            background-color: #0bb197; }
        .card-primary .card-header {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff; }
        .card-primary .card-title {
            color: #fff; }

        .card-secondary {
            color: #fff;
            background-color: #74788d; }
        .card-secondary .card-header {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff; }
        .card-secondary .card-title {
            color: #fff; }

        .card-success {
            color: #fff;
            background-color: #0ac074; }
        .card-success .card-header {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff; }
        .card-success .card-title {
            color: #fff; }

        .card-info {
            color: #fff;
            background-color: #4aa3ff; }
        .card-info .card-header {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff; }
        .card-info .card-title {
            color: #fff; }

        .card-warning {
            color: #fff;
            background-color: #fcb92c; }
        .card-warning .card-header {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff; }
        .card-warning .card-title {
            color: #fff; }

        .card-danger {
            color: #fff;
            background-color: #ff3d60; }
        .card-danger .card-header {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff; }
        .card-danger .card-title {
            color: #fff; }

        .card-pink {
            color: #fff;
            background-color: #e83e8c; }
        .card-pink .card-header {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff; }
        .card-pink .card-title {
            color: #fff; }

        .card-light {
            color: #fff;
            background-color: #eff2f7; }
        .card-light .card-header {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff; }
        .card-light .card-title {
            color: #fff; }

        .card-dark {
            color: #fff;
            background-color: #343a40; }
        .card-dark .card-header {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff; }
        .card-dark .card-title {
            color: #fff; }

        .card-border-primary {
            border: 1px solid #0bb197; }
        .card-border-primary .card-header {
            border-bottom: 1px solid #0bb197;
            background: transparent; }
        .card-border-primary .card-footer {
            border-top: 1px solid #0bb197;
            background: transparent; }

        .card-border-secondary {
            border: 1px solid #74788d; }
        .card-border-secondary .card-header {
            border-bottom: 1px solid #74788d;
            background: transparent; }
        .card-border-secondary .card-footer {
            border-top: 1px solid #74788d;
            background: transparent; }

        .card-border-success {
            border: 1px solid #0ac074; }
        .card-border-success .card-header {
            border-bottom: 1px solid #0ac074;
            background: transparent; }
        .card-border-success .card-footer {
            border-top: 1px solid #0ac074;
            background: transparent; }

        .card-border-info {
            border: 1px solid #4aa3ff; }
        .card-border-info .card-header {
            border-bottom: 1px solid #4aa3ff;
            background: transparent; }
        .card-border-info .card-footer {
            border-top: 1px solid #4aa3ff;
            background: transparent; }

        .card-border-warning {
            border: 1px solid #fcb92c; }
        .card-border-warning .card-header {
            border-bottom: 1px solid #fcb92c;
            background: transparent; }
        .card-border-warning .card-footer {
            border-top: 1px solid #fcb92c;
            background: transparent; }

        .card-border-danger {
            border: 1px solid #ff3d60; }
        .card-border-danger .card-header {
            border-bottom: 1px solid #ff3d60;
            background: transparent; }
        .card-border-danger .card-footer {
            border-top: 1px solid #ff3d60;
            background: transparent; }

        .card-border-pink {
            border: 1px solid #e83e8c; }
        .card-border-pink .card-header {
            border-bottom: 1px solid #e83e8c;
            background: transparent; }
        .card-border-pink .card-footer {
            border-top: 1px solid #e83e8c;
            background: transparent; }

        .card-border-light {
            border: 1px solid #eff2f7; }
        .card-border-light .card-header {
            border-bottom: 1px solid #eff2f7;
            background: transparent; }
        .card-border-light .card-footer {
            border-top: 1px solid #eff2f7;
            background: transparent; }

        .card-border-dark {
            border: 1px solid #343a40; }
        .card-border-dark .card-header {
            border-bottom: 1px solid #343a40;
            background: transparent; }
        .card-border-dark .card-footer {
            border-top: 1px solid #343a40;
            background: transparent; }
        .bg-soft-primary {
            background-color: rgba(11, 177, 151, 0.25) !important; }

        .bg-soft-secondary {
            background-color: rgba(116, 120, 141, 0.25) !important; }

        .bg-soft-success {
            background-color: rgba(10, 192, 116, 0.25) !important; }

        .bg-soft-info {
            background-color: rgba(74, 163, 255, 0.25) !important; }

        .bg-soft-warning {
            background-color: rgba(252, 185, 44, 0.25) !important; }

        .bg-soft-danger {
            background-color: rgba(255, 61, 96, 0.25) !important; }

        .bg-soft-pink {
            background-color: rgba(232, 62, 140, 0.25) !important; }

        .bg-soft-light {
            background-color: rgba(239, 242, 247, 0.25) !important; }

        .bg-soft-dark {
            background-color: rgba(52, 58, 64, 0.25) !important; }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem 1.25rem; }
        small, .small {
            font-size: 80%; }
        .m-0 {
            margin: 0 !important; }

        .m-1 {
            margin: 0.25rem !important; }

        .m-2 {
            margin: 0.5rem !important; }

        .m-3 {
            margin: 1rem !important; }

        .m-4 {
            margin: 1.5rem !important; }

        .m-5 {
            margin: 3rem !important; }

        .m-auto {
            margin: auto !important; }

        .mx-0 {
            margin-left: 0 !important;
            margin-right: 0 !important; }

        .mx-1 {
            margin-left: 0.25rem !important;
            margin-right: 0.25rem !important; }

        .mx-2 {
            margin-left: 0.5rem !important;
            margin-right: 0.5rem !important; }

        .mx-3 {
            margin-left: 1rem !important;
            margin-right: 1rem !important; }

        .mx-4 {
            margin-left: 1.5rem !important;
            margin-right: 1.5rem !important; }

        .mx-5 {
            margin-left: 3rem !important;
            margin-right: 3rem !important; }

        .mx-auto {
            margin-left: auto !important;
            margin-right: auto !important; }

        .my-0 {
            margin-top: 0 !important;
            margin-bottom: 0 !important; }

        .my-1 {
            margin-top: 0.25rem !important;
            margin-bottom: 0.25rem !important; }

        .my-2 {
            margin-top: 0.5rem !important;
            margin-bottom: 0.5rem !important; }

        .my-3 {
            margin-top: 1rem !important;
            margin-bottom: 1rem !important; }

        .my-4 {
            margin-top: 1.5rem !important;
            margin-bottom: 1.5rem !important; }

        .my-5 {
            margin-top: 3rem !important;
            margin-bottom: 3rem !important; }

        .my-auto {
            margin-top: auto !important;
            margin-bottom: auto !important; }

        .mt-0 {
            margin-top: 0 !important; }

        .mt-1 {
            margin-top: 0.25rem !important; }

        .mt-2 {
            margin-top: 0.5rem !important; }

        .mt-3 {
            margin-top: 1rem !important; }

        .mt-4 {
            margin-top: 1.5rem !important; }

        .mt-5 {
            margin-top: 3rem !important; }

        .mt-auto {
            margin-top: auto !important; }

        .me-0 {
            margin-left: 0 !important; }

        .me-1 {
            margin-left: 0.25rem !important; }

        .me-2 {
            margin-left: 0.5rem !important; }

        .me-3 {
            margin-left: 1rem !important; }

        .me-4 {
            margin-left: 1.5rem !important; }

        .me-5 {
            margin-left: 3rem !important; }

        .me-auto {
            margin-left: auto !important; }

        .mb-0 {
            margin-bottom: 0 !important; }

        .mb-1 {
            margin-bottom: 0.25rem !important; }

        .mb-2 {
            margin-bottom: 0.5rem !important; }

        .mb-3 {
            margin-bottom: 1rem !important; }

        .mb-4 {
            margin-bottom: 1.5rem !important; }

        .mb-5 {
            margin-bottom: 3rem !important; }

        .mb-auto {
            margin-bottom: auto !important; }

        .ms-0 {
            margin-right: 0 !important; }

        .ms-1 {
            margin-right: 0.25rem !important; }

        .ms-2 {
            margin-right: 0.5rem !important; }

        .ms-3 {
            margin-right: 1rem !important; }

        .ms-4 {
            margin-right: 1.5rem !important; }

        .ms-5 {
            margin-right: 3rem !important; }

        .ms-auto {
            margin-right: auto !important; }

        .m-n1 {
            margin: -0.25rem !important; }

        .m-n2 {
            margin: -0.5rem !important; }

        .m-n3 {
            margin: -1rem !important; }

        .m-n4 {
            margin: -1.5rem !important; }

        .m-n5 {
            margin: -3rem !important; }

        .mx-n1 {
            margin-left: -0.25rem !important;
            margin-right: -0.25rem !important; }

        .mx-n2 {
            margin-left: -0.5rem !important;
            margin-right: -0.5rem !important; }

        .mx-n3 {
            margin-left: -1rem !important;
            margin-right: -1rem !important; }

        .mx-n4 {
            margin-left: -1.5rem !important;
            margin-right: -1.5rem !important; }

        .mx-n5 {
            margin-left: -3rem !important;
            margin-right: -3rem !important; }

        .my-n1 {
            margin-top: -0.25rem !important;
            margin-bottom: -0.25rem !important; }

        .my-n2 {
            margin-top: -0.5rem !important;
            margin-bottom: -0.5rem !important; }

        .my-n3 {
            margin-top: -1rem !important;
            margin-bottom: -1rem !important; }

        .my-n4 {
            margin-top: -1.5rem !important;
            margin-bottom: -1.5rem !important; }

        .my-n5 {
            margin-top: -3rem !important;
            margin-bottom: -3rem !important; }

        .mt-n1 {
            margin-top: -0.25rem !important; }

        .mt-n2 {
            margin-top: -0.5rem !important; }

        .mt-n3 {
            margin-top: -1rem !important; }

        .mt-n4 {
            margin-top: -1.5rem !important; }

        .mt-n5 {
            margin-top: -3rem !important; }

        .me-n1 {
            margin-left: -0.25rem !important; }

        .me-n2 {
            margin-left: -0.5rem !important; }

        .me-n3 {
            margin-left: -1rem !important; }

        .me-n4 {
            margin-left: -1.5rem !important; }

        .me-n5 {
            margin-left: -3rem !important; }

        .mb-n1 {
            margin-bottom: -0.25rem !important; }

        .mb-n2 {
            margin-bottom: -0.5rem !important; }

        .mb-n3 {
            margin-bottom: -1rem !important; }

        .mb-n4 {
            margin-bottom: -1.5rem !important; }

        .mb-n5 {
            margin-bottom: -3rem !important; }

        .ms-n1 {
            margin-right: -0.25rem !important; }

        .ms-n2 {
            margin-right: -0.5rem !important; }

        .ms-n3 {
            margin-right: -1rem !important; }

        .ms-n4 {
            margin-right: -1.5rem !important; }

        .ms-n5 {
            margin-right: -3rem !important; }

        .p-0 {
            padding: 0 !important; }

        .p-1 {
            padding: 0.25rem !important; }

        .p-2 {
            padding: 0.5rem !important; }

        .p-3 {
            padding: 1rem !important; }

        .p-4 {
            padding: 1.5rem !important; }

        .p-5 {
            padding: 3rem !important; }

        .px-0 {
            padding-left: 0 !important;
            padding-right: 0 !important; }

        .px-1 {
            padding-left: 0.25rem !important;
            padding-right: 0.25rem !important; }

        .px-2 {
            padding-left: 0.5rem !important;
            padding-right: 0.5rem !important; }

        .px-3 {
            padding-left: 1rem !important;
            padding-right: 1rem !important; }

        .px-4 {
            padding-left: 1.5rem !important;
            padding-right: 1.5rem !important; }

        .px-5 {
            padding-left: 3rem !important;
            padding-right: 3rem !important; }

        .py-0 {
            padding-top: 0 !important;
            padding-bottom: 0 !important; }

        .py-1 {
            padding-top: 0.25rem !important;
            padding-bottom: 0.25rem !important; }

        .py-2 {
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important; }

        .py-3 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important; }

        .py-4 {
            padding-top: 1.5rem !important;
            padding-bottom: 1.5rem !important; }

        .py-5 {
            padding-top: 3rem !important;
            padding-bottom: 3rem !important; }

        .pt-0 {
            padding-top: 0 !important; }

        .pt-1 {
            padding-top: 0.25rem !important; }

        .pt-2 {
            padding-top: 0.5rem !important; }

        .pt-3 {
            padding-top: 1rem !important; }

        .pt-4 {
            padding-top: 1.5rem !important; }

        .pt-5 {
            padding-top: 3rem !important; }

        .pe-0 {
            padding-left: 0 !important; }

        .pe-1 {
            padding-left: 0.25rem !important; }

        .pe-2 {
            padding-left: 0.5rem !important; }

        .pe-3 {
            padding-left: 1rem !important; }

        .pe-4 {
            padding-left: 1.5rem !important; }

        .pe-5 {
            padding-left: 3rem !important; }

        .pb-0 {
            padding-bottom: 0 !important; }

        .pb-1 {
            padding-bottom: 0.25rem !important; }

        .pb-2 {
            padding-bottom: 0.5rem !important; }

        .pb-3 {
            padding-bottom: 1rem !important; }

        .pb-4 {
            padding-bottom: 1.5rem !important; }

        .pb-5 {
            padding-bottom: 3rem !important; }

        .ps-0 {
            padding-right: 0 !important; }

        .ps-1 {
            padding-right: 0.25rem !important; }

        .ps-2 {
            padding-right: 0.5rem !important; }

        .ps-3 {
            padding-right: 1rem !important; }

        .ps-4 {
            padding-right: 1.5rem !important; }

        .ps-5 {
            padding-right: 3rem !important; }
        @font-face {
            font-family: 'Work Sans';
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            src: url(https://fonts.gstatic.com/s/worksans/v18/QGY_z_wNahGAdqQ43RhVcIgYT2Xz5u32K0nXBiEJpp_c.woff2) format('woff2');
        }

        body {
            font-family: 'Work Sans', sans-serif;
        }


    </style>
</head>
<body>
<div class="text-center"><img src="assets/images/logoppdb.png" height="45" alt="logoppdb"/></div>

<div class="card bg-soft-success mt-3">
    <div class="card-body text-center py-2">
        <strong>KARTU AKUN</strong> <br>SPMB SMP DISDIKPORA Kab. Cianjur <br>Tahun
        Pelajaran
        2025/2026
    </div>
</div>
<div class="card mt-0">
    <div class="card-body">
        <table>
            <tbody>
            <tr class="small">
                <td width="150px">No. Pendaftaran</td>
                <td width="10px">:</td>
                <td><strong>{{ $data->username }}</strong></td>
            </tr>
            <tr class="small">
                <td width="150px">Token</td>
                <td width="10px">:</td>
                <td><strong>{{ $data->token }}</strong></td>
            </tr>
            <tr class="small">
                <td width="150px">Tanggal Pendaftaran</td>
                <td width="10px">:</td>
                <td><strong>{{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y H:i') }} WIB</strong>
                </td>
            </tr>
            </tbody>


        </table>
    </div>

</div>
<p class="text-center my-2 small">Kartu Akun SPMB merupakan solusi praktis yang bisa dimanfaatkan oleh Calon Murid Baru (CMB) dalam situasi ketika mereka mengalami lupa password saat mengakses sistem pendaftaran.
</p>
<div class="card bg-soft-danger mt-3">
    <div class="card-body text-center py-2">
        <p class="text-center my-2 small">Simpan baik-baik <strong>Kartu Akun</strong> dan rahasiakan <strong>Token</strong> untuk keamanan Akun CPDB.</p>
    </div>
</div>
<br>
<br>
<center><img src="assets/images/lupapassword.png" height="200" alt="logoppdb"/></center>

</body>
</html>
