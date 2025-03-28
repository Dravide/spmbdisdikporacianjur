<div>
    <!-- Hero Section -->
    <div class="container">
        <div class="hero-section">
            <div class="row g-0">
                <div class="col-lg-4">
                    <div class="hero-content h-100 d-flex flex-column justify-content-center">
                        <h4 class="mb-3">PENERIMAAN MURID BARU</h4>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2 d-flex align-items-center">
                                <i class="mdi mdi-check-circle-outline text-success me-2"></i>
                                <span>Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }}</span>
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="mdi mdi-check-circle-outline text-success me-2"></i>
                                <span>Pendaftaran Online</span>
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="mdi mdi-check-circle-outline text-success me-2"></i>
                                <span>Seleksi Transparan</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="mdi mdi-check-circle-outline text-success me-2"></i>
                                <span>Info & Bantuan</span>
                            </li>
                        </ul>
                        <div>
                            <a href="{{ route('register') }}" class="btn btn-dark">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="https://placehold.co/1200x600?text=PPDB+Cianjur" alt="Hero Image" class="hero-image w-100">
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <!-- News Section -->
        <div class="row mb-5">
            <div class="col-lg-8">
                <h4 class="section-title">Berita PPDB</h4>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card news-card">
                            <img src="https://placehold.co/600x400?text=Berita+PPDB" class="card-img-top" alt="News Image">
                            <div class="card-body">
                                <h5 class="card-title">Pembukaan Pendaftaran PPDB Online Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }}</h5>
                                <p class="card-text text-muted">Disdikpora Cianjur membuka pendaftaran penerimaan peserta didik baru secara online mulai tanggal 1 Juni {{ date('Y') }}.</p>
                                <a href="#" class="btn btn-sm btn-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card news-card">
                            <img src="https://placehold.co/600x400?text=Sosialisasi+PPDB" class="card-img-top" alt="News Image">
                            <div class="card-body">
                                <h5 class="card-title">Sosialisasi PPDB Online Kepada Kepala Sekolah Se-Kabupaten Cianjur</h5>
                                <p class="card-text text-muted">Disdikpora mengadakan sosialisasi sistem PPDB online kepada seluruh kepala sekolah di Kabupaten Cianjur.</p>
                                <a href="#" class="btn btn-sm btn-primary">Selengkapnya</a>
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

        <!-- Stats Section -->
        <div class="stats-section mb-5 py-4 bg-light rounded">
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

        <!-- Gallery Section -->
        <div class="gallery-section mb-5">
            <h4 class="gallery-title">Galeri Kegiatan</h4>
            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="gallery-item">
                        <img src="https://placehold.co/300x200?text=Sekolah" alt="Gallery Image">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="gallery-item">
                        <img src="https://placehold.co/300x200?text=Siswa" alt="Gallery Image">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="gallery-item">
                        <img src="https://placehold.co/300x200?text=Kelas" alt="Gallery Image">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="gallery-item">
                        <img src="https://placehold.co/300x200?text=Perpustakaan" alt="Gallery Image">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="gallery-item">
                        <img src="https://placehold.co/300x200?text=Kelulusan" alt="Gallery Image">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="gallery-item">
                        <img src="https://placehold.co/300x200?text=Guru" alt="Gallery Image">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="gallery-item">
                        <img src="https://placehold.co/300x200?text=Pendidikan" alt="Gallery Image">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="gallery-item">
                        <img src="https://placehold.co/300x200?text=Kampus" alt="Gallery Image">
                    </div>
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
                    <div class="col-5 bg-dark text-white p-3 d-flex flex-column justify-content-center align-items-center">
                        @if($sekolah->logo)
                            <img src="https://placehold.co/120x60?text={{ substr($sekolah->nama_sekolah, 0, 1) }}" alt="{{ $sekolah->nama_sekolah }}" class="img-fluid mb-2" style="height: 60px;">
                        @else
                            <div class="avatar-lg mx-auto rounded-circle d-flex align-items-center justify-content-center mb-2">
                                <span class="avatar-title text-white display-4 fw-bold">
                                    {{ substr($sekolah->nama_sekolah, 0, 1) }}
                                </span>
                            </div>
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
                        <a href="#" class="btn btn-sm btn-outline-dark mt-auto">Detail</a>
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
            const renderChart = (chartData) => {
                const ctx = document.getElementById('registrationChart').getContext('2d');
                
                // Destroy existing chart if it exists
                if (window.registrationChart) {
                    window.registrationChart.destroy();
                }
                
                window.registrationChart = new Chart(ctx, {
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
</div>
