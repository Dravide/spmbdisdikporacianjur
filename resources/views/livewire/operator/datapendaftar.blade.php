<div>
    <div class="card">
        {{-- <h4 class="card-header bg-dark text-white">Data Pendaftar</h4> --}}
        <div class="card-body">
            <div class="row mb-3 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-nature-people me-1 fs-4"></i>
                    <strong class="fs-4">Data Pendaftar</strong>
                </div>
              
                
           
                
                <div class="col-auto ms-auto d-flex align-items-center">
                    <div class="input-group input-group-sm me-2">
                        <span class="input-group-text bg-dark text-white"><span class="mdi mdi-school-outline"></span></span>
                        <select wire:model.live="filterSekolah" class="form-select form-select-sm" style="width: 250px">
                            <option value="">Semua Sekolah</option>
                            @foreach($sekolahList as $sekolah)
                                <option value="{{ $sekolah->id }}">{{ $sekolah->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-dark btn-sm waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-flag-outline me-1"></i> {{ $filterJalur ? $jalurList->where('id', $filterJalur)->first()->nama_jalur : 'Semua Jalur' }} <i class="mdi mdi-chevron-down ms-1"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" wire:click="$set('filterJalur', '')"> Semua Jalur</a>
                            @foreach($jalurList as $jalur)
                                <a class="dropdown-item" href="#" wire:click="$set('filterJalur', '{{ $jalur->id }}')">{{ $jalur->nama_jalur }}</a>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-dark btn-sm waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-check-circle-outline me-1"></i> 
                            @if($filterStatus == 'belum_konfirmasi')
                                Belum Konfirmasi
                            @elseif($filterStatus == 'siap_diperiksa')
                                Siap Diperiksa
                            @elseif($filterStatus == 'perbaikan')
                                Perbaikan
                            @elseif($filterStatus == 'selesai')
                                Selesai
                            @else
                                Semua Status
                            @endif
                            <i class="mdi mdi-chevron-down ms-1"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" wire:click="$set('filterStatus', '')">Semua Status</a>
                            <a class="dropdown-item" href="#" wire:click="$set('filterStatus', 'belum_konfirmasi')">Belum Konfirmasi</a>
                            <a class="dropdown-item" href="#" wire:click="$set('filterStatus', 'siap_diperiksa')">Siap Diperiksa</a>
                            <a class="dropdown-item" href="#" wire:click="$set('filterStatus', 'perbaikan')">Perbaikan</a>
                            <a class="dropdown-item" href="#" wire:click="$set('filterStatus', 'selesai')">Selesai</a>
                        </div>
                    </div>
                    
                    <button class="btn btn-sm btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fas fa-search"></i>
                    </button>
                    
                    <!-- Loading Indicator -->
                    <div wire:loading wire:target="search, filterSekolah, filterJalur, filterStatus, applySearch" class="ms-2">
                        <div class="spinner-border spinner-border-sm text-dark" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive">
                <!-- Add search criteria information -->
                @if($search || $filterSekolah || $filterJalur || $filterStatus)
                <div class="alert alert-dark mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">Filter yang diterapkan:</h6>
                            @if($search)
                                <div><strong>Pencarian:</strong> {{ $search }}</div>
                            @endif
                            @if($filterSekolah)
                                <div><strong>Sekolah:</strong> {{ $sekolahList->where('id', $filterSekolah)->first()->nama }}</div>
                            @endif
                            @if($filterJalur)
                                <div><strong>Jalur:</strong> {{ $jalurList->where('id', $filterJalur)->first()->nama_jalur }}</div>
                            @endif
                            @if($filterStatus)
                                <div><strong>Status:</strong> 
                                    @if($filterStatus == 'belum_konfirmasi')
                                        Belum Konfirmasi
                                    @elseif($filterStatus == 'siap_diperiksa')
                                        Siap Diperiksa
                                    @elseif($filterStatus == 'perbaikan')
                                        Perbaikan
                                    @elseif($filterStatus == 'selesai')
                                        Selesai
                                    @endif
                                </div>
                            @endif
                        </div>
                        <button wire:click="resetAllFilters" class="btn btn-sm btn-outline-dark">
                            <i class="fas fa-times me-1"></i> Reset Filter
                        </button>
                    </div>
                </div>
                @endif

                <table class="table table-hover mb-0">
                    <thead class="bg-dark text-white ">
                    <tr>
                        <th style="width: 50px">NO</th>
                        <th style="width: 120px">USERNAME</th>
                        <th style="width: 40px"></th>
                        <th style="width: 250px">NISN DAN NAMA</th>
                        <th style="width: 200px">ASAL SEKOLAH</th>
                        <th style="width: 120px">JALUR</th>
                        <th style="width: 100px">STATUS</th>
            
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datapendaftar as $pendaftar)
                        <tr>
                            <th scope="row" class="align-middle text-center">{{ ($datapendaftar->currentPage() - 1) * $datapendaftar->perPage() + $loop->iteration }}</th>
                
                            <td class="align-middle">{{ $pendaftar->users->username }}</td>
                            <td><div class="avatar-xs">
                                <span class="avatar-title rounded-circle bg-white  text-white">
@if($pendaftar->dapodik->jenis_kelamin == 'L')
    <img src="{{ asset('assets/images/icons8-man-192.png') }}" alt="Male" width="24">
@else
    <img src="{{ asset('assets/images/icons8-woman-192.png') }}" alt="Female" width="24">
@endif
                                </span>
                            </div></td>
                            <td>
                                
                                <p class="mb-1 font-size-12">{{ $pendaftar->nisn }}</p>
                                <h5 class="font-size-15 mb-0 fw-bold">
                                    <a href="#" class="text-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvasPendaftar{{ $pendaftar->id }}" aria-controls="offcanvasPendaftar{{ $pendaftar->id }}">
                                        {{ $pendaftar->dapodik->nama }}
                                    </a>
                                </h5>
                            </td>
        
                            <td class="align-middle">{{ $pendaftar->asal_sekolah->nama }}</td>
                            <td class="align-middle"><span class="badge rounded-pill bg-light">{{ $pendaftar->jalur->nama_jalur }}</span></td>
                            <td class="align-middle text-center">
                                {!! $this->getStatusHtml($pendaftar) !!}
                            </td>
                    
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3">
                {{ $datapendaftar->links() }}
            </div>
        </div>
    </div>
    
    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel">Pencarian Lanjutan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="searchInput" class="form-label">Kata Kunci Pencarian</label>
                        <input type="text" class="form-control" id="searchInput" wire:model.defer="search" placeholder="Masukkan kata kunci...">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Cari Berdasarkan</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" wire:model.defer="searchFields.username" id="checkUsername">
                                    <label class="form-check-label" for="checkUsername">Username</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" wire:model.defer="searchFields.nisn" id="checkNisn">
                                    <label class="form-check-label" for="checkNisn">NISN</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" wire:model.defer="searchFields.nama" id="checkNama">
                                    <label class="form-check-label" for="checkNama">Nama</label>
                                </div>
                            </div>
                            <!-- Removed asal_sekolah and jalur checkboxes since they're now handled by dropdown filters -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" wire:click="resetSearch" data-bs-dismiss="modal">Reset</button>
                    <button type="button" class="btn btn-dark btn-sm" wire:click="applySearch" data-bs-dismiss="modal">
                        <span wire:loading.remove wire:target="applySearch">Terapkan</span>
                        <span wire:loading wire:target="applySearch">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Memproses...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Backdrop -->
    @if($showSearchModal)
    <div class="modal-backdrop fade show"></div>
    @endif
    @push('scripts')
        <script>
            document.addEventListener('livewire:initialized', function () {
                const searchModal = new bootstrap.Modal(document.getElementById('searchModal'));
                
                Livewire.on('closeModal', () => {
                    searchModal.hide();
                });
                
                Livewire.on('openModal', () => {
                    searchModal.show();
                });
            });
        </script>
    @endpush
    
    <!-- Offcanvas Detail Pendaftar -->
    @foreach($datapendaftar as $pendaftar)
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasPendaftar{{ $pendaftar->id }}" aria-labelledby="offcanvasPendaftarLabel{{ $pendaftar->id }}">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasPendaftarLabel{{ $pendaftar->id }}">
                Detail Pendaftar
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="text-center mb-4">
                <div class="avatar-md mx-auto mb-3">
                    <span class="avatar-title rounded-circle bg-dark text-white display-6">
                        {{ Str::upper(Str::substr($pendaftar->dapodik->nama, 0, 1)) }}
                    </span>
                </div>
                <h5 class="font-size-16 mb-1">{{ $pendaftar->dapodik->nama }}</h5>
                <p class="text-muted mb-2">NISN: {{ $pendaftar->nisn }}</p>
                <div class="badge bg-light text-dark mb-3">{{ $pendaftar->jalur->nama_jalur }}</div>
            </div>
            
            <div class="accordion" id="accordionPendaftar{{ $pendaftar->id }}">
                <!-- Informasi Dasar -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingBasic{{ $pendaftar->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBasic{{ $pendaftar->id }}" aria-expanded="true" aria-controls="collapseBasic{{ $pendaftar->id }}">
                            <i class="mdi mdi-account-outline me-2"></i> Informasi Dasar
                        </button>
                    </h2>
                    <div id="collapseBasic{{ $pendaftar->id }}" class="accordion-collapse collapse show" aria-labelledby="headingBasic{{ $pendaftar->id }}" data-bs-parent="#accordionPendaftar{{ $pendaftar->id }}">
                        <div class="accordion-body">
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Username</div>
                                <div class="col-7">{{ $pendaftar->users->username }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">NIK</div>
                                <div class="col-7">{{ $pendaftar->dapodik->nik ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">NISN</div>
                                <div class="col-7">{{ $pendaftar->nisn }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Jenis Kelamin</div>
                                <div class="col-7">{{ $pendaftar->dapodik->jenis_kelamin ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Tempat Lahir</div>
                                <div class="col-7">{{ $pendaftar->dapodik->tempat_lahir ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Tanggal Lahir</div>
                                <div class="col-7">{{ $pendaftar->dapodik->tanggal_lahir ? date('d-m-Y', strtotime($pendaftar->dapodik->tanggal_lahir)) : '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Asal Sekolah</div>
                                <div class="col-7">{{ $pendaftar->asal_sekolah->nama }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Status</div>
                                <div class="col-7">{!! $this->getStatusHtml($pendaftar) !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Alamat -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingAddress{{ $pendaftar->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAddress{{ $pendaftar->id }}" aria-expanded="false" aria-controls="collapseAddress{{ $pendaftar->id }}">
                            <i class="mdi mdi-home-outline me-2"></i> Alamat
                        </button>
                    </h2>
                    <div id="collapseAddress{{ $pendaftar->id }}" class="accordion-collapse collapse" aria-labelledby="headingAddress{{ $pendaftar->id }}" data-bs-parent="#accordionPendaftar{{ $pendaftar->id }}">
                        <div class="accordion-body">
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Alamat Jalan</div>
                                <div class="col-7">{{ $pendaftar->dapodik->alamat_jalan ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Desa/Kelurahan</div>
                                <div class="col-7">{{ $pendaftar->dapodik->desa_kelurahan ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">RT</div>
                                <div class="col-7">{{ $pendaftar->dapodik->rt ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">RW</div>
                                <div class="col-7">{{ $pendaftar->dapodik->rw ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Nama Dusun</div>
                                <div class="col-7">{{ $pendaftar->dapodik->nama_dusun ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Koordinat</div>
                                <div class="col-7">
                                    @if($pendaftar->koordinat->latitude && $pendaftar->koordinat->longitude)
                                        <a href="https://maps.google.com/?q={{ $pendaftar->koordinat->latitude }},{{ $pendaftar->koordinat->longitude }}" target="_blank" class="text-primary">
                                            {{ $pendaftar->koordinat->latitude }}, {{ $pendaftar->koordinat->longitude }}
                                            <i class="mdi mdi-map-marker-outline ms-1"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Data Orang Tua -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingParents{{ $pendaftar->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseParents{{ $pendaftar->id }}" aria-expanded="false" aria-controls="collapseParents{{ $pendaftar->id }}">
                            <i class="mdi mdi-account-group-outline me-2"></i> Data Orang Tua
                        </button>
                    </h2>
                    <div id="collapseParents{{ $pendaftar->id }}" class="accordion-collapse collapse" aria-labelledby="headingParents{{ $pendaftar->id }}" data-bs-parent="#accordionPendaftar{{ $pendaftar->id }}">
                        <div class="accordion-body">
                            <h6 class="mb-2">Ibu</h6>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Nama Ibu</div>
                                <div class="col-7">{{ $pendaftar->dapodik->nama_ibu_kandung ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Pekerjaan</div>
                                <div class="col-7">{{ $pendaftar->dapodik->pekerjaan_ibu ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Penghasilan</div>
                                <div class="col-7">{{ $pendaftar->dapodik->penghasilan_ibu ?? '-' }}</div>
                            </div>
                            
                            <h6 class="mt-3 mb-2">Ayah</h6>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Nama Ayah</div>
                                <div class="col-7">{{ $pendaftar->dapodik->nama_ayah ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Pekerjaan</div>
                                <div class="col-7">{{ $pendaftar->dapodik->pekerjaan_ayah ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Penghasilan</div>
                                <div class="col-7">{{ $pendaftar->dapodik->penghasilan_ayah ?? '-' }}</div>
                            </div>
                            
                            <h6 class="mt-3 mb-2">Wali</h6>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Nama Wali</div>
                                <div class="col-7">{{ $pendaftar->dapodik->nama_wali ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Pekerjaan</div>
                                <div class="col-7">{{ $pendaftar->dapodik->pekerjaan_wali ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Penghasilan</div>
                                <div class="col-7">{{ $pendaftar->dapodik->penghasilan_wali ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Informasi Tambahan -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingAdditional{{ $pendaftar->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdditional{{ $pendaftar->id }}" aria-expanded="false" aria-controls="collapseAdditional{{ $pendaftar->id }}">
                            <i class="mdi mdi-information-outline me-2"></i> Informasi Tambahan
                        </button>
                    </h2>
                    <div id="collapseAdditional{{ $pendaftar->id }}" class="accordion-collapse collapse" aria-labelledby="headingAdditional{{ $pendaftar->id }}" data-bs-parent="#accordionPendaftar{{ $pendaftar->id }}">
                        <div class="accordion-body">
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Kebutuhan Khusus</div>
                                <div class="col-7">{{ $pendaftar->dapodik->kebutuhan_khusus ?? 'Tidak' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">No. KIP</div>
                                <div class="col-7">{{ $pendaftar->dapodik->no_kip ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">No. PKH</div>
                                <div class="col-7">{{ $pendaftar->dapodik->no_pkh ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Indikasi ATS</div>
                                <div class="col-7">{{ $pendaftar->dapodik->indikasi_ats ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted">Tingkat Pendidikan</div>
                                <div class="col-7">{{ $pendaftar->dapodik->tingkat_pendidikan ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="d-grid gap-2 mt-4">
                <a href="#" class="btn btn-dark">
                    <i class="mdi mdi-eye me-1"></i> Lihat Detail Lengkap
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
