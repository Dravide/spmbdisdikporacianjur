<div>
    <!-- Hero Section -->
    <div class="container">
        <div class="hero-section">
            <div class="row g-0">
        
                <div class="col-lg-12">
                    <div class="accordion">
                        <ul>
                            <li tabindex="1" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/Gentur_Lamp_Monument_2022.jpg/800px-Gentur_Lamp_Monument_2022.jpg')">
                                <div>
                                    <a href="javascript:void(0)">
                                        <h2 class="text-white">Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }}</h2>
                                        <p>Pendaftaran untuk tahun ajaran baru telah dibuka</p>
                                    </a>
                                </div>
                            </li>
                            <li tabindex="2" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Situs_Megalitikum_Gunung_Padang_Cianjur.jpg/1024px-Situs_Megalitikum_Gunung_Padang_Cianjur.jpg')">
                                <div>
                                    <a href="javascript:void(0)">
                                        <h2 class="text-white">Pendaftaran Online</h2>
                                        <p>Daftar secara online dari mana saja dan kapan saja</p>
                                    </a>
                                </div>
                            </li>
                            <li tabindex="3" style="background-image: url('https://romansabandung.com/wp-content/uploads/2024/07/Esra-Sianipar-768x576.jpg')">
                                <div>
                                    <a href="javascript:void(0)">
                                        <h2 class="text-white">Seleksi Transparan</h2>
                                        <p>Proses seleksi yang adil dan transparan</p>
                                    </a>
                                </div>
                            </li>
                            <li tabindex="4" style="background-image: url('http://student-activity.binus.ac.id/swanarapala/wp-content/uploads/sites/50/2023/05/Snapinsta.app_343292190_6347301991980589_1958777148025966584_n_1080.jpg')">
                                <div>
                                    <a href="javascript:void(0)">
                                        <h2 class="text-white">Info & Bantuan</h2>
                                        <p>Dapatkan informasi dan bantuan seputar PPDB</p>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <!-- Stats Section -->
        <div class="mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="stats-section py-1">
                        <div class="row g-0">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <div class="stats-card text-center p-4 h-100 d-flex flex-column justify-content-center align-items-center">
                                    <div class="stats-icon mb-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="mdi mdi-account-group font-size-24"></i>
                                    </div>
                                    <div class="stats-number fw-bold text-primary display-5">{{ number_format($totalPendaftar) }}</div>
                                    <div class="stats-title text-uppercase fw-semibold">Total Pendaftar</div>
                                    <div class="stats-progress mt-2">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4 mb-md-0">
                                <div class="stats-card text-center p-4 h-100 d-flex flex-column justify-content-center align-items-center border-start border-end border-light">
                                    <div class="stats-icon mb-3 bg-success text-white rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="mdi mdi-school font-size-24"></i>
                                    </div>
                                    <div class="stats-number fw-bold text-success display-5">{{ number_format($totalSekolah) }}</div>
                                    <div class="stats-title text-uppercase fw-semibold">Sekolah Terdaftar</div>
                                    <div class="stats-progress mt-2">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stats-card text-center p-4 h-100 d-flex flex-column justify-content-center align-items-center">
                                    <div class="stats-icon mb-3 bg-info text-white rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="mdi mdi-routes font-size-24"></i>
                                    </div>
                                    <div class="stats-number fw-bold text-info display-5">{{ number_format($totalJalur) }}</div>
                                    <div class="stats-title text-uppercase fw-semibold">Jalur Pendaftaran</div>
                                    <div class="stats-progress mt-2">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- News Section -->
        <div class="row mb-1">
            <div class="col-lg-8">
                <h4 class="section-title">Berita SPMB</h4>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card news-card">
                            <img src="https://placehold.co/600x400?text=Berita+PPDB" class="card-img-top" alt="News Image">
                            <div class="card-body">
                                <h5 class="card-title">Pembukaan Pendaftaran PPDB Online Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }}</h5>
                                <p class="card-text text-muted">Disdikpora Cianjur membuka pendaftaran penerimaan peserta didik baru secara online mulai tanggal 1 Juni {{ date('Y') }}.</p>
                                <a href="#" class="btn btn-sm btn-dark">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card news-card">
                            <img src="https://placehold.co/600x400?text=Sosialisasi+PPDB" class="card-img-top" alt="News Image">
                            <div class="card-body">
                                <h5 class="card-title">Sosialisasi PPDB Online Kepada Kepala Sekolah Se-Kabupaten Cianjur</h5>
                                <p class="card-text text-muted">Disdikpora mengadakan sosialisasi sistem PPDB online kepada seluruh kepala sekolah di Kabupaten Cianjur.</p>
                                <a href="#" class="btn btn-sm btn-dark">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <h4 class="section-title">Informasi Terbaru</h4>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-1">Jadwal PPDB Tahun {{ date('Y') }}</h6>
                            <small class="text-muted">3 hari lalu</small>
                        </div>
                        <p class="mb-1 text-muted small">Informasi lengkap tentang jadwal pelaksanaan PPDB Online</p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-1">Persyaratan Pendaftaran</h6>
                            <small class="text-muted">5 hari lalu</small>
                        </div>
                        <p class="mb-1 text-muted small">Dokumen dan persyaratan yang harus disiapkan untuk pendaftaran</p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-1">Jalur Pendaftaran PPDB</h6>
                            <small class="text-muted">1 minggu lalu</small>
                        </div>
                        <p class="mb-1 text-muted small">Informasi tentang jalur pendaftaran yang tersedia</p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-1">Panduan Pendaftaran Online</h6>
                            <small class="text-muted">2 minggu lalu</small>
                        </div>
                        <p class="mb-1 text-muted small">Cara melakukan pendaftaran secara online</p>
                    </a>
                </div>
            </div>
        </div>

    
