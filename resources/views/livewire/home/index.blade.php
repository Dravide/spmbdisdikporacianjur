<div>
    <!-- Hero Section -->
    <div class="container py-4">
        <div class="hero-section">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="hero-content">
                        <div class="d-flex align-items-center mb-2">
                            <div class="hero-icon me-2">
                                <i class="mdi mdi-star-four-points text-danger" style="font-size: 28px;"></i>
                            </div>
                            <h1 class="mb-0 fw-bold">Selamat Datang</h1>
                        </div>
                        <h2 class="text-primary fw-bold mb-3">SPMB SMP DISDIKPORA</h2>
                        <h3 class="mb-4">Kabupaten Cianjur Tahun 2025</h3>
                        
                        <p class="mb-4">Masukkan email Anda untuk lebih dulu mencoba aplikasi SPMB.</p>
                        
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg" placeholder="Tulis Email Anda" aria-label="Email">
                            <button class="btn btn-primary btn-lg" type="button">Dapatkan Informasi</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="hero-images position-relative d-flex justify-content-center align-items-center">
                        <img src="{{  asset('images/_image.svg') }}" 
                             alt="Digital Identity" 
                             class="img-fluid hero-main-image" 
                             style="max-width: 100%; height: 350px;">
                    </div>
                </div>
            
            </div>
        </div>
    </div>

    <div class="container py-4">
        <!-- Stats Section - Updated with blue background and modern design -->
        <div class="mb-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="stats-section-new">
                        <div class="row g-0">
                            <div class="col-lg-6 p-4 p-lg-5 d-flex flex-column justify-content-center">
                                <h2 class="mb-2 fw-bold">SPMB SMP DISDIKPORA Cianjur</h2>
                                <p class="mb-4 stats-description">
                                    SPMB dibuat dan dikembangkan khusus untuk seluruh calon siswa di Kabupaten Cianjur, mulai dari pendaftaran hingga pengumuman. Karena SPMB percaya bahwa setiap calon siswa berhak mendapatkan kemudahan dalam mendaftar untuk mendapatkan pelayanan terbaik.
                                </p>
                                
                                <div class="stats-highlights">
                                    <div class="row">
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <div class="stat-highlight">
                                                <div class="stat-number">{{ number_format($totalSekolah) }}</div>
                                                <div class="stat-label">Sekolah Terdaftar</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <div class="stat-highlight">
                                                <div class="stat-number">{{ number_format($totalJalur) }}</div>
                                                <div class="stat-label">Jalur Pendaftaran</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="stat-highlight">
                                                <div class="stat-number">{{ date('Y') }}</div>
                                                <div class="stat-label">Tahun Ajaran</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 bg-primary text-white p-4 p-lg-5 d-flex flex-column justify-content-center">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="stats-big-icon me-3">
                                        <i class="mdi mdi-account-group"></i>
                                    </div>
                                    <div>
                                        <h2 class="mb-0 fw-bold text-white">{{ number_format($totalPendaftar) }}</h2>
                                        <p class="mb-0 text-white-50">Total Pendaftar Saat Ini</p>
                                    </div>
                                </div>
                                
                                <div class="progress mb-4" style="height: 8px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                
                                <p class="mb-4">
                                    *Data PPDB per {{ now()->format('d/m/Y') }}
                                </p>
                                
                                <a href="{{ route('data.pendaftar') }}" class="btn btn-light">Lihat Data Pendaftar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- News Section -->
        <div class="row mb-1">
            <div class="col-lg-12">
                <h4 class="section-title">Berita SPMB</h4>
                <div class="row">
                    @forelse($berita as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card news-card h-100">
                            <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/600x400?text=Berita+PPDB' }}" class="card-img-top" alt="{{ $item->judul }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($item->ringkasan ?? strip_tags($item->konten), 100) }}</p>
                                <div class="mt-auto">
                                    <small class="text-muted d-block mb-2">{{ $item->created_at->format('d M Y') }}</small>
                                    <a href="{{ route('news.detail', $item->id) }}" class="btn btn-sm btn-dark">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            Belum ada berita terbaru.
                        </div>
                    </div>
                    @endforelse
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
                        @if($sekolah->img)
                            <img src="{{ asset('storage/'.$sekolah->img)  }}" alt="{{ $sekolah->nama_sekolah }}" class="img-fluid mb-2" style="height: 60px;">
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
                        <a href="{{ route('live.statistics', $sekolah->ulid) }}" class="btn btn-sm btn-dark mt-auto" target="_blank">Live Stat</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Jalur Pendaftaran -->
<div class="mb-1">
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

    @push('styles')
    <style>
        /* New Stats Section Styles */
        .stats-section-new {
            overflow: hidden;
            border-radius: 8px;
        }
        
        .stats-description {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            max-width: 90%;
        }
        
        .stats-highlights {
            margin-top: 10px;
        }
        
        .stat-highlight {
            padding: 10px 0;
        }
        
        .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            line-height: 1.2;
        }
        
        .stat-label {
            font-size: 14px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .stats-big-icon {
            font-size: 48px;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
        }
        
        .bg-primary {
            background: linear-gradient(135deg, #4285F4 0%, #3367d6 100%) !important;
        }
        
        .progress {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .btn-light {
            font-weight: 500;
            padding: 8px 20px;
            transition: all 0.3s;
        }
        
        .btn-light:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        @media (max-width: 991px) {
            .stats-section-new .row > div:first-child {
                order: 2;
            }
            .stats-section-new .row > div:last-child {
                order: 1;
                margin-bottom: 1rem;
            }
        }
    </style>
    @endpush

    @push('styles')
    @push('styles')
        <style>
            /* Hero Section Styles */
            .hero-section {
                padding: 2rem 0;
            }
            
            .hero-content h1 {
                font-size: 2.2rem;
                color: #333;
            }
            
            .hero-content h2 {
                font-size: 2.5rem;
                color: #4285F4;
            }
            
            .hero-content h3 {
                font-size: 1.8rem;
                color: #333;
                font-weight: 500;
            }
            
            .hero-image-card {
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                height: 120px;
                width: 120px;
                margin-bottom: 1rem;
            }
            
            .hero-image-card img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            
            .form-control-lg {
                border-radius: 8px 0 0 8px;
                border: 1px solid #ddd;
                padding: 0.75rem 1.25rem;
            }
            
            .btn-primary {
                background: linear-gradient(135deg, #4285F4 0%, #3367d6 100%);
                border: none;
                border-radius: 0 8px 8px 0;
                padding: 0.75rem 1.5rem;
                font-weight: 500;
            }
            
            .btn-primary:hover {
                background: linear-gradient(135deg, #3367d6 0%, #2a56b5 100%);
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            }
            
            @media (max-width: 991px) {
                .hero-content h1 {
                    font-size: 1.8rem;
                }
                
                .hero-content h2 {
                    font-size: 2rem;
                }
                
                .hero-content h3 {
                    font-size: 1.5rem;
                }
                
                .hero-image-card {
                    height: 100px;
                    width: 100px;
                }
            }
        </style>
        @endpush
    @endpush
