<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('nara.home') }}" class="waves-effect">
                        <i class="mdi mdi-home-variant-outline"></i>
                        <span>Home</span>
                    </a>
                </li>


                <li class="{{ request()->routeIs(['jalur.*','sekolah.*','berkas.*']) ? 'mm-active':'' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-office-building-outline"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('sekolah.index') }}"
                               class="{{ request()->routeIs(['sekolah.*']) ? 'active':'' }}">Sekolah SMP</a>
                        </li>
                        <li><a href="{{ route('sekolahdasar.index') }}"
                               class="{{ request()->routeIs(['sekolahdasar.*']) ? 'active':'' }}">Sekolah Dasar</a>
                        </li>
                        <li>
                            <a href="{{ route('berkas.index') }}"
                               class="{{ request()->routeIs(['berkas.*']) ? 'active':'' }}">Berkas</a>
                        </li>
                        <li><a href="{{ route('jalur.index') }}"
                               class="{{ request()->routeIs(['jalur.*']) ? 'active':'' }}">Jalur</a>
                        </li>

                    </ul>
                </li>
                {{--                <li class="{{ request()->routeIs(['jalur.*','sekolah.*','berkas.*']) ? 'mm-active':'' }}">--}}
                {{--                    <a href="javascript: void(0);" class="has-arrow waves-effect">--}}
                {{--                        <i class="mdi mdi-office-building-outline"></i>--}}
                {{--                        <span>Berita</span>--}}
                {{--                    </a>--}}
                {{--                    <ul class="sub-menu" aria-expanded="false">--}}
                {{--                        <li><a href="{{ route('nara.berita') }}"--}}
                {{--                               class="{{ request()->routeIs(['sekolah.*']) ? 'active':'' }}">Daftar Berita</a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="{{ route('nara.add-berita') }}"--}}
                {{--                               class="{{ request()->routeIs(['berkas.*']) ? 'active':'' }}">Tambah Berita</a>--}}
                {{--                        </li>--}}

                {{--                    </ul>--}}
                {{--                </li>--}}
                <li class="menu-title">NAV</li>
                <li class="{{ request()->routeIs(['datapendaftar.*']) ? 'mm-active':'' }}">
                    <a href="{{ route('datapendaftar.index') }}"
                       class="waves-effect">
                        <i class="mdi mdi-select-search"></i>
                        <span>Data Pendaftar</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs(['nara.schedule-manager']) ? 'mm-active':'' }}">
                    <a href="{{ route('nara.schedule-manager') }}"
                       class="waves-effect">
                        <i class="mdi mdi-calendar-clock"></i>
                        <span>Jadwal</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs(['nara.berita-manager']) ? 'mm-active':'' }}">
                    <a href="{{ route('nara.berita-manager') }}"
                       class="waves-effect">
                        <i class="mdi mdi-newspaper"></i>
                        <span>Berita</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('log-viewer.index') }}" class="waves-effect" target="_blank">
                        <i class="mdi mdi-console-network"></i>
                        <span>Logs</span>
                    </a>
                </li>
                <li class="menu-title">Pengaturan</li>
                <li>
                    <a href="{{ route('pengaturan.index') }}" class="waves-effect">
                        <i class="mdi mdi-cog-outline"></i>
                        <span>Pengaturan</span>
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