<!-- Sekolah Terdaftar -->
<div class="mb-5">
    <h4 class="section-title">Sekolah Terdaftar</h4>
    <div class="row">
        @foreach($sekolahTerdaftar as $sekolah)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card school-card h-100 overflow-hidden border-0 shadow-sm">
                <div class="row g-0 h-100">
                    <div class="col-5 bg-white text-dark p-3 d-flex flex-column justify-content-center align-items-center border-end">
                        @if($sekolah->logo)
                            <img src="https://placehold.co/120x60?text={{ substr($sekolah->nama_sekolah, 0, 1) }}" alt="{{ $sekolah->nama_sekolah }}" class="img-fluid mb-2" style="height: 60px;">
                        @else
                        <img src="https://placehold.co/120x120?text={{ substr($sekolah->nama_sekolah, 0, 1) }}" alt="{{ $sekolah->nama_sekolah }}" class="img-fluid mb-2" style="height: 60px;">
                       
                        @endif
                        <div class="text-center">
                            <h3 class="mb-0 fw-bold">{{ number_format($sekolah->data_pendaftar_count) }}</h3>
                            <small class="text-white-50">Pendaftar</small>
                        </div>
                    </div>
                    <div class="col-7 p-3 d-flex flex-column justify-content-center">
                        <h6 class="card-title fw-bold mb-2">{{ $sekolah->nama_sekolah }}</h6>
                        <div class="d-flex align-items-center small mb-2">
                            <i class="mdi mdi-map-marker text-danger me-1"></i>
                            <span class="text-muted">{{ $sekolah->alamat ?? 'Cianjur' }}</span>
                        </div>
                        <a href="#" class="btn btn-sm btn-dark mt-auto">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Jalur Pendaftaran -->
