<x-home.app>

    <!-- about start -->
    <section class="py-lg-1 py-1 mt-xl-7 mt-0 coworking-1">
        <div class="container">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-center">
                                <span class="badge rounded-pill badge-soft-info px-2 py-1">Pendaftar</span>
                                <h1 class="display-5 fw-semibold">Jumlah Pendaftar</h1>
                                <p class="text-muted mx-auto w-75 mt-1">Rekapitulasi Jumlah Pendaftar berdasarkan Jalur</p>

                                <div class="row mt-5 text-center" data-aos="fade-up">
                                    <div class="col-6 col-md-3 mb-5 mb-sm-0">
                                        <div class="display-3 fw-bold" data-toggle="counter" data-from="0" data-to="{{ $jumlahZonasi }}"
                                             data-decimals="0" data-duration="3" data-options='{}'>{{ $jumlahZonasi }}
                                        </div>
                                        <p class="mt-1 mb-0">Zonasi</p>
                                    </div>

                                    <div class="col-6 col-md-3 mb-5 mb-sm-0">
                                        <div class="display-3 fw-bold" data-toggle="counter" data-from="0" data-to="{{ $jumlahPrestasi }}"
                                             data-decimals="0" data-duration="3" data-options='{}'>{{ $jumlahPrestasi }}
                                        </div>
                                        <p class="mt-1 mb-0">Prestasi</p>
                                    </div>

                                    <div class="col-6 col-md-3 mb-5 mb-sm-0">
                                        <div class="display-3 fw-bold" data-toggle="counter" data-from="0" data-to="{{ $jumlahAfirmasi }}"
                                             data-decimals="0" data-duration="3" data-options='{}'>{{ $jumlahAfirmasi }}
                                        </div>
                                        <p class="mt-1 mb-0">Afirmasi</p>
                                    </div>

                                    <div class="col-6 col-md-3 mb-5 mb-sm-0">
                                        <div class="display-3 fw-bold" data-toggle="counter" data-from="0" data-to="{{ $jumlahPTOT }}"
                                             data-decimals="0" data-duration="3" data-options='{}'>{{ $jumlahPTOT }}
                                        </div>
                                        <p class="mt-1 mb-0">Pindah Tugas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="row mt-5 align-items-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body bg-soft-info rounded-2" data-aos="fade-up">
                            <div class="d-flex align-items-center">
                                <img
                                    src="data:image/png;base64,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"
                                    alt="..."
                                    class="img-fluid avatar-md d-block rounded me-3">
                                <div class="flex-grow-1">
                                    <h5 class="mt-0 mb-1 fw-medium">PENDASI</h5>
                                    <p class="text-muted fw-medium mb-0">Pencarian Data Siswa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body bg-soft-success rounded-2" data-aos="fade-up">
                            <div class="d-flex align-items-center">
                                <img
                                    src="data:image/png;base64,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"
                                    alt="..."
                                    class="img-fluid avatar-md d-block rounded me-3">
                                <div class="flex-grow-1">
                                    <h5 class="mt-0 mb-1 fw-medium">JADWAL</h5>
                                    <p class="text-muted fw-medium mb-0">Timeline Pelaksanaan PPDB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body bg-soft-danger rounded-2" data-aos="fade-up">
                            <div class="d-flex align-items-center">
                                <img
                                    src="data:image/png;base64,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"
                                    alt="..."
                                    class="img-fluid avatar-md d-block rounded me-3">
                                <div class="flex-grow-1">
                                    <h5 class="mt-0 mb-1 fw-medium">Helpdesk</h5>
                                    <p class="text-muted fw-medium mb-0">PPDB SMP DISDIKPORA Cianjur</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <a href="https://www.lapor.go.id/" target="_blank">
                        <div class="card-body bg-soft-warning rounded-2" data-aos="fade-up">
                            <div class="d-flex align-items-center">
                                <img
                                    src="data:image/png;base64,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"
                                    alt="..."
                                    class="img-fluid avatar-md d-block rounded me-3">
                                <div class="flex-grow-1">
                                    <h5 class="mt-0 mb-1 fw-medium">LAPOR!</h5>
                                    <p class="text-muted fw-medium mb-0">Layanan Aspirasi dan Pengaduan Online Rakyat</p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <a href="https://drive.google.com/file/d/1CWJY6-Sz2_kV3BlBzhS_VUnCsyIotTR6/view?usp=sharing" target="_blank">
                        <div class="card-body bg-soft-secondary rounded-2" data-aos="fade-up">
                            <div class="d-flex align-items-center">
                                <img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAHZklEQVR4nO2daWwVVRTHp37RD4qBxDd3WqAslUKlhUiCUOjMo1BaXhcoRGhpoUCLtEBLCwRZLC2VInSdQZBNkbTUkBn0g1GQRSIaI4JoYlyRBCFxAzEiNCYYesydtuQt817ntZ39nuSfPO68DjPnd8+95y5vhqKIESNGjBgxYsSIESNGrO8WQdNcBmLYNxFif0IMew8xHJhBNMN10Ii7HBcX97gtQT8VNW0czXAXjXY06lHstZiYtEcpOxlCrMdMtR31HA0nbAPBFTU1ATHsXaOdihwKIQIx7AWjnYmcCqGzwzXekcipEORsR/HG2Hs0k1Q4aNDEAcZeH6cOAmI/iI7mHqOsZp2ppsINRbLLKBMYCicSrAghWOdrdM3vtrCbI6tBCHYjlEkM9aZPsBKEcAFAVdUjIO3OBZE/A5JwGyQBtFSw61uckmMPCOEAgFZhAIj8Ka2dDioA3D/WbA8IagHINV9n50MIAPiYLSCoBoCbHZ2dDz0AsAUE1QA623zTAQCrQ1AfAfxfRgAYOWy64vXdaWmwB4QwIqDDCACJCemK13d0bUXAdy0JQX0E6O98kAQon7NY8fpGRCfD0YoK60eC2QGcqd4U0pm9F3stNjbxCcpoMzuADpGHWZOyNYFAo6QvKaPN7ABAEuA7oSZoZ9xHdVBGmxUAgCTAh9s2aQGBAIAwI8EzeU6/AXBPyLwPohBHGWlWiQDw6hPOVm+CiuwCSEzIkLOhcB3PMG5ImTgb2tsa8Tl/B6npGWO8b0EAoIVE/g94mx9rCAAace2B2QHX7igAUhcE8dV43QEghhMVIkB0HAAJi78JEp+gKwCanuyiGe78w9rPcOdxmTMBCJ0Qju+JpvQ2l2vqCKxgx413jKCn2iizmQmcArpJ5P+kzGaGO0Xqu+62NsK7mzfIwp9DfZcymxntPOijvhdehoTY1IeJBv6MywgASR8As6fOCxjr4DICQNIHwJDB0wIA4DJTAGCYpDyE2LNY+LMWTdCl+ipYMjMHxsemyVqSmiOX6QUg2IjfcAA0w5YFjIQZtqw/AexfuRqiotwBN4/L8DFnA0DcDYWpiBv9BeBi3VZF53crMtINF3ZWOhcAnhNXM0/e2xtfkhp6fRZraWquowFoOhs6PjbN57yf7qiET2q3+JSNH51KAGgFYNhQ3/n6f99qkncuqM1GSAT0EcCzY3wj4OreWnkriXfZqBEzCACtIiAn+Xmf8x7fsB5+ObTTtwmKTSMAtAKwa+kKn/MWp+fBF3VVPmV4eZA0QRoBuFxf7XNevLMBbyv0LitIySEAtALQIfIB/QDOerz/XbWwiADQCgBIAjQVloQcB7yzcT0BoCWAm4frQm4fwZkR6QM03pZSt7RY0flPD58BD0SeANAawL2jjT4LIt3KTgo+J9+fcuxUBHiptaI84P9ZN6+AANALwN3WRnn2038a4quGahIBegA4uXWjImycpl7fv4M0QVoDWJmRH7QtnjjWA183bZNnSlvK18hjg0UpCyAzcS4kT8iC5+I9MHpkihwxvVlRc3wfcPtIPQwdErgu2xeFs6LmeAB7i1f1q/O9IaiJBMcCeCDycK5mc8B0RH9KzYqa4wDcaWmAg6tLg/7OV43w6HlfyWr4VqiBn/ftgL9b6uXFnN6sqDkGwD+tDdCwrFheZOnJwbgzLcnIhyNr1kBlTmHQ76UnZsPh0jL5J0rtbU3wce1LBIC/4+8fa5Zr65iYlJBOx+OAbflFirk/npRTA440QX6Ou1RfJaeKapy1wpMXMoJ+PbRT1U6Kbg0e7JYXeBzZBHWIPDQXlYTc9+Mt/L0re7araso+37UVcpPnB4yc/Z1/YGWpqvPZDgDObl5Iz1P8W9yMVOYWQvQQ3ynoVVn5YWdReISMc338/IdJ8R65Y8ad7rK0hapqvm0BKE2sMZFuKJuzWB504Z+Reh+LGT4dfnt9V9gA+ku2A5A5Za7P9+NHzYSPtm+Rj7235cWA871WrM8eUMcA8M92rndNpuF8Hc/ZeB9zT8iUsyQCQEMAV/fWwo0Dr8DkeI9POZ7/+YavMdT5toyALL8mCAXRwVXqshQCIEwAp6t6fpAS7pBxqmq0820ZAVilsxcFvbHlnoXw3zFzON+2ADpEXn5uG26OcJ+AhT+3raswTc23NQCwkEwMQPnx9QMHznjSLgDu+G2H9x4cGg8AcVeULs7FcEV2AdCqMGrHmjIu3QQAQrzChGG45d2RYNWa31pRHnRb5NrsAuMB0LQ7XU0+b0edq9lsPABsiGE/M9oZSGfhZ5GGytR0BWDVF7mhXgp3vj/sDr0uQeltCLGznAAhZvj0kE2PYQCwuVxsvJXfqod6EF7c76nmGwqgyyLkF3si7g0acT9a6QWfyE84+8GpJs528JN3VWdQIm/8E3X9TY83JoF5dIsym4EknDaBY0AXifwpymwGIp9juGMk3TSfMpsBQARI/En7137hfXyvlBlNfpGbnSGI/Al8j5SZTY4EsXlBV59wy3Cn9V23ul5QN9+0NZ8YMcqs9j++wjfKmiVHTQAAAABJRU5ErkJggg=="
                                    alt="..."
                                    class="img-fluid avatar-md d-block rounded me-3">
                                <div class="flex-grow-1">
                                    <h5 class="mt-0 mb-1 fw-medium">Juknis PPDB 2024</h5>
                                    <p class="text-muted fw-medium mb-0">Petunjuk Teknis PPDB SMP DISDIKPORA 2024</p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about end -->
    <!--<section class="position-relative py-xl-5 py-5 features-3">-->
    <!--    <div class="container">-->
    <!--        <div class="row justify-content-center">-->
    <!--            <div class="col text-center">-->
    <!--                <h1 class="display-5 fw-medium">Berita dan Informasi</h1>-->
    <!--                <p class="text-muted mx-auto">Penerimaan Peserta Didik Baru Tingkat SMP DISDIKPORA Kab. Cianjur Tahun-->
    <!--                    2024</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="row mt-5">-->
    <!--            <div class="col-lg-4">-->
    <!--                <div class="mb-4 aos-init" data-aos="fade-up" data-aos-duration="300">-->
    <!--                    <div class="crypto-blog-box position-relative">-->
    <!--                        <span class="ribbon bg-orange fw-medium">Announcement</span>-->
    <!--                        <img src="assets-fe/images/blog/crypto1.jpg" alt="crypto"-->
    <!--                             class="img-fluid d-block shadow rounded">-->
    <!--                    </div>-->
    <!--                    <p class="text-muted mt-3 mb-0 fs-14">May 19 2020 <b>·</b> 5 min read</p>-->
    <!--                    <h4 class="mt-1"><a href="#" class="text-dark">Introducing blazzing fast new user interface</a></h4>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4">-->
    <!--                <div class="mb-4 aos-init" data-aos="fade-up" data-aos-duration="600">-->
    <!--                    <div class="crypto-blog-box position-relative">-->
    <!--                        <span class="ribbon bg-danger fw-medium">Bitcoin</span>-->
    <!--                        <img src="assets-fe/images/blog/crypto3.jpg" alt="app img"-->
    <!--                             class="img-fluid d-block shadow rounded">-->
    <!--                    </div>-->
    <!--                    <p class="text-muted mt-3 mb-0 fs-14">May 18 2020 <b>·</b> 8 min read</p>-->
    <!--                    <h4 class="mt-1"><a href="#" class="text-dark">What you should know before buying bitcoin</a></h4>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4">-->
    <!--                <div class="mb-4 aos-init" data-aos="fade-up" data-aos-duration="900">-->
    <!--                    <div class="crypto-blog-box position-relative">-->
    <!--                        <span class="ribbon bg-primary fw-medium">Event</span>-->
    <!--                        <img src="assets-fe/images/blog/crypto2.jpg" alt="app img"-->
    <!--                             class="img-fluid d-block shadow rounded">-->
    <!--                    </div>-->
    <!--                    <p class="text-muted mt-3 mb-0 fs-14">May 13 2020 <b>·</b> 2 min read</p>-->
    <!--                    <h4 class="mt-1"><a href="#" class="text-dark">A biggest crypto event to attend this month</a></h4>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
{{--    <!-- features start -->--}}
{{--    <section class="my-lg-5 py-5 py-sm-7 bg-gradient5 position-relative" data-aos="fade-up">--}}
{{--        <div class="divider top d-none d-sm-block"></div>--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col text-center">--}}
{{--                    <span class="badge rounded-pill badge-soft-orange px-2 py-1">Features</span>--}}
{{--                    <h1 class="display-5 fw-semibold">Why Choose Us</h1>--}}
{{--                    <p class="text-secondary mx-auto">The benefits that will make you comfort</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row mt-5">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="card shadow">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex text-align-start">--}}
{{--                                    <span--}}
{{--                                        class="bg-soft-orange avatar avatar-sm rounded-lg icon icon-with-bg icon-xs text-orange me-4 flex-shrink-0">--}}
{{--                                        <? xml version = "1.0" encoding = "UTF-8" ?>--}}
{{--                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"--}}
{{--                                             xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->--}}
{{--                                            <title>Stockholm-icons / Devices / Router#2</title>--}}
{{--                                            <desc>Created with Sketch.</desc>--}}
{{--                                            <g id="Stockholm-icons-/-Devices-/-Router#2" stroke="none" stroke-width="1"--}}
{{--                                               fill="none" fill-rule="evenodd">--}}
{{--                                                <rect id="bound" x="0" y="0" width="24" height="24"></rect>--}}
{{--                                                <rect id="Combined-Shape" fill="#335EEA" x="3" y="13" width="18" height="7"--}}
{{--                                                      rx="2"></rect>--}}
{{--                                                <path--}}
{{--                                                    d="M17.4029496,9.54910207 L15.8599014,10.8215022 C14.9149052,9.67549895 13.5137472,9 12,9 C10.4912085,9 9.09418404,9.67104182 8.14910121,10.8106159 L6.60963188,9.53388797 C7.93073905,7.94090645 9.88958759,7 12,7 C14.1173586,7 16.0819686,7.94713944 17.4029496,9.54910207 Z M20.4681628,6.9788888 L18.929169,8.25618985 C17.2286725,6.20729644 14.7140097,5 12,5 C9.28974232,5 6.77820732,6.20393339 5.07766256,8.24796852 L3.54017812,6.96885102 C5.61676443,4.47281829 8.68922234,3 12,3 C15.3153667,3 18.3916375,4.47692603 20.4681628,6.9788888 Z"--}}
{{--                                                    id="Combined-Shape" fill="#335EEA" opacity="0.3"></path>--}}
{{--                                            </g>--}}
{{--                                        </svg>--}}
{{--                                    </span>--}}

{{--                                <div class="flex-grow-1">--}}
{{--                                    <h5 class="mt-0">High-Speed Wireless</h5>--}}
{{--                                    <p class="mb-0">--}}
{{--                                        We've watched Bootstrap grow up over the years and understand it better than almost--}}
{{--                                        anyone.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6">--}}
{{--                    <div class="card shadow">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex text-align-start">--}}
{{--                                    <span--}}
{{--                                        class="bg-soft-orange avatar avatar-sm rounded-lg icon icon-with-bg icon-xs text-orange me-4 flex-shrink-0">--}}
{{--                                        <? xml version = "1.0" encoding = "UTF-8" ?>--}}
{{--                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"--}}
{{--                                             xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->--}}
{{--                                            <title>Stockholm-icons / Communication / Group</title>--}}
{{--                                            <desc>Created with Sketch.</desc>--}}
{{--                                            <g id="Stockholm-icons-/-Communication-/-Group" stroke="none" stroke-width="1"--}}
{{--                                               fill="none" fill-rule="evenodd">--}}
{{--                                                <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>--}}
{{--                                                <path--}}
{{--                                                    d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"--}}
{{--                                                    id="Combined-Shape" fill="#335EEA" opacity="0.3"></path>--}}
{{--                                                <path--}}
{{--                                                    d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"--}}
{{--                                                    id="Combined-Shape" fill="#335EEA"></path>--}}
{{--                                            </g>--}}
{{--                                        </svg>--}}
{{--                                    </span>--}}
{{--                                <div class="flex-grow-1">--}}
{{--                                    <h5 class="mt-0">Community Events</h5>--}}
{{--                                    <p class="mb-0">--}}
{{--                                        You have a business to run. Stop worring about cross-browser keeping your components--}}
{{--                                        up to date.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="card shadow">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex text-align-start">--}}
{{--                                    <span--}}
{{--                                        class="bg-soft-orange avatar avatar-sm rounded-lg icon icon-with-bg icon-xs text-orange me-4 flex-shrink-0">--}}
{{--                                        <? xml version = "1.0" encoding = "UTF-8" ?>--}}
{{--                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"--}}
{{--                                             xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->--}}
{{--                                            <title>Stockholm-icons / Home / Armchair</title>--}}
{{--                                            <desc>Created with Sketch.</desc>--}}
{{--                                            <g id="Stockholm-icons-/-Home-/-Armchair" stroke="none" stroke-width="1"--}}
{{--                                               fill="none" fill-rule="evenodd">--}}
{{--                                                <path--}}
{{--                                                    d="M20,8 L18.173913,8 C17.0693435,8 16.173913,8.8954305 16.173913,10 L16.173913,12 C16.173913,12.5522847 15.7261978,13 15.173913,13 L8.86956522,13 C8.31728047,13 7.86956522,12.5522847 7.86956522,12 L7.86956522,10 C7.86956522,8.8954305 6.97413472,8 5.86956522,8 L4,8 L4,6 C4,4.34314575 5.34314575,3 7,3 L17,3 C18.6568542,3 20,4.34314575 20,6 L20,8 Z"--}}
{{--                                                    id="Path" fill="#335EEA" opacity="0.3"></path>--}}
{{--                                                <path--}}
{{--                                                    d="M6.15999985,21.0604779 L8.15999985,17.5963763 C8.43614222,17.1180837 9.04773263,16.9542085 9.52602525,17.2303509 C10.0043179,17.5064933 10.168193,18.1180837 9.89205065,18.5963763 L7.89205065,22.0604779 C7.61590828,22.5387706 7.00431787,22.7026457 6.52602525,22.4265033 C6.04773263,22.150361 5.88385747,21.5387706 6.15999985,21.0604779 Z M17.8320512,21.0301278 C18.1081936,21.5084204 17.9443184,22.1200108 17.4660258,22.3961532 C16.9877332,22.6722956 16.3761428,22.5084204 16.1000004,22.0301278 L14.1000004,18.5660262 C13.823858,18.0877335 13.9877332,17.4761431 14.4660258,17.2000008 C14.9443184,16.9238584 15.5559088,17.0877335 15.8320512,17.5660262 L17.8320512,21.0301278 Z"--}}
{{--                                                    id="Combined-Shape" fill="#335EEA" opacity="0.3"></path>--}}
{{--                                                <path--}}
{{--                                                    d="M20,10 L20,15 C20,16.6568542 18.6568542,18 17,18 L7,18 C5.34314575,18 4,16.6568542 4,15 L4,10 L5.86956522,10 L5.86956522,12 C5.86956522,13.6568542 7.21271097,15 8.86956522,15 L15.173913,15 C16.8307673,15 18.173913,13.6568542 18.173913,12 L18.173913,10 L20,10 Z"--}}
{{--                                                    id="Combined-Shape" fill="#335EEA"></path>--}}
{{--                                            </g>--}}
{{--                                        </svg>--}}
{{--                                    </span>--}}
{{--                                <div class="flex-grow-1">--}}
{{--                                    <h5 class="mt-0">Exercise Facilities</h5>--}}
{{--                                    <p class="mb-0">--}}
{{--                                        Replacing a maintains the amount of lines. When replacing a selection objectives and--}}
{{--                                        then create.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6">--}}
{{--                    <div class="card shadow">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex text-align-start">--}}
{{--                                    <span--}}
{{--                                        class="bg-soft-orange avatar avatar-sm rounded-lg icon icon-with-bg icon-xs text-orange me-4 flex-shrink-0">--}}
{{--                                        <? xml version = "1.0" encoding = "UTF-8" ?>--}}
{{--                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"--}}
{{--                                             xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->--}}
{{--                                            <title>Stockholm-icons / Home / Couch</title>--}}
{{--                                            <desc>Created with Sketch.</desc>--}}
{{--                                            <g id="Stockholm-icons-/-Home-/-Couch" stroke="none" stroke-width="1"--}}
{{--                                               fill="none" fill-rule="evenodd">--}}
{{--                                                <path--}}
{{--                                                    d="M6,20 L4,20 C4,17.2385763 6.23857625,16 9,16 L15,16 C17.7614237,16 20,17.2385763 20,20 L18,20 C18,18.3431458 16.6568542,18 15,18 L9,18 C7.34314575,18 6,18.3431458 6,20 Z"--}}
{{--                                                    id="Path-61" fill="#335EEA" opacity="0.3"></path>--}}
{{--                                                <path--}}
{{--                                                    d="M23,8 L21.173913,8 C20.0693435,8 19.173913,8.8954305 19.173913,10 L19.173913,12 C19.173913,12.5522847 18.7261978,13 18.173913,13 L5.86956522,13 C5.31728047,13 4.86956522,12.5522847 4.86956522,12 L4.86956522,10 C4.86956522,8.8954305 3.97413472,8 2.86956522,8 L1,8 C1,6.34314575 2.34314575,5 4,5 L20,5 C21.6568542,5 23,6.34314575 23,8 Z"--}}
{{--                                                    id="Path" fill="#335EEA" opacity="0.3"></path>--}}
{{--                                                <path--}}
{{--                                                    d="M23,10 L23,15 C23,16.6568542 21.6568542,18 20,18 L4,18 C2.34314575,18 1,16.6568542 1,15 L1,10 L2.86956522,10 L2.86956522,12 C2.86956522,13.6568542 4.21271097,15 5.86956522,15 L18.173913,15 C19.8307673,15 21.173913,13.6568542 21.173913,12 L21.173913,10 L23,10 Z"--}}
{{--                                                    id="Combined-Shape" fill="#335EEA"></path>--}}
{{--                                            </g>--}}
{{--                                        </svg>--}}
{{--                                    </span>--}}
{{--                                <div class="flex-grow-1">--}}
{{--                                    <h5 class="mt-0">Comfortable Lounges</h5>--}}
{{--                                    <p class="mb-0">--}}
{{--                                        Risus sed vulputate odio ut enim blandit. Malesuada consequat interdum mattis--}}
{{--                                        facilisis.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- features end -->--}}

{{--    <!-- Options start -->--}}
{{--    <section class="py-5 position-relative">--}}
{{--        <div class="container">--}}
{{--            <div class="row" data-aos="fade-up">--}}
{{--                <div class="col text-center">--}}
{{--                    <span class="badge rounded-pill badge-soft-orange px-2 py-1">Flexible</span>--}}
{{--                    <h1 class="display-5 fw-medium">Coworking Space Options</h1>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row mt-5">--}}
{{--                <div class="col-lg-6 col-xl-4">--}}
{{--                    <div class="card shadow-lg rounded" data-aos="fade-up" data-aos-duration="600">--}}
{{--                        <img src="./assets/images/photos/8.jpg" alt="" class="card-img-top"/>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="">--}}
{{--                                <h4 class="mt-0"><a href="#" class="text-orange">Shared Desk</a></h4>--}}
{{--                                <p class="text-muted mb-2">--}}
{{--                                    Access to shared workspace and conference rooms. Most suitable to individual looking for--}}
{{--                                    people's company.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="pt-3">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <p class="mb-0">--}}
{{--                                            <i data-feather="user" class="icon icon-dual icon-xs me-1"></i>--}}
{{--                                            <a href="" class="fs-13 align-middle text-muted">1-5 Shared Spaces</a>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-xl-4">--}}
{{--                    <div class="card shadow-lg rounded" data-aos="fade-up" data-aos-duration="1000">--}}
{{--                        <img src="./assets/images/photos/5.jpg" alt="" class="card-img-top"/>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="">--}}
{{--                                <h4 class="mt-0"><a href="#" class="text-orange">Dedicated Desk</a></h4>--}}
{{--                                <p class="text-muted mb-2">--}}
{{--                                    A dedicated desk space for you, with 24/7 access to premium amenities and conference--}}
{{--                                    rooms.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="pt-3">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <p class="mb-0">--}}
{{--                                            <i data-feather="user" class="icon icon-dual icon-xs me-1"></i>--}}
{{--                                            <a href="" class="fs-13 align-middle text-muted">1-5 Dedicated Spaces</a>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-xl-4">--}}
{{--                    <div class="card shadow-lg rounded" data-aos="fade-up" data-aos-duration="1400">--}}
{{--                        <img src="./assets/images/photos/4.jpg" alt="" class="card-img-top"/>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="">--}}
{{--                                <h4 class="mt-0"><a href="#" class="text-orange">Event Space</a></h4>--}}
{{--                                <p class="text-muted mb-2">--}}
{{--                                    An excluisive venue designed specifically for events of all kinds, from conferences to--}}
{{--                                    celebrations.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="pt-3">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <p class="mb-0">--}}
{{--                                            <i data-feather="users" class="icon icon-dual icon-xs me-1"></i>--}}
{{--                                            <a href="" class="fs-13 align-middle text-muted">Upto 200 People</a>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- Options end -->--}}

{{--    <!-- testimonials start -->--}}
{{--    <section class="section py-4 py-sm-7 position-relative overflow-hidden" data-aos="fade-up">--}}
{{--        <div class="container testimonials-3">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col">--}}
{{--                    <h1 class="display-5 fw-medium">See what our members are saying</h1>--}}
{{--                </div>--}}
{{--                <div class="col-auto text-sm-end pt-2 pt-sm-0">--}}
{{--                    <div class="navigations">--}}
{{--                        <button class="btn btn-link text-orange p-0 swiper-custom-prev">--}}
{{--                            <svg class="bi bi-arrow-left" width="1.75em" height="1.75em" viewBox="0 0 16 16"--}}
{{--                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path fill-rule="evenodd"--}}
{{--                                      d="M5.854 4.646a.5.5 0 010 .708L3.207 8l2.647 2.646a.5.5 0 01-.708.708l-3-3a.5.5 0 010-.708l3-3a.5.5 0 01.708 0z"--}}
{{--                                      clip-rule="evenodd"></path>--}}
{{--                                <path fill-rule="evenodd" d="M2.5 8a.5.5 0 01.5-.5h10.5a.5.5 0 010 1H3a.5.5 0 01-.5-.5z"--}}
{{--                                      clip-rule="evenodd"></path>--}}
{{--                            </svg>--}}
{{--                        </button>--}}
{{--                        <button class="btn btn-link text-orange p-0 swiper-custom-next">--}}
{{--                            <svg class="bi bi-arrow-right" width="1.75em" height="1.75em" viewBox="0 0 16 16"--}}
{{--                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path fill-rule="evenodd"--}}
{{--                                      d="M10.146 4.646a.5.5 0 01.708 0l3 3a.5.5 0 010 .708l-3 3a.5.5 0 01-.708-.708L12.793 8l-2.647-2.646a.5.5 0 010-.708z"--}}
{{--                                      clip-rule="evenodd"></path>--}}
{{--                                <path fill-rule="evenodd" d="M2 8a.5.5 0 01.5-.5H13a.5.5 0 010 1H2.5A.5.5 0 012 8z"--}}
{{--                                      clip-rule="evenodd"></path>--}}
{{--                            </svg>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row mt-3 mt-sm-5">--}}
{{--                <div class="col">--}}
{{--                    <div class="slider">--}}
{{--                        <div class="swiper-container" data-toggle="swiper"--}}
{{--                             data-swiper='{"loop":true, "spaceBetween": 24, "autoplay": {"delay": 5000}, "breakpoints": {"576": {"slidesPerView": 1 }, "768": { "slidesPerView": 2 } }, "roundLengths":true, "navigation": {"nextEl": ".swiper-custom-next","prevEl": ".swiper-custom-prev"}}'>--}}
{{--                            <div class="swiper-wrapper">--}}
{{--                                <div class="swiper-slide">--}}
{{--                                    <div class="card mb-0 shadow border">--}}
{{--                                        <div class="card-body p-md-5">--}}
{{--                                            <h5 class="fw-normal mb-4 mt-0">--}}
{{--                                                Great office and great location. Worth the money if it makes sense for your--}}
{{--                                                business.--}}
{{--                                            </h5>--}}
{{--                                            <div class="d-flex text-align-start">--}}
{{--                                                <img class="me-2 rounded-circle" src="./assets/images/avatars/img-8.jpg"--}}
{{--                                                     alt="" height="36"/>--}}
{{--                                                <div class="flex-grow-1">--}}
{{--                                                    <h6 class="m-0">Cersei Lannister</h6>--}}
{{--                                                    <p class="my-0 text-muted fs-13">Senior Project Manager</p>--}}
{{--                                                </div>--}}
{{--                                                <img class="" src="./assets/images/brands/google.svg" alt="" height="32"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="swiper-slide">--}}
{{--                                    <div class="card mb-0 border">--}}
{{--                                        <div class="card-body p-md-5">--}}
{{--                                            <h5 class="fw-normal mb-4 mt-0">--}}
{{--                                                Awesome vibe and great staff! Top cooworking spots in the city! Loved to be--}}
{{--                                                here!--}}
{{--                                            </h5>--}}
{{--                                            <div class="d-flex text-align-start">--}}
{{--                                                <img class="me-2 rounded-circle" src="./assets/images/avatars/img-5.jpg"--}}
{{--                                                     alt="" height="36"/>--}}
{{--                                                <div class="flex-grow-1">--}}
{{--                                                    <h6 class="m-0">John Stark</h6>--}}
{{--                                                    <p class="my-0 text-muted fs-13">Engineering Director</p>--}}
{{--                                                </div>--}}
{{--                                                <img class="" src="./assets/images/brands/amazon.svg" alt="" height="32"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- testimonials end -->
    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}"/>
    @endpush
    @push('js')
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script type="text/javascript">
            $("#cekKelulusan").click(function () {
                Swal.fire({
                    icon: "warning",
                    title: "Pengumuman Hasil PPDB akan dibuka pada tanggal 5 Juli 2024 Pukul 14.00 WIB",
                    showConfirmButton: 1,
                    confirmButtonText: "Tutup!"
                })
            });



        </script>

    @endpush


</x-home.app>
