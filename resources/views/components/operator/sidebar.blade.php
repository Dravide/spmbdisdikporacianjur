<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li class="mb-1">
                    <a href="{{ route('operator.home') }}" class="waves-effect">
                        <i class="mdi mdi-home-variant-outline"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('operator.datapendaftar') }}" class="waves-effect">
                        <i class="mdi mdi-nature-people"></i>
                        <span>Data Pendaftar</span>
                    </a>
                </li>
                <li class="menu-title">Pemetaan</li>
                <li class="mb-1">
                    <a href="{{ route('operator.pemetaandomisili') }}" class="waves-effect">
                        <i class="mdi mdi-map-marker"></i>
                        <span>Pemetaan Domisili</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('operator.maps') }}" class="waves-effect">
                        <i class="mdi mdi-map-marker-path"></i>
                        <span>Maps</span>
                    </a>
                </li>
                <li class="menu-title">Verval</li>
                <li class="mb-1">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-data-matrix"></i>
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
                <li class="mb-1">
                    <a href="{{ route('operator.rekapverval') }}" class="waves-effect">
                        <i class="mdi mdi-database-sync"></i>
                        <span>Rekap Verval</span>
                    </a>
                </li>
                <li class="menu-title">Pengolahan</li>
                <li class="mb-1">
{{--                    <a href="#" class="waves-effect">--}}
{{--                        <i class="mdi mdi-card-search"></i>--}}
{{--                        <span>Pengumuman</span>--}}
{{--                    </a>--}}
{{--                    {{ route('operator.unduh-excel') }}--}}
                    <a href="{{ route('operator.unduh-excel') }}" class="waves-effect">
                        <i class="mdi mdi-cog-outline"></i>
                        <span>Unduh Excel</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('operator.pengumuman') }}" class="waves-effect">
                        <i class="mdi mdi-bullhorn-outline"></i>
                        <span>Pengumuman</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('operator.hasil') }}" class="waves-effect">
                        <i class="mdi mdi-upload-outline"></i>
                        <span>Upload Excel</span>
                    </a>
                </li>
                <li class="menu-title">Pengaturan</li>
                <li class="mb-1">
                    <a href="{{ route('operator.pengaturan') }}" class="waves-effect">
                        <i class="mdi mdi-cog-outline"></i>
                        <span>Pengaturan Akun</span>
                    </a>
                </li>
                <li class="mb-1">
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