<div class="mb-5">
    <h4 class="section-title">Jalur Pendaftaran</h4>
    <div class="row">
        @foreach($jalurPendaftaran as $jalur)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            <div class="pathway-icon rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background-color: #f0f8ff;">
                                @if($jalur->svg)
                                    <img src="{{ $jalur->svg }}" alt="{{ $jalur->nama_jalur }}" class="img-fluid" style="width: 30px; height: 30px;">
                                @else
                                    <i class="mdi mdi-routes text-primary font-size-24"></i>
                                @endif
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1 fw-bold">{{ $jalur->nama_jalur }}</h5>
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-account-group text-primary me-1"></i>
                                <span class="text-muted">{{ number_format($jalur->jumlah_pendaftar) }} Pendaftar</span>
                            </div>
                        </div>
                    </div>
                    <div class="progress" style="height: 5px;">
                        @php
                            $percentage = $totalPendaftar > 0 ? ($jalur->jumlah_pendaftar / $totalPendaftar) * 100 : 0;
                        @endphp
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <small class="text-muted">{{ number_format($percentage, 1) }}% dari total pendaftar</small>
                        <small class="text-muted">{{ number_format($jalur->jumlah_pendaftar) }} / {{ number_format($totalPendaftar) }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Info Section -->
<div class="row mb-5">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="mb-3">Tentang PPDB Online</h5>
                        <p>Sistem Penerimaan Peserta Didik Baru (PPDB) Online adalah sebuah sistem yang dirancang untuk melakukan otomasi seleksi penerimaan peserta didik baru, mulai dari proses pendaftaran, seleksi hingga pengumuman hasil seleksi.</p>
                        <p>Penggunaan PPDB Online bertujuan untuk meningkatkan transparansi, efektivitas, efisiensi, dan akuntabilitas dalam pelaksanaan penerimaan peserta didik baru.</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="mb-3">Alur Pendaftaran</h5>
                        <ol>
                            <li>Buat akun di website PPDB Online</li>
                            <li>Lengkapi data diri dan unggah dokumen</li>
                            <li>Pilih sekolah tujuan</li>
                            <li>Cetak bukti pendaftaran</li>
                            <li>Tunggu pengumuman hasil seleksi</li>
                            <li>Lakukan daftar ulang jika diterima</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="col-lg-4">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title text-white">Pusat Bantuan</h5>
                        <p>Jika Anda mengalami kesulitan dalam proses pendaftaran, silakan hubungi pusat bantuan kami.</p>
                        <div class="mb-3">
                            <i class="mdi mdi-phone me-2"></i> (0263) 123456
                        </div>
                        <div class="mb-3">
                            <i class="mdi mdi-email-outline me-2"></i> ppdb@disdikporacijr.go.id
                        </div>
                        <div>
                            <i class="mdi mdi-whatsapp me-2"></i> 0812-3456-7890
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    @push('scripts')
    <script src="{{ asset('assets/libs/chart.js/chart.umd.js') }}"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            // Accordion functionality
            const accordionItems = document.querySelectorAll('.accordion li');
            
            accordionItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all items
                    accordionItems.forEach(i => i.classList.remove('active'));
                    
                    // Add active class to clicked item
                    this.classList.add('active');
                });
            });
            
            // Chart rendering code
            const renderChart = (chartData) => {
                const ctx = document.getElementById('registrationChart');
                if (!ctx) return; // Exit if element doesn't exist
                
                const ctxContext = ctx.getContext('2d');
                
                // Destroy existing chart if it exists
                if (window.registrationChart) {
                    window.registrationChart.destroy();
                }
                
                window.registrationChart = new Chart(ctxContext, {
                    type: 'line',
                    data: {
                        labels: chartData.labels,
                        datasets: [{
                            label: 'Jumlah Pendaftar',
                            data: chartData.data,
                            backgroundColor: 'rgba(59, 125, 221, 0.2)',
                            borderColor: 'rgba(59, 125, 221, 1)',
                            borderWidth: 2,
                            tension: 0.3,
                            fill: true,
                            pointBackgroundColor: 'rgba(59, 125, 221, 1)',
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            };
            
            // Initial chart render
            if (typeof chartData !== 'undefined') {
                renderChart(@json($chartData));
                
                // Listen for updates
                Livewire.on('homeDataUpdated', (event) => {
                    renderChart(@json($chartData));
                });
            }
        });
    </script>
    @endpush

    @push('styles')
    <style>
        /* Accordion Styles */
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);
        @import url(https://fonts.googleapis.com/css?family=Montserrat:700);

        .accordion {
            width: 100%;
            height: 250px;
            overflow: hidden;
            margin: 0 auto;
            border-radius: 0.25rem;
        }

        .accordion ul {
            width: 100%;
            display: table;
            table-layout: fixed;
            margin: 0;
            padding: 0;
        }

        .accordion ul li {
            display: table-cell;
            vertical-align: bottom;
            position: relative;
            width: 25%; /* 4 items */
            height: 250px;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            transition: all 500ms ease;
        }

        .accordion ul li div {
            display: block;
            overflow: hidden;
            width: 100%;
        }

        .accordion ul li div a {
            display: block;
            height: 250px;
            width: 100%;
            position: relative;
            z-index: 3;
            vertical-align: bottom;
            padding: 15px 20px;
            box-sizing: border-box;
            color: #fff;
            text-decoration: none;
            font-family: Open Sans, sans-serif;
            transition: all 200ms ease;
        }

        .accordion ul li div a * {
            opacity: 0;
            margin: 0;
            width: 100%;
            text-overflow: ellipsis;
            position: relative;
            z-index: 5;
            white-space: nowrap;
            overflow: hidden;
            transform: translateX(-20px);
            transition: all 400ms ease;
        }

        .accordion ul li div a h2 {
            font-family: Montserrat, sans-serif;
            text-overflow: clip;
            font-size: 24px;
            text-transform: uppercase;
            margin-bottom: 2px;
            top: 160px;
        }

        .accordion ul li div a p {
            top: 160px;
            font-size: 13.5px;
        }

        .accordion ul:hover li,
        .accordion ul:focus-within li {
            width: 10%;
        }

        .accordion ul li:focus {
            outline: none;
        }

        .accordion ul:hover li:hover,
        .accordion ul li:focus,
        .accordion ul:focus-within li:focus {
            width: 70%;
        }

        .accordion ul:hover li:hover a,
        .accordion ul li:focus a,
        .accordion ul:focus-within li:focus a {
            background: rgba(0, 0, 0, 0.4);
        }

        .accordion ul:hover li:hover a *,
        .accordion ul li:focus a *,
        .accordion ul:focus-within li:focus a * {
            opacity: 1;
            transform: translateX(0);
        }

        .accordion ul:hover li {
            width: 10% !important;
        }

        .accordion ul:hover li a * {
            opacity: 0 !important;
        }

        .accordion ul:hover li:hover {
            width: 70% !important;
        }

        .accordion ul:hover li:hover a {
            background: rgba(0, 0, 0, 0.4);
        }

        .accordion ul:hover li:hover a * {
            opacity: 1 !important;
            transform: translateX(0);
        }

        /* Active state for initial display */
        .accordion ul li.active {
            width: 70%;
        }

        .accordion ul li.active a {
            background: rgba(0, 0, 0, 0.4);
        }

        .accordion ul li.active a * {
            opacity: 1;
            transform: translateX(0);
        }

        /* Stack items on mobile */
        @media screen and (max-width: 767px) {
            .accordion {
                height: auto;
            }

            .accordion ul,
            .accordion ul:hover {
                display: block;
            }

            .accordion ul li,
            .accordion ul:hover li,
            .accordion ul li:hover,
            .accordion ul:hover li:hover {
                position: relative;
                display: block;
                width: 100% !important;
                height: 120px;
            }

            .accordion ul li div a h2 {
                top: 35px;
            }

            .accordion ul li div a p {
                top: 35px;
            }
        }

        /* Hero feature styles */
        .hero-feature {
            cursor: pointer;
            padding: 8px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        
        .hero-feature:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }
        
        .hero-feature.active {
            background-color: rgba(0, 0, 0, 0.1);
        }
    </style>
    @endpush
</div>

    @push('styles')
    <style>
        .hero-feature {
            cursor: pointer;
            padding: 8px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        
        .hero-feature:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }
        
        .hero-feature.active {
            background-color: rgba(0, 0, 0, 0.1);
        }
        
        .hero-image-wrapper {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: auto;
        }
        
        .hero-image {
            display: block;
            width: 100%;
            transition: transform 0.5s ease;
        }
        
        .slide-in {
            transform: translateX(100%);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
        }
        
        .slide-out {
            transform: translateX(-100%);
        }
    </style>
    @endpush
