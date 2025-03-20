<div class="col-xl-3 mb-0 mb-xl-0">
    <div class="card">
        <div class="card-body">
            <h4 class="mt-1 mb-2 fs-5">Data Peserta</h4>
            <div
                class="mail-list my-2 px-2 bg-soft-{{ request()->routeIs('pendaftaran.beranda') ? 'light' : 'dark' }} rounded-3"
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                title=""
                data-bs-original-title="Beranda berisi Informasi terkait PPDB.">
                <a href="{{ route('pendaftaran.beranda') }}"
                   class="text-body d-block">
                    <div class="d-flex py-1">
                        <div class="flex-shrink-0 me-3 align-self-center">
                            <div class="avatar-xs">
                                <span class="avatar-title bg-soft-dark rounded-circle text-dark">
                                    <i class="mdi mdi-home-city"></i>
                                </span>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="font-size-14 mb-1">Beranda</h5>
                            <p class="text-truncate mb-0">Informasi Terkait PPDB</p>
                        </div>
                    </div>
                </a>
            </div>
            <div
                class="mail-list my-2 px-2 bg-soft-{{ request()->routeIs('Pendaftaran.datapeserta') ? 'light' : 'dark' }} rounded-3"
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                title=""
                data-bs-original-title="Data Peserta Berupa Biodata Siswa, Data Keluarga, Jalur Pendaftaran dan Titik Koordinat Rumah.">
                <a href="{{ route('Pendaftaran.datapeserta') }}"
                   class="text-body d-block">
                    <div class="d-flex py-1">
                        <div class="flex-shrink-0 me-3 align-self-center">
                            <div class="avatar-xs">
                                                                <span
                                                                    class="avatar-title bg-soft-dark rounded-circle text-dark">
                                                                    <i class="mdi mdi-account-supervisor"></i>
                                                                                           </span>

                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="font-size-14 mb-1">Data Peserta</h5>
                            <p class="text-truncate mb-0">
                                Formulir Data Pribadi Siswa
                            </p>
                        </div>

                    </div>
                </a>

            </div>
            <div
                class="mail-list my-2 px-2 bg-soft-{{ request()->routeIs('pendaftaran.jalur') ? 'light' : 'dark' }} rounded-3"
                data-bs-toggle="tooltip"
                data-bs-placement="right" title=""
                data-bs-original-title="Jalur Pendaftaran">
                <a href="{{ route('pendaftaran.jalur') }}"
                   class="text-body d-block">
                    <div class="d-flex py-1">
                        <div class="flex-shrink-0 me-3 align-self-center">
                            <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title bg-soft-dark rounded-circle text-dark">
                                                            <i class="mdi mdi-transfer"></i>
                                                        </span>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="font-size-14 mb-1">Jalur Pendaftaran</h5>
                            <p class="text-truncate mb-0">
                                Pemilihan Jalur Pendaftaran
                            </p>
                        </div>

                    </div>
                </a>

            </div>
            <div
                class="mail-list my-2 px-2 bg-soft-{{ request()->routeIs('sekolah-tujuan.index') ? 'light' : 'dark' }} rounded-3"
                data-bs-toggle="tooltip"
                data-bs-placement="right" title=""
                data-bs-original-title="Sekolah Tujuan yang dipilih.">
                <a href="{{ route('sekolah-tujuan.index') }}"
                   class="text-body d-block">
                    <div class="d-flex py-1">
                        <div class="flex-shrink-0 me-3 align-self-center">
                            <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title bg-soft-dark rounded-circle text-dark">
                                                            <i class="mdi mdi-school-outline"></i>
                                                        </span>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="font-size-14 mb-1">Sekolah Tujuan</h5>
                            <p class="text-truncate mb-0">
                                Pemilihan Sekolah Tujuan
                            </p>
                        </div>

                    </div>
                </a>

            </div>
            <h4 class="mt-3 mb-2 fs-5">Berkas</h4>
            <div
                class="mail-list my-2 px-2 bg-soft-{{ request()->routeIs('pendaftaran.berkasumum') ? 'light' : 'dark' }} rounded-3"
                data-bs-toggle="tooltip"
                data-bs-placement="right" title=""
                data-bs-original-title="Berkas Umum berupa Pas Photo, Surat Kelulusan, Kartu Keluarga / Bukti Domisili dan Pakta Integritas.">
                <a href="{{ route('pendaftaran.berkasumum') }}"
                   class="text-body d-block">
                    <div class="d-flex py-1">
                        <div class="flex-shrink-0 me-3 align-self-center">
                            <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title bg-soft-dark rounded-circle text-dark">
                                                            <i class="mdi mdi-book-outline"></i>
                                                        </span>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="font-size-14 mb-1">Berkas Umum</h5>
                            <p class="text-truncate mb-0">
                                Berkas untuk Melengkapi Formulir
                            </p>
                        </div>

                    </div>
                </a>

            </div>
            <div
                class="mail-list my-2 px-2 bg-soft-{{ request()->routeIs('Pendaftaran.berkaskhusus') ? 'light' : 'dark' }} rounded-3"
                data-bs-toggle="tooltip"
                data-bs-placement="right" title=""
                data-bs-original-title="Berkas Khusus bedasarkan Jalur yang dipilih.">
                <a href="{{ route('Pendaftaran.berkaskhusus') }}"
                   class="text-body d-block ">
                    <div class="d-flex py-1">
                        <div class="flex-shrink-0 me-3 align-self-center">
                            <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title bg-soft-dark rounded-circle text-dark">
                                                            <i class="mdi mdi-apps"></i>
                                                        </span>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="font-size-14 mb-1">Berkas Khusus</h5>
                            <p class="text-truncate mb-0">
                                Pemilihan Jalur dan Unggah Berkas
                            </p>
                        </div>

                    </div>
                </a>

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h6><i class="mdi mdi-file-download text-info"></i> Unduh Berkas</h6>
            <div class="mail-list my-2 px-2 mt-1 rounded-3 bg-soft-light"
                 data-bs-toggle="tooltip" data-bs-placement="right" title=""
                 data-bs-original-title="Fakta Integritas dapat didownload setelah mengisi seluruh Formulir.">

                <a class="" href="{{ route('cpdb.integritas') }}" target="_blank">
                    <span class="mdi mdi-circle-outline me-2 text-danger"></span>Pakta Integritas
                </a>
            </div>
            <div class="mail-list my-2 px-2 mt-1 rounded-3 bg-soft-light">
                <a href="https://drive.google.com/file/d/1h57De0RIjLOLST808z-OMUQDQ0_W9R5S/view?usp=sharing"
                   target="_blank"><span
                        class="mdi mdi-circle-outline me-2 text-warning"></span>Manual Book
                </a>
            </div>
        </div>
    </div>
</div>
