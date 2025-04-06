<div>
    <div class="container py-4">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-1">Data Pendaftar SPMB</h2>
                        <p class="text-muted">Informasi pendaftar SPMB SMP DISDIKPORA Cianjur Tahun {{ date('Y') }}/{{ date('Y')+1 }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md">
                                <span class="avatar-title bg-dark rounded text-white">
                                    <i class="mdi mdi-account-group font-size-24"></i>
                                </span>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-0">{{ number_format($totalPendaftar) }}</h5>
                                <p class="text-muted mb-0">Total Pendaftar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md">
                                <span class="avatar-title bg-dark rounded text-white">
                                    <i class="mdi mdi-school font-size-24"></i>
                                </span>
                            </div>
                    
                            <div class="ms-3">
                                <h5 class="mb-0">{{ number_format($totalSekolah) }}</h5>
                                <p class="text-muted mb-0">Sekolah Terdaftar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md">
                                <span class="avatar-title bg-dark rounded text-white">
                                    <i class="mdi mdi-flag font-size-24"></i>
                                </span>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-0">{{ number_format($totalJalur) }}</h5>
                                <p class="text-muted mb-0">Jalur Pendaftaran</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm">
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
                                    <option value="{{ $sekolah->id }}">{{ $sekolah->nama_sekolah }}</option>
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
                                    <div><strong>Sekolah:</strong> {{ $sekolahList->where('id', $filterSekolah)->first()->nama_sekolah }}</div>
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
                        <thead class="bg-dark text-white">
                        <tr>
                            <th style="width: 50px">NO</th>
                            <th style="width: 120px">USERNAME</th>
                            <th style="width: 40px"></th>
                            <th style="width: 250px">NISN DAN NAMA</th>
                            <th style="width: 200px">ASAL SEKOLAH</th>
                            <th style="width: 200px">SEKOLAH TUJUAN</th>
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
                                    <span class="avatar-title rounded-circle bg-white text-white">
                                        @if($pendaftar->dapodik && $pendaftar->dapodik->jenis_kelamin == 'L')
                                            <img src="{{ asset('assets/images/icons8-man-192.png') }}" alt="Male" width="24">
                                        @else
                                            <img src="{{ asset('assets/images/icons8-woman-192.png') }}" alt="Female" width="24">
                                        @endif
                                    </span>
                                </div></td>
                                <td>
                                    <p class="mb-1 font-size-12">{{ $pendaftar->nisn }}</p>
                                    <h5 class="font-size-15 mb-0 fw-bold">
                                        <a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#modalPendaftar{{ $pendaftar->id }}">
                                            {{ $pendaftar->dapodik ? $pendaftar->dapodik->nama : 'Nama tidak tersedia' }}
                                        </a>
                                    </h5>
                                </td>
            
                                <td class="align-middle">{{ $pendaftar->asal_sekolah ? $pendaftar->asal_sekolah->nama : 'Tidak tersedia' }}</td>
                                <td class="align-middle">{{ $pendaftar->sekolah ? $pendaftar->sekolah->nama_sekolah : 'Tidak tersedia' }}</td>
                                <td class="align-middle"><span class="badge rounded-pill bg-light">{{ $pendaftar->jalur ? $pendaftar->jalur->nama_jalur : 'Tidak tersedia' }}</span></td>
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
                            <div class="col-md-6">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" wire:model.defer="searchFields.asal_sekolah" id="checkAsalSekolah">
                                    <label class="form-check-label" for="checkAsalSekolah">Asal Sekolah</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" wire:model.defer="searchFields.jalur" id="checkJalur">
                                    <label class="form-check-label" for="checkJalur">Jalur</label>
                                </div>
                            </div>
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
    
    <!-- Detail Pendaftar Modal -->
    @foreach($datapendaftar as $pendaftar)
    <div class="modal fade" id="modalPendaftar{{ $pendaftar->id }}" tabindex="-1" aria-labelledby="modalPendaftarLabel{{ $pendaftar->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPendaftarLabel{{ $pendaftar->id }}">
                        Detail Pendaftar
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <div class="avatar-md mx-auto mb-3">
                            <span class="avatar-title rounded-circle bg-dark text-white display-6">
                                {{ $pendaftar->dapodik ? Str::upper(Str::substr($pendaftar->dapodik->nama, 0, 1)) : 'N' }}
                            </span>
                        </div>
                        <h5 class="font-size-16 mb-1">{{ $pendaftar->dapodik ? $pendaftar->dapodik->nama : 'Nama tidak tersedia' }}</h5>
                        <p class="text-muted mb-2">NISN: {{ $pendaftar->nisn }}</p>
                        <div class="badge bg-light text-dark mb-3">{{ $pendaftar->jalur ? $pendaftar->jalur->nama_jalur : 'Tidak tersedia' }}</div>
                    </div>
                    
                    <div class="accordion" id="accordionPendaftar{{ $pendaftar->id }}">
                        <!-- Accordion items remain the same -->
                    </div>
                    
                    <div class="mt-4 text-center">
                        <p class="text-muted mb-0">Terdaftar pada {{ $pendaftar->created_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>