<div>
    <div class="container py-4">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-1">Jadwal SPMB</h2>
                        <p class="text-muted">Jadwal pelaksanaan SPMB SMP DISDIKPORA Cianjur Tahun {{ date('Y') }}/{{ date('Y')+1 }}</p>
                    </div>
                </div>
            </div>
        </div>
     
        <!-- Calendar View -->
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-dark">
                        <h5 class="mb-0  text-white">Kalender SPMB</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th width="15%">Tanggal</th>
                                        <th width="25%">Kegiatan</th>
                                        <th>Keterangan</th>
                                        <th width="15%">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schedules as $schedule)
                                        <tr>
                                            <td>
                                                @if($schedule['start_date'] == $schedule['end_date'])
                                                    {{ \Carbon\Carbon::parse($schedule['start_date'])->format('d M Y') }}
                                                @else
                                                    {{ \Carbon\Carbon::parse($schedule['start_date'])->format('d M Y') }} - {{ \Carbon\Carbon::parse($schedule['end_date'])->format('d M Y') }}
                                                @endif
                                            </td>
                                            <td><strong>{{ $schedule['title'] }}</strong></td>
                                            <td>{{ $schedule['description'] }}</td>
                                            <td>
                                                @if($schedule['status'] == 'active')
                                                    <div class="badge bg-success">Sedang Berlangsung</div>
                                                @elseif($schedule['status'] == 'completed')
                                                    <div class="badge bg-secondary">Selesai</div>
                                                @else
                                                    <div class="badge bg-info">Akan Datang</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Info Section -->
        <div class="row mt-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4>Informasi Penting</h4>
                        <ul class="list-group list-group-flush mt-3">
                            <li class="list-group-item d-flex">
                                <i class="mdi mdi-information-outline text-primary me-3 font-size-20"></i>
                                <div>
                                    <h5>Persiapkan Dokumen</h5>
                                    <p class="mb-0">Pastikan semua dokumen persyaratan telah disiapkan sebelum melakukan pendaftaran.</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex">
                                <i class="mdi mdi-alert-circle-outline text-warning me-3 font-size-20"></i>
                                <div>
                                    <h5>Verifikasi Data</h5>
                                    <p class="mb-0">Periksa kembali semua data yang diinput untuk menghindari kesalahan.</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex">
                                <i class="mdi mdi-clock-outline text-info me-3 font-size-20"></i>
                                <div>
                                    <h5>Perhatikan Tenggat Waktu</h5>
                                    <p class="mb-0">Lakukan pendaftaran sebelum batas waktu yang ditentukan.</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex">
                                <i class="mdi mdi-account-check-outline text-success me-3 font-size-20"></i>
                                <div>
                                    <h5>Daftar Ulang</h5>
                                    <p class="mb-0">Bagi yang diterima, jangan lupa melakukan daftar ulang sesuai jadwal.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-dark text-white border-0">
                    <div class="card-body p-4">
                        <h4 class="text-white mb-4">Butuh Bantuan?</h4>
                        <p>Jika Anda memiliki pertanyaan seputar jadwal PPDB, silakan hubungi kami melalui:</p>
                        <div class="mb-3">
                            <i class="mdi mdi-phone me-2"></i> (0263) 123456
                        </div>
                        <div class="mb-3">
                            <i class="mdi mdi-email-outline me-2"></i> ppdb@disdikporacijr.go.id
                        </div>
                        <div>
                            <i class="mdi mdi-whatsapp me-2"></i> 0812-3456-7890
                        </div>
                        <div class="mt-4">
                            <a href="#" class="btn btn-light">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('styles')
    <style>
        /* Timeline Styles */
        .timeline-container {
            position: relative;
            padding: 20px 0;
        }
        
        .timeline-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 20px;
            height: 100%;
            width: 4px;
            background: #e9ecef;
            border-radius: 4px;
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 30px;
            padding-left: 60px;
        }
        
        .timeline-icon {
            position: absolute;
            left: 0;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #fff;
            border: 4px solid #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }
        
        .timeline-item.completed .timeline-icon {
            background: #6c757d;
            color: #fff;
            border-color: #6c757d;
        }
        
        .timeline-item.active .timeline-icon {
            background: #198754;
            color: #fff;
            border-color: #198754;
        }
        
        .timeline-item.upcoming .timeline-icon {
            background: #0dcaf0;
            color: #fff;
            border-color: #0dcaf0;
        }
        
        .timeline-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .timeline-date {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        @media (min-width: 768px) {
            .timeline-container::before {
                left: 50%;
                margin-left: -2px;
            }
            
            .timeline-item {
                padding-left: 0;
                margin-bottom: 50px;
            }
            
            .timeline-item:nth-child(odd) {
                padding-right: 50%;
                padding-left: 0;
            }
            
            .timeline-item:nth-child(even) {
                padding-left: 50%;
                padding-right: 0;
            }
            
            .timeline-icon {
                left: 50%;
                margin-left: -20px;
            }
            
            .timeline-item:nth-child(odd) .timeline-content {
                margin-right: 30px;
            }
            
            .timeline-item:nth-child(even) .timeline-content {
                margin-left: 30px;
            }
        }
    </style>
    @endpush
</div>