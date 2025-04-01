<div>
    <div class="container py-4">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-1">Statistik Pendaftar PPDB Live</h2>
                        <p class="text-muted">{{ $sekolah->nama_sekolah }} - Tahun {{ date('Y') }}</p>
                    </div>
                    <div>
                        <button onclick="window.location.reload()" class="btn btn-sm btn-dark">
                            <i class="mdi mdi-refresh me-1"></i> Refresh Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md bg-soft-primary rounded">
                                <i class="mdi mdi-account-group text-primary font-size-24 avatar-title"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="display-6 mb-0">{{ number_format($totalPendaftar) }}</h5>
                                <p class="text-muted mb-0">Total Pendaftar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Stats Per Jalur -->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <h4><i class="mdi mdi-flag-outline me-2"></i>Pendaftar Per Jalur</h4>
            </div>
            
            @foreach($pendaftarPerJalur as $jalur)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm jalur-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md bg-soft-info rounded">
                                <i class="mdi {{ $jalur['icon'] }} text-info font-size-24 avatar-title"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-1 font-size-18">{{ number_format($jalur['count']) }}</h5>
                                <p class="text-muted mb-0">{{ $jalur['nama'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Stats Per Status -->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <h4><i class="mdi mdi-check-circle-outline me-2"></i>Pendaftar Per Status</h4>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md bg-soft-danger rounded">
                                <i class="mdi mdi-checkbox-blank-circle text-danger font-size-24 avatar-title"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-1 font-size-18">{{ number_format($pendaftarPerStatus['belum_konfirmasi']) }}</h5>
                                <p class="text-muted mb-0">Belum Konfirmasi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md bg-soft-success rounded">
                                <i class="mdi mdi-checkbox-blank-circle text-success font-size-24 avatar-title"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-1 font-size-18">{{ number_format($pendaftarPerStatus['siap_diperiksa']) }}</h5>
                                <p class="text-muted mb-0">Siap Diperiksa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md bg-soft-warning rounded">
                                <i class="mdi mdi-checkbox-blank-circle text-warning font-size-24 avatar-title"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-1 font-size-18">{{ number_format($pendaftarPerStatus['perbaikan']) }}</h5>
                                <p class="text-muted mb-0">Perbaikan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md bg-soft-info rounded">
                                <i class="mdi mdi-check-decagram-outline text-info font-size-24 avatar-title"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-1 font-size-18">{{ number_format($pendaftarPerStatus['selesai']) }}</h5>
                                <p class="text-muted mb-0">Selesai</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Chart Pendaftar per Hari -->
            <div class="col-xl-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Statistik Pendaftar (14 Hari Terakhir)</h4>
                        <div>
                            <canvas id="pendaftarChart" height="280"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pendaftar Terbaru -->
            <div class="col-xl-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Pendaftar Terbaru</h4>
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pendaftarTerbaru as $pendaftar)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-xs me-2">
                                                    <span class="avatar-title rounded-circle bg-white text-white">
                                                        @if($pendaftar->dapodik && $pendaftar->dapodik->jenis_kelamin == 'L')
                                                            <img src="{{ asset('assets/images/icons8-man-192.png') }}" alt="Male" width="24">
                                                        @else
                                                            <img src="{{ asset('assets/images/icons8-woman-192.png') }}" alt="Female" width="24">
                                                        @endif
                                                    </span>
                                                </div>
                                                <div>
                                                    <h5 class="font-size-14 mb-0">{{ $pendaftar->dapodik->nama ?? 'Nama tidak tersedia' }}</h5>
                                                    <small class="text-muted">{{ $pendaftar->jalur ? $pendaftar->jalur->nama_jalur : 'Tidak tersedia' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><small>{{ $pendaftar->created_at->diffForHumans() }}</small></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Belum ada pendaftar</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
                /* Card styles for jalur pendaftaran */
                .jalur-card {
            transition: transform 0.3s ease;
        }
        
        .jalur-card:hover {
            transform: translateY(-5px);
        }
    </style>
    <script>
        document.addEventListener('livewire:initialized', function () {
            initChart();
            
            function initChart() {
                const chartData = @json($chartData);
                const ctx = document.getElementById('pendaftarChart').getContext('2d');
                
                if (window.pendaftarChart instanceof Chart) {
                    window.pendaftarChart.destroy();
                }
                
                window.pendaftarChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: chartData.labels,
                        datasets: [{
                            label: 'Jumlah Pendaftar',
                            data: chartData.datasets.data,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 2,
                            tension: 0.3,
                            pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                            pointBorderColor: '#fff',
                            pointRadius: 4
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
                                display: true,
                                position: 'top'
                            }
                        }
                    }
                });
            }
            
            // Set auto refresh every 60 seconds
            setInterval(function() {
                Livewire.dispatch('refreshStatistics');
            }, 60000);
        });
    </script>
    @endpush
</div>