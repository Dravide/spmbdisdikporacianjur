<div>
    <div class="container py-4">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-1">Alur Pendaftaran PPDB</h2>
                        <p class="text-muted">Panduan langkah-langkah pendaftaran PPDB Disdikpora Cianjur Tahun {{ date('Y') }}/{{ date('Y')+1 }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Timeline Section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-dark">
                        <h5 class="mb-0 text-white">Tahapan Pendaftaran</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="timeline-flow">
                            <!-- Step 1 -->
                            <div class="timeline-item">
                                <div class="timeline-marker">1</div>
                                <div class="timeline-content">
                                    <h4>Persiapan Dokumen</h4>
                                    <p>Siapkan dokumen-dokumen berikut sebelum melakukan pendaftaran:</p>
                                    <ul class="list-group list-group-flush mb-3">
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="mdi mdi-file-document-outline text-primary me-3"></i>
                                            <span>Kartu Keluarga (KK)</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="mdi mdi-file-document-outline text-primary me-3"></i>
                                            <span>Akta Kelahiran</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="mdi mdi-file-document-outline text-primary me-3"></i>
                                            <span>Ijazah/Surat Keterangan Lulus SD/MI</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="mdi mdi-file-document-outline text-primary me-3"></i>
                                            <span>Pas Foto berwarna ukuran 3x4</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="mdi mdi-file-document-outline text-primary me-3"></i>
                                            <span>Dokumen pendukung sesuai jalur pendaftaran</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Step 2 -->
                            <div class="timeline-item">
                                <div class="timeline-marker">2</div>
                                <div class="timeline-content">
                                    <h4>Registrasi Akun</h4>
                                    <p>Buat akun PPDB dengan mengikuti langkah-langkah berikut:</p>
                                    <ol class="mb-3">
                                        <li>Kunjungi halaman <a href="{{ route('login') }}">Login</a> dan klik tombol "Daftar"</li>
                                        <li>Isi formulir pendaftaran dengan data yang valid</li>
                                        <li>Verifikasi akun melalui email yang didaftarkan</li>
                                        <li>Login menggunakan username dan password yang telah dibuat</li>
                                    </ol>
                                    <div class="alert alert-info d-flex align-items-center">
                                        <i class="mdi mdi-information-outline me-2 font-size-20"></i>
                                        <div>Pastikan menggunakan alamat email aktif untuk menerima notifikasi penting</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Step 3 -->
                            <div class="timeline-item">
                                <div class="timeline-marker">3</div>
                                <div class="timeline-content">
                                    <h4>Pemilihan Jalur Pendaftaran</h4>
                                    <p>Pilih jalur pendaftaran yang sesuai dengan kriteria dan persyaratan:</p>
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title">Jalur Zonasi</h5>
                                                    <p class="card-text">Berdasarkan jarak tempat tinggal ke sekolah tujuan</p>
                                                    <div class="badge bg-light text-dark">Kuota: 50%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title">Jalur Prestasi</h5>
                                                    <p class="card-text">Berdasarkan prestasi akademik dan non-akademik</p>
                                                    <div class="badge bg-light text-dark">Kuota: 15%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title">Jalur Afirmasi</h5>
                                                    <p class="card-text">Untuk siswa dari keluarga tidak mampu</p>
                                                    <div class="badge bg-light text-dark">Kuota: 15%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title">Jalur Perpindahan Orang Tua</h5>
                                                    <p class="card-text">Untuk siswa yang orang tuanya dipindahtugaskan</p>
                                                    <div class="badge bg-light text-dark">Kuota: 5%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Step 4 -->
                            <div class="timeline-item">
                                <div class="timeline-marker">4</div>
                                <div class="timeline-content">
                                    <h4>Pengisian Formulir</h4>
                                    <p>Isi formulir pendaftaran dengan data yang benar dan lengkap:</p>
                                    <ul class="list-group list-group-flush mb-3">
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="mdi mdi-account-outline text-primary me-3"></i>
                                            <span>Data Pribadi Siswa</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="mdi mdi-account-group-outline text-primary me-3"></i>
                                            <span>Data Orang Tua/Wali</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="mdi mdi-school-outline text-primary me-3"></i>
                                            <span>Data Sekolah Asal</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="mdi mdi-map-marker-outline text-primary me-3"></i>
                                            <span>Data Alamat</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="mdi mdi-trophy-outline text-primary me-3"></i>
                                            <span>Data Prestasi (jika ada)</span>
                                        </li>
                                    </ul>
                                    <div class="alert alert-warning d-flex align-items-center">
                                        <i class="mdi mdi-alert-circle-outline me-2 font-size-20"></i>
                                        <div>Pastikan semua data yang diisi sesuai dengan dokumen asli</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Step 5 -->
                            <div class="timeline-item">
                                <div class="timeline-marker">5</div>
                                <div class="timeline-content">
                                    <h4>Unggah Dokumen</h4>
                                    <p>Unggah dokumen-dokumen yang telah disiapkan dalam format yang ditentukan:</p>
                                    <div class="table-responsive mb-3">
                                        <table class="table table-bordered">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Dokumen</th>
                                                    <th>Format</th>
                                                    <th>Ukuran Maks.</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Kartu Keluarga</td>
                                                    <td>JPG/PDF</td>
                                                    <td>2MB</td>
                                                </tr>
                                                <tr>
                                                    <td>Akta Kelahiran</td>
                                                    <td>JPG/PDF</td>
                                                    <td>2MB</td>
                                                </tr>
                                                <tr>
                                                    <td>Ijazah/SKL</td>
                                                    <td>JPG/PDF</td>
                                                    <td>2MB</td>
                                                </tr>
                                                <tr>
                                                    <td>Pas Foto</td>
                                                    <td>JPG</td>
                                                    <td>1MB</td>
                                                </tr>
                                                <tr>
                                                    <td>Dokumen Pendukung</td>
                                                    <td>JPG/PDF</td>
                                                    <td>2MB</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Step 6 -->
                            <div class="timeline-item">
                                <div class="timeline-marker">6</div>
                                <div class="timeline-content">
                                    <h4>Verifikasi dan Konfirmasi</h4>
                                    <p>Periksa kembali semua data yang telah diisi dan dokumen yang diunggah:</p>
                                    <ul class="mb-3">
                                        <li>Pastikan semua data sudah benar dan sesuai dengan dokumen asli</li>
                                        <li>Periksa status kelengkapan dokumen pada dashboard</li>
                                        <li>Klik tombol "Konfirmasi Pendaftaran" untuk menyelesaikan proses</li>
                                        <li>Cetak bukti pendaftaran sebagai tanda terima</li>
                                    </ul>
                                    <div class="alert alert-success d-flex align-items-center">
                                        <i class="mdi mdi-check-circle-outline me-2 font-size-20"></i>
                                        <div>Pendaftaran yang sudah dikonfirmasi tidak dapat diubah lagi</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Step 7 -->
                            <div class="timeline-item">
                                <div class="timeline-marker">7</div>
                                <div class="timeline-content">
                                    <h4>Pengumuman Hasil Seleksi</h4>
                                    <p>Hasil seleksi akan diumumkan sesuai jadwal yang telah ditentukan:</p>
                                    <ul class="mb-3">
                                        <li>Pengumuman dapat dilihat melalui website PPDB</li>
                                        <li>Login menggunakan akun yang telah didaftarkan</li>
                                        <li>Cek status penerimaan pada dashboard</li>
                                        <li>Cetak Surat Keterangan Diterima (jika lolos seleksi)</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Step 8 -->
                            <div class="timeline-item">
                                <div class="timeline-marker">8</div>
                                <div class="timeline-content">
                                    <h4>Daftar Ulang</h4>
                                    <p>Bagi calon siswa yang diterima, wajib melakukan daftar ulang:</p>
                                    <ul class="mb-3">
                                        <li>Daftar ulang dilakukan sesuai jadwal yang ditentukan</li>
                                        <li>Bawa dokumen asli untuk diverifikasi</li>
                                        <li>Ikuti prosedur daftar ulang sesuai ketentuan sekolah</li>
                                        <li>Siswa yang tidak melakukan daftar ulang dianggap mengundurkan diri</li>
                                    </ul>
                                    <div class="alert alert-danger d-flex align-items-center">
                                        <i class="mdi mdi-alert-outline me-2 font-size-20"></i>
                                        <div>Perhatikan batas waktu daftar ulang! Keterlambatan mengakibatkan kehilangan hak sebagai calon siswa</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- FAQ Section -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-dark">
                        <h5 class="mb-0 text-white">Pertanyaan Umum (FAQ)</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="accordion" id="faqAccordion">
                            <!-- FAQ Item 1 -->
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Bagaimana cara mendaftar PPDB Online?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>Untuk mendaftar PPDB Online, Anda perlu:</p>
                                        <ol>
                                            <li>Membuat akun pada website PPDB</li>
                                            <li>Login dan pilih jalur pendaftaran</li>
                                            <li>Isi formulir dengan data yang benar</li>
                                            <li>Unggah dokumen yang diperlukan</li>
                                            <li>Konfirmasi pendaftaran dan cetak bukti pendaftaran</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- FAQ Item 2 -->
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Apa saja dokumen yang perlu disiapkan?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>Dokumen yang perlu disiapkan antara lain:</p>
                                        <ul>
                                            <li>Kartu Keluarga (KK)</li>
                                            <li>Akta Kelahiran</li>
                                            <li>Ijazah/Surat Keterangan Lulus SD/MI</li>
                                            <li>Pas Foto berwarna ukuran 3x4</li>
                                            <li>Dokumen pendukung sesuai jalur pendaftaran (misalnya: sertifikat prestasi, SKTM, dll)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- FAQ Item 3 -->
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Bagaimana cara memilih sekolah tujuan?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>Pemilihan sekolah tujuan dilakukan saat mengisi formulir pendaftaran. Perhatikan hal-hal berikut:</p>
                                        <ul>
                                            <li>Untuk jalur zonasi, pilih sekolah yang berada dalam zona tempat tinggal Anda</li>
                                            <li>Untuk jalur prestasi, Anda dapat memilih sekolah sesuai dengan prestasi yang dimiliki</li>
                                            <li>Untuk jalur afirmasi dan perpindahan orang tua, pilih sekolah sesuai dengan ketentuan yang berlaku</li>
                                            <li>Pastikan memilih sekolah yang sesuai dengan kriteria dan persyaratan jalur yang dipilih</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- FAQ Item 4 -->
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Bagaimana jika terjadi kesalahan dalam pengisian data?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>Jika terjadi kesalahan dalam pengisian data:</p>
                                        <ul>
                                            <li>Selama belum melakukan konfirmasi pendaftaran, Anda masih dapat memperbaiki data</li>
                                            <li>Jika sudah melakukan konfirmasi, hubungi panitia PPDB melalui kontak yang tersedia</li>
                                            <li>Sertakan bukti pendaftaran dan jelaskan kesalahan yang terjadi</li>
                                            <li>Panitia akan memberikan petunjuk lebih lanjut untuk perbaikan data</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- FAQ Item 5 -->
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Bagaimana cara mengetahui hasil seleksi?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>Untuk mengetahui hasil seleksi:</p>
                                        <ul>
                                            <li>Login ke akun PPDB pada tanggal pengumuman hasil seleksi</li>
                                            <li>Lihat status penerimaan pada dashboard</li>
                                            <li>Jika diterima, cetak Surat Keterangan Diterima</li>
                                            <li>Hasil seleksi juga dapat dilihat pada website resmi PPDB atau papan pengumuman di sekolah</li>
                                            <li>Bagi yang diterima, segera lakukan daftar ulang sesuai jadwal yang ditentukan</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contact Section -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4>Butuh Bantuan?</h4>
                        <p class="mb-4">Jika Anda memiliki pertanyaan atau mengalami kesulitan dalam proses pendaftaran, silakan hubungi kami melalui:</p>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-phone font-size-24 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5>Telepon</h5>
                                        <p class="mb-0">(0263) 123456</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-email-outline font-size-24 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5>Email</h5>
                                        <p class="mb-0">ppdb@disdikporacijr.go.id</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-whatsapp font-size-24 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5>WhatsApp</h5>
                                        <p class="mb-0">0812-3456-7890</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-map-marker-outline font-size-24 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5>Kantor PPDB</h5>
                                        <p class="mb-0">Jl. Siliwangi No. 123, Cianjur</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-dark text-white border-0">
                    <div class="card-body p-4">
                        <h4 class="text-white mb-4">Jadwal Penting</h4>
                        <ul class="list-unstyled">
                            <li class="mb-3 pb-3 border-bottom border-secondary">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-calendar-clock me-3 font-size-24"></i>
                                    <div>
                                        <h6 class="text-white mb-1">Pendaftaran Akun</h6>
                                        <p class="mb-0 text-white-50">1 - 15 Juni {{ date('Y') }}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3 pb-3 border-bottom border-secondary">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-calendar-clock me-3 font-size-24"></i>
                                    <div>
                                        <h6 class="text-white mb-1">Verifikasi Berkas</h6>
                                        <p class="mb-0 text-white-50">16 - 20 Juni {{ date('Y') }}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3 pb-3 border-bottom border-secondary">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-calendar-clock me-3 font-size-24"></i>
                                    <div>
                                        <h6 class="text-white mb-1">Pengumuman Hasil</h6>
                                        <p class="mb-0 text-white-50">25 Juni {{ date('Y') }}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-calendar-clock me-3 font-size-24"></i>
                                    <div>
                                        <h6 class="text-white mb-1">Daftar Ulang</h6>
                                        <p class="mb-0 text-white-50">26 - 30 Juni {{ date('Y') }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="mt-4">
                            <a href="{{ route('schedule') }}" class="btn btn-light">Lihat Jadwal Lengkap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('styles')
    <style>
        /* Timeline Styles */
        .timeline-flow {
            position: relative;
            padding: 20px 0;
        }
        
        .timeline-item {
            position: relative;
            padding-left: 60px;
            margin-bottom: 40px;
        }
        
        .timeline-item:last-child {
            margin-bottom: 0;
        }
        
        .timeline-marker {
            position: absolute;
            left: 0;
            top: 0;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
            z-index: 1;
        }
        
        .timeline-item:before {
            content: '';
            position: absolute;
            left: 20px;
            top: 40px;
            bottom: -40px;
            width: 2px;
            background-color: #e9ecef;
        }
        
        .timeline-item:last-child:before {
            display: none;
        }
        
        .timeline-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        /* Accordion Styles */
        .accordion-item {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .accordion-button {
            background-color: #fff;
            font-weight: 500;
            padding: 1rem 1.25rem;
        }
        
        .accordion-button:not(.collapsed) {
            color: var(--primary-color);
            background-color: rgba(66, 133, 244, 0.05);
        }
        
        .accordion-button:focus {
            box-shadow: none;
            border-color: rgba(66, 133, 244, 0.5);
        }
        
        /* Responsive adjustments */
        @media (max-width: 767px) {
            .timeline-item {
                padding-left: 50px;
            }
            
            .timeline-marker {
                width: 35px;
                height: 35px;
                font-size: 16px;
            }
            
            .timeline-item:before {
                left: 17px;
            }
        }
    </style>
    @endpush
</div>