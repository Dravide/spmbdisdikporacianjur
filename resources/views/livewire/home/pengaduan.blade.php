<div>
    <div class="container py-4">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-1">Pengaduan</h2>
                        <p class="text-muted">Sampaikan pengaduan, saran, atau pertanyaan Anda terkait SPMB SMP DISDIKPORA Cianjur Tahun {{ date('Y') }}/{{ date('Y')+1 }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Form Pengaduan -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4">Form Pengaduan</h4>
                        
                        @if($successMessage)
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-circle-outline me-2"></i>
                            {{ $successMessage }}
                            <button type="button" class="btn-close" wire:click="$set('successMessage', '')"></button>
                        </div>
                        @endif
                        
                        @if($errorMessage)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-alert-circle-outline me-2"></i>
                            {{ $errorMessage }}
                            <button type="button" class="btn-close" wire:click="$set('errorMessage', '')"></button>
                        </div>
                        @endif
                        
                        <form wire:submit.prevent="submitForm">
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" wire:model="nama" placeholder="Masukkan nama lengkap">
                                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" wire:model="email" placeholder="Masukkan alamat email">
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="no_telepon" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" wire:model="no_telepon" placeholder="Masukkan nomor telepon">
                                @error('no_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="subjek" class="form-label">Subjek <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('subjek') is-invalid @enderror" id="subjek" wire:model="subjek" placeholder="Masukkan subjek pengaduan">
                                @error('subjek') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="pesan" class="form-label">Pesan <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('pesan') is-invalid @enderror" id="pesan" wire:model="pesan" rows="5" placeholder="Tuliskan detail pengaduan Anda"></textarea>
                                @error('pesan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <!-- Replace the tujuan_type radio buttons section with this dropdown -->
                            <div class="mb-4">
                                <label for="tujuan" class="form-label">Tujuan Pengaduan <span class="text-danger">*</span></label>
                                <select class="form-select @error('tujuan') is-invalid @enderror" id="tujuan" wire:model="tujuan">
                                    <option value="">-- Pilih Tujuan Pengaduan --</option>
                                    @foreach($tujuanOptions as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('tujuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                
                                @if(count($sekolahList) == 0 && $tujuan != 'dinas')
                                    <div class="alert alert-info mt-2">
                                        <i class="mdi mdi-information-outline me-2"></i>
                                        Tidak ada sekolah yang tersedia saat ini.
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Captcha Field -->
                            <div class="mb-4">
                                <label for="captcha" class="form-label">Captcha <span class="text-danger">*</span></label>
                                <div class="captcha-container mb-2 d-flex align-items-center">
                                    <div>
                                        {!! captcha_img('math') !!}
                                    </div>
                                    <button type="button" class="btn btn-sm btn-secondary ms-2" id="refresh-captcha">
                                        <i class="mdi mdi-refresh"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control @error('captcha') is-invalid @enderror" id="captcha" wire:model="captcha" placeholder="Masukkan hasil perhitungan di atas">
                                @error('captcha') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-muted mb-0"><small>Kolom bertanda <span class="text-danger">*</span> wajib diisi</small></p>
                                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                    <span wire:loading.remove wire:target="submitForm">Kirim Pengaduan</span>
                                    <span wire:loading wire:target="submitForm">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Mengirim...
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Informasi Kontak -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4">Informasi Kontak</h4>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <i class="mdi mdi-email-outline font-size-24 text-primary"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>Email</h5>
                                <p class="mb-0">ppdb@disdikporacijr.go.id</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <i class="mdi mdi-phone-outline font-size-24 text-primary"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>Telepon</h5>
                                <p class="mb-0">(0263) 123456</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <i class="mdi mdi-whatsapp font-size-24 text-primary"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>WhatsApp</h5>
                                <p class="mb-0">+62 812-3456-7890</p>
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="mdi mdi-map-marker-outline font-size-24 text-primary"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>Alamat</h5>
                                <p class="mb-0">Jl. Siliwangi No. 123, Cianjur, Jawa Barat 43215</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- FAQ -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4">FAQ Pengaduan</h4>
                        
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Berapa lama pengaduan saya akan diproses?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Pengaduan akan diproses dalam waktu 1-3 hari kerja. Kami akan mengirimkan notifikasi melalui email yang terdaftar ketika pengaduan Anda telah ditindaklanjuti.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Bagaimana cara melacak status pengaduan saya?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Jika Anda login menggunakan akun, Anda dapat melihat status pengaduan di halaman profil. Jika tidak, Anda akan menerima notifikasi melalui email yang terdaftar.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Apakah saya bisa mengubah pengaduan yang sudah dikirim?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Pengaduan yang sudah dikirim tidak dapat diubah. Jika ada informasi tambahan, Anda dapat mengirimkan pengaduan baru dengan mereferensikan pengaduan sebelumnya.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- At the end of your file, before the closing </div> -->
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle captcha refresh button click
        document.getElementById('refresh-captcha').addEventListener('click', function() {
            fetch('/reload-captcha')
                .then(response => response.json())
                .then(data => {
                    document.querySelector('.captcha-container div').innerHTML = data.captcha;
                });
        });
    });
</script>
