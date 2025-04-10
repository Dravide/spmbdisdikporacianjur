<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>{{ $title }} - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token" content="{{ csrf_token() }}">
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
    @stack('style')
    @stack('styles')
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    
    <!-- Custom CSS for modern UI -->
    <style>
        :root {
            --primary-color: #4285F4;
            --secondary-color: #34A853;
            --accent-color: #EA4335;
            --light-bg: #f8f9fa;
            --border-color: #e9ecef;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--light-bg);
            color: #333;
        }
        
        /* Sidebar styling */
        .vertical-menu {
            background-color: #fff;
        }
        
        #sidebar-menu ul li a {
            padding: 12px 20px;
            color: #555;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        #sidebar-menu ul li a:hover {
            color: var(--primary-color);
            background-color: rgba(66, 133, 244, 0.05);
        }
        
        #sidebar-menu ul li a i {
            font-size: 18px;
            margin-right: 8px;
            vertical-align: middle;
        }
        
        #sidebar-menu ul li.menu-title {
            padding: 16px 20px 8px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #888;
        }
        
        /* Card styling */
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Button styling */
        .btn {
            font-weight: 500;
            border-radius: 4px;
            padding: 8px 16px;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #3367d6;
            border-color: #3367d6;
            transform: translateY(-2px);
        }
        
        /* Table styling */
        .table {
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table th {
            font-weight: 600;
            background-color: rgba(0, 0, 0, 0.02);
        }
        
        .table td, .table th {
            padding: 12px 16px;
            vertical-align: middle;
        }
        
        /* Badge styling */
        .badge {
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 4px;
        }
        
        /* Footer styling */
        .footer {
            background-color: #fff;
            border-top: 1px solid var(--border-color);
            padding: 16px 0;
        }
    </style>
</head>
<body data-sidebar="light" data-topbar="light">
<!-- Begin page -->
<div id="layout-wrapper">

    <!-- ========== Header Start ========== -->
    <x-operator.header/>
    <!-- Header End -->

    <!-- ========== Left Sidebar Start ========== -->
    <x-operator.sidebar/>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                {{ $slot }}
                <!-- end page title -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © Dinas Pendidikan Pemuda dan Olahraga Kabupaten Cianjur
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->
</div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel"
     style="width: 100%; height: 100%;">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Preview Berkas</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="data "></div>
    </div>
</div>
<!-- END layout-wrapper -->
<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('scripts')
</body>
</html>
