<div>
    <div class="container py-4">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-1">Unduh Berkas</h2>
                        <p class="text-muted">Kumpulan dokumen penting untuk kebutuhan calon peserta didik SPMB SMP DISDIKPORA Cianjur Tahun {{ date('Y') }}/{{ date('Y')+1 }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Document Categories -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body py-4">
                        <div class="avatar-lg mx-auto rounded-circle bg-soft-primary mb-3">
                            <i class="mdi mdi-file-document-outline text-primary font-size-24"></i>
                        </div>
                        <h5>Formulir</h5>
                        <p class="text-muted mb-0">Formulir yang diperlukan untuk proses pendaftaran</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body py-4">
                        <div class="avatar-lg mx-auto rounded-circle bg-soft-success mb-3">
                            <i class="mdi mdi-book-open-variant text-success font-size-24"></i>
                        </div>
                        <h5>Panduan</h5>
                        <p class="text-muted mb-0">Petunjuk lengkap untuk membantu proses pendaftaran</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body py-4">
                        <div class="avatar-lg mx-auto rounded-circle bg-soft-warning mb-3">
                            <i class="mdi mdi-clipboard-text-outline text-warning font-size-24"></i>
                        </div>
                        <h5>Template</h5>
                        <p class="text-muted mb-0">Format dokumen yang bisa diedit untuk keperluan PPDB</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body py-4">
                        <div class="avatar-lg mx-auto rounded-circle bg-soft-info mb-3">
                            <i class="mdi mdi-information-outline text-info font-size-24"></i>
                        </div>
                        <h5>Informasi</h5>
                        <p class="text-muted mb-0">Informasi penting tentang proses PPDB</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Document List -->
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-dark">
                        <h5 class="mb-0 text-white">Daftar Berkas</h5>
                    </div>
                    <div class="card-body p-4">
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th width="40%">Nama Berkas</th>
                                        <th>Deskripsi</th>
                                        <th width="10%">Ukuran</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($documents as $document)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm me-3">
                                                        <div class="avatar-title bg-soft-primary rounded">
                                                            <i class="mdi {{ $document['icon'] }} text-primary font-size-20"></i>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-1 font-size-15">{{ $document['title'] }}</h5>
                                                        <p class="text-muted mb-0 font-size-13">{{ $document['file_name'] }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $document['description'] }}</td>
                                            <td>{{ $document['file_size'] }}</td>
                                            <td>
                                                <button wire:click="downloadDocument({{ $document['id'] }})" class="btn btn-primary btn-sm rounded-pill">
                                                    <i class="mdi mdi-download me-1"></i> Unduh
                                                </button>
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
                        <h4>Panduan Unduh Berkas</h4>
                        <ul class="list-group list-group-flush mt-3">
                            <li class="list-group-item d-flex">
                                <i class="mdi mdi-information-outline text-primary me-3 font-size-20"></i>
                                <div>
                                    <h5>Pastikan Kelengkapan Berkas</h5>
                                    <p class="mb-0">Unduh semua berkas yang diperlukan untuk proses pendaftaran PPDB.</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex">
                                <i class="mdi mdi-printer-outline text-warning me-3 font-size-20"></i>
                                <div>
                                    <h5>Cetak Formulir</h5>
                                    <p class="mb-0">Cetak formulir di kertas A4 dan isi dengan huruf cetak yang jelas.</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex">
                                <i class="mdi mdi-file-pdf-outline text-danger me-3 font-size-20"></i>
                                <div>
                                    <h5>Format PDF</h5>
                                    <p class="mb-0">Untuk membuka file PDF, gunakan aplikasi pembaca PDF seperti Adobe Reader.</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex">
                                <i class="mdi mdi-file-word-outline text-info me-3 font-size-20"></i>
                                <div>
                                    <h5>Format DOCX</h5>
                                    <p class="mb-0">File DOCX dapat dibuka dan diedit menggunakan Microsoft Word atau aplikasi sejenis.</p>
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
                        <p>Jika mengalami kesulitan dalam mengunduh atau mengisi berkas, silakan hubungi kami melalui:</p>
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
        .avatar-sm {
            height: 3rem;
            width: 3rem;
        }
        
        .avatar-lg {
            height: 5rem;
            width: 5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .bg-soft-primary {
            background-color: rgba(85, 110, 230, 0.15) !important;
        }
        
        .bg-soft-success {
            background-color: rgba(52, 195, 143, 0.15) !important;
        }
        
        .bg-soft-warning {
            background-color: rgba(241, 180, 76, 0.15) !important;
        }
        
        .bg-soft-info {
            background-color: rgba(80, 165, 241, 0.15) !important;
        }
        
        .font-size-13 {
            font-size: 13px !important;
        }
        
        .font-size-15 {
            font-size: 15px !important;
        }
        
        .font-size-20 {
            font-size: 20px !important;
        }
        
        .font-size-24 {
            font-size: 24px !important;
        }
    </style>
    @endpush
</div>