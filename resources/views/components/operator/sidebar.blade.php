<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu Utama</li>

                <li>
                    <a href="{{ route('operator.home') }}" class="waves-effect">
                        <i class="mdi mdi-home-variant-outline"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('operator.datapendaftar') }}" class="waves-effect">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span>Data Pendaftar</span>
                    </a>
                </li>

                <li class="menu-title">Pemetaan & Analisis</li>
                <li>
                    <a href="{{ route('operator.pemetaandomisili') }}" class="waves-effect">
                        <i class="mdi mdi-map-marker-radius"></i>
                        <span>Pemetaan Domisili</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('operator.maps') }}" class="waves-effect">
                        <i class="mdi mdi-map"></i>
                        <span>Maps</span>
                    </a>
                </li>

                <li class="menu-title">Verifikasi & Validasi</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-check-circle-outline"></i>
                        <span>Verval</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @foreach($jalurs as $jalur)
                            <li><a href="{{ route('operator.verval', $jalur->id) }}"
                                   class="">{{ $jalur->nama_jalur }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="{{ route('operator.rekapverval') }}" class="waves-effect">
                        <i class="mdi mdi-clipboard-text-outline"></i>
                        <span>Rekap Verval</span>
                    </a>
                </li>

                <li class="menu-title">Pengolahan Data</li>
                <li>
                    <a href="{{ route('operator.unduh-excel') }}" class="waves-effect">
                        <i class="mdi mdi-file-excel-outline"></i>
                        <span>Unduh Excel</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('operator.pengumuman') }}" class="waves-effect">
                        <i class="mdi mdi-bullhorn-outline"></i>
                        <span>Pengumuman</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('operator.hasil') }}" class="waves-effect">
                        <i class="mdi mdi-upload-outline"></i>
                        <span>Upload Excel</span>
                    </a>
                </li>

                <li class="menu-title">Pengaturan</li>
                <li>
                    <a href="{{ route('operator.pengaturan') }}" class="waves-effect">
                        <i class="mdi mdi-cog-outline"></i>
                        <span>Pengaturan Akun</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="waves-effect">
                        <i class="mdi mdi-logout"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
