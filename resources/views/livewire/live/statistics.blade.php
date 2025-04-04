<div>
    <div class="container py-4">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-1">
                            <i class="mdi mdi-circle blink-icon"></i>
                            Live Statistik SPMB
                        </h2>
                        <style>
                            @keyframes blink {
                                0% { opacity: 1; }
                                50% { opacity: 0; }
                                100% { opacity: 1; }
                            }
                            .blink-icon {
                                animation: blink 1s infinite;
                                color: #b31504;
                            }
                        </style>
                        <p class="text-muted">{{ $sekolah->nama_sekolah }} - Tahun {{ date('Y') }}</p>
                    </div>
                    <div>
                        <button wire:click="refreshStatistics" class="btn btn-sm btn-dark">
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
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stats-big-icon me-3">
                                <i class="mdi mdi-account-group"></i>
                            </div>
                            <div>
                                <h2 class="display-6 mb-0 fw-bold">{{ number_format($totalPendaftar) }}</h2>
                                <p class="text-muted mb-0">Total Pendaftar</p>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 8px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="text-muted mt-2 mb-0 small">
                            <i class="mdi mdi-clock-outline me-1"></i> Terakhir diperbarui: {{ $lastUpdated }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Stats Per Jalur -->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <h4 class="section-title"><i class="mdi mdi-flag-outline me-2"></i>Pendaftar Per Jalur</h4>
            </div>
            
            @foreach($pendaftarPerJalur as $jalur)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm jalur-card">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md bg-soft-primary rounded-circle">
                                <i class="mdi {{ $jalur['icon'] }} text-primary font-size-24 avatar-title"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-1 font-size-18 fw-semibold">{{ number_format($jalur['count']) }}</h5>
                                <p class="text-muted mb-0">{{ $jalur['nama'] }}</p>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 6px;">
                            <div class="progress-bar bg-primary" role="progressbar" 
                                style="width: {{ $jalur['percentage'] }}%" 
                                aria-valuenow="{{ $jalur['count'] }}" aria-valuemin="0" aria-valuemax="{{ $totalPendaftar }}"></div>
                        </div>
                        <p class="text-muted mt-2 mb-0 small">{{ $jalur['percentage'] }}% dari total pendaftar</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Stats Per Status -->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <h4 class="section-title"><i class="mdi mdi-check-circle-outline me-2"></i>Pendaftar Per Status</h4>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm status-card">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md bg-soft-danger rounded-circle">
                                <i class="mdi mdi-checkbox-blank-circle text-danger font-size-24 avatar-title"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-1 font-size-18 fw-semibold">{{ number_format($pendaftarPerStatus['belum_konfirmasi']) }}</h5>
                                <p class="text-muted mb-0">Belum Konfirmasi</p>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 6px;">
                            <div class="progress-bar bg-danger" role="progressbar" 
                                style="width: {{ $totalPendaftar > 0 ? ($pendaftarPerStatus['belum_konfirmasi'] / $totalPendaftar * 100) : 0 }}%" 
                                aria-valuenow="{{ $pendaftarPerStatus['belum_konfirmasi'] }}" aria-valuemin="0" aria-valuemax="{{ $totalPendaftar }}"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm status-card">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md bg-soft-warning rounded-circle">
                                <i class="mdi mdi-checkbox-blank-circle text-warning font-size-24 avatar-title"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-1 font-size-18 fw-semibold">{{ number_format($pendaftarPerStatus['siap_diperiksa']) }}</h5>
                                <p class="text-muted mb-0">Siap Diperiksa</p>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" 
                                style="width: {{ $totalPendaftar > 0 ? ($pendaftarPerStatus['siap_diperiksa'] / $totalPendaftar * 100) : 0 }}%" 
                                aria-valuenow="{{ $pendaftarPerStatus['siap_diperiksa'] }}" aria-valuemin="0" aria-valuemax="{{ $totalPendaftar }}"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm status-card">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md bg-soft-info rounded-circle">
                                <i class="mdi mdi-checkbox-blank-circle text-info font-size-24 avatar-title"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-1 font-size-18 fw-semibold">{{ number_format($pendaftarPerStatus['perbaikan']) }}</h5>
                                <p class="text-muted mb-0">Perbaikan</p>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 6px;">
                            <div class="progress-bar bg-info" role="progressbar" 
                                style="width: {{ $totalPendaftar > 0 ? ($pendaftarPerStatus['perbaikan'] / $totalPendaftar * 100) : 0 }}%" 
                                aria-valuenow="{{ $pendaftarPerStatus['perbaikan'] }}" aria-valuemin="0" aria-valuemax="{{ $totalPendaftar }}"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm status-card">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md bg-soft-success rounded-circle">
                                <i class="mdi mdi-check-decagram-outline text-success font-size-24 avatar-title"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-1 font-size-18 fw-semibold">{{ number_format($pendaftarPerStatus['selesai']) }}</h5>
                                <p class="text-muted mb-0">Selesai</p>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 6px;">
                            <div class="progress-bar bg-success" role="progressbar" 
                                style="width: {{ $totalPendaftar > 0 ? ($pendaftarPerStatus['selesai'] / $totalPendaftar * 100) : 0 }}%" 
                                aria-valuenow="{{ $pendaftarPerStatus['selesai'] }}" aria-valuemin="0" aria-valuemax="{{ $totalPendaftar }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Chart Pendaftar per Hari -->
            <div class="col-xl-8 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4">Statistik Pendaftar (14 Hari Terakhir)</h4>
                        <div class="chart-container">
                            <canvas id="pendaftarChart" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pendaftar Terbaru -->
            <div class="col-xl-4 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
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
                                    <tr class="table-row-hover">
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
        /* Section title styling */
        .section-title {
            position: relative;
            margin-bottom: 1.5rem;
            font-weight: 600;
            color: #112341;
            padding-bottom: 0.5rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: #4285F4;
        }
        
        /* Card styles for jalur pendaftaran */
        .jalur-card {
            transition: all 0.3s ease;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .jalur-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        
        /* Card styles for status */
        .status-card {
            transition: all 0.3s ease;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .status-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        
        /* Table row hover effect */
        .table-row-hover {
            transition: background-color 0.3s ease;
        }
        
        .table-row-hover:hover {
            background-color: rgba(66, 133, 244, 0.05);
        }
        
        /* Avatar and icon styling */
        .avatar-md {
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .avatar-xs {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .rounded-circle {
            border-radius: 50% !important;
        }
        
        .bg-soft-primary {
            background-color: rgba(66, 133, 244, 0.15) !important;
        }
        
        .bg-soft-success {
            background-color: rgba(52, 195, 143, 0.15) !important;
        }
        
        .bg-soft-warning {
            background-color: rgba(241, 180, 76, 0.15) !important;
        }
        
        .bg-soft-danger {
            background-color: rgba(244, 106, 106, 0.15) !important;
        }
        
        .bg-soft-info {
            background-color: rgba(80, 165, 241, 0.15) !important;
        }
        
        .font-size-14 {
            font-size: 14px !important;
        }
        
        .font-size-18 {
            font-size: 18px !important;
        }
        
        .font-size-24 {
            font-size: 24px !important;
        }
        
        .chart-container {
            position: relative;
            margin: auto;
            height: 300px;
        }
        
        /* Big stats icon */
        .stats-big-icon {
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: #4285F4;
            background-color: rgba(66, 133, 244, 0.15);
            border-radius: 12px;
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
                            backgroundColor: 'rgba(66, 133, 244, 0.2)',
                            borderColor: 'rgba(66, 133, 244, 1)',
                            borderWidth: 2,
                            tension: 0.4,
                            pointBackgroundColor: 'rgba(66, 133, 244, 1)',
                            pointBorderColor: '#fff',
                            pointRadius: 5,
                            pointHoverRadius: 8,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0,
                                    font: {
                                        weight: 'bold'
                                    }
                                },
                                grid: {
                                    drawBorder: false,
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    font: {
                                        weight: 'bold'
                                    }
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                labels: {
                                    font: {
                                        weight: 'bold'
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: 'rgba(17, 35, 65, 0.9)',
                                titleFont: {
                                    size: 14,
                                    weight: 'bold'
                                },
                                bodyFont: {
                                    size: 13
                                },
                                padding: 12,
                                cornerRadius: 8,
                                displayColors: false
                            }
                        },
                        animation: {
                            duration: 2000,
                            easing: 'easeOutQuart'
                        }
                    }
                });
            }
            
            // Listen for statistics updates
            document.addEventListener('statisticsUpdated', function() {
                initChart();
            });
            
            // Set auto refresh every 60 seconds
            setInterval(function() {
                Livewire.dispatch('refreshStatistics');
            }, 60000);
        });
    </script>
    @endpush
</div>