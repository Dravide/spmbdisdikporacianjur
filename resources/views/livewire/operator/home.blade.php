<div>
    <!-- Dashboard Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Dashboard PPDB</h4>
                <div class="page-title-right">
                    <button wire:click="loadDashboardData" class="btn btn-sm btn-primary">
                        <i class="mdi mdi-refresh me-1"></i> Refresh Data
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Total Pendaftar Card -->
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="mb-1 font-size-24">{{ number_format($totalPendaftar) }}</h4>
                            <p class="text-muted mb-0">Total Pendaftar</p>
                        </div>
                        <div class="avatar-md">
                            <div class="avatar-title bg-soft-dark rounded">
                                <i class="mdi mdi-account-group font-size-24 text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="mb-1 font-size-24">{{ number_format($totalTerverifikasi) }}</h4>
                            <p class="text-muted mb-0">Terverifikasi</p>
                        </div>
                        <div class="avatar-md">
                            <div class="avatar-title bg-soft-dark rounded">
                                <i class="mdi mdi-check-circle font-size-24 text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="mb-1 font-size-24">{{ number_format($totalBelumTerverifikasi) }}</h4>
                            <p class="text-muted mb-0">Belum Terverifikasi</p>
                        </div>
                        <div class="avatar-md">
                            <div class="avatar-title bg-soft-dark rounded">
                                <i class="mdi mdi-clock-outline font-size-24 text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Carousel for Jalur Pendaftaran -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Jalur Pendaftaran</h4>
                    
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                        @foreach($jalurData as $jalur)
                        <div class="col">
                            <div class="card border rounded-4 bg-white shadow-sm h-100 jalur-card">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-end mb-2">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-white">
                                                <img src="{!! $jalur->svg !!}" height="50">
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="display-4 mb-0 fw-bold text-muted">{{ number_format($jalur->jumlah_pendaftar) }}</h2>
                                    <p class="text-muted mb-0 mt-2">{{ $jalur->nama_jalur }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
            
            <!-- Chart Pendaftar per Hari -->
        </div>
        <div class="row">
        
        <div class="col-xl-6">
            <!-- Pendaftar Terbaru -->
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
                                                    @if($pendaftar->dapodik->jenis_kelamin == 'L')
                                                        <img src="{{ asset('assets/images/icons8-man-192.png') }}" alt="Male" width="18">
                                                    @else
                                                        <img src="{{ asset('assets/images/icons8-woman-192.png') }}" alt="Female" width="18">
                                                    @endif
                                                </span>
                                            </div>
                                            <div>
                                                <h5 class="font-size-13 text-truncate mb-0">
                                                    <a href="#" class="text-dark">{{ $pendaftar->dapodik->nama }}</a>
                                                </h5>
                                                <p class="font-size-11 text-muted mb-0">{{ $pendaftar->nisn }}</p>
                                                <span class="badge bg-soft-dark text-dark">{{ $pendaftar->jalur->nama_jalur }}</span>
                                            </div>
                                        </div>
                                    </td>
                    
                                    <td>{{ $pendaftar->created_at->diffForHumans() }}</td>
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
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Statistik Pendaftar (14 Hari Terakhir)</h4>
                    <div>
                        <canvas id="pendaftarChart" height="280"></canvas>
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
            
            Livewire.on('dashboardUpdated', function() {
                initChart();
            });
            
            function initChart() {
                const chartData = @json($chartData);
                const ctx = document.getElementById('pendaftarChart').getContext('2d');
                
                // Destroy existing chart if it exists
                if (window.pendaftarChart instanceof Chart) {
                    window.pendaftarChart.destroy();
                }
                
                window.pendaftarChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: chartData.labels,
                        datasets: [{
                            label: 'Jumlah Pendaftar',
                            data: chartData.data,
                            backgroundColor: 'rgba(59, 125, 221, 0.1)',
                            borderColor: 'rgba(59, 125, 221, 1)',
                            borderWidth: 2,
                            tension: 0.3,
                            fill: true,
                            pointBackgroundColor: 'rgba(59, 125, 221, 1)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
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
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                                padding: 10,
                                titleColor: '#fff',
                                titleFont: {
                                    size: 14
                                },
                                bodyColor: '#fff',
                                bodyFont: {
                                    size: 13
                                },
                                displayColors: false
                            }
                        }
                    }
                });
            }
        });
    </script>
    @endpush
</div>
