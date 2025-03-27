<div>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-clipboard-check-outline me-1 fs-4"></i>
                    <strong class="fs-4">Rekap Verifikasi dan Validasi</strong>
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
                    
                    <button class="btn btn-sm btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fas fa-search"></i>
                    </button>
                    
                    <!-- Loading Indicator -->
                    <div wire:loading wire:target="search, filterSekolah, filterJalur, applySearch" class="ms-2">
                        <div class="spinner-border spinner-border-sm text-dark" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive">
                <!-- Add search criteria information -->
                @if($search || $filterSekolah || $filterJalur)
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
                        <th style="width: 120px">JALUR</th>
                        <th style="width: 100px">JENIS</th>
                        <th style="width: 100px">AKSI</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datapendaftar as $pendaftar)
                        <tr>
                            <th scope="row" class="align-middle text-center">{{ ($datapendaftar->currentPage() - 1) * $datapendaftar->perPage() + $loop->iteration }}</th>
                            <td class="align-middle">{{ $pendaftar->users->username }}</td>
                            <td><div class="avatar-xs">
                                <span class="avatar-title rounded-circle bg-white text-white">
                                    @if($pendaftar->dapodik->jenis_kelamin == 'L')
                                        <img src="{{ asset('assets/images/icons8-man-192.png') }}" alt="Male" width="24">
                                    @else
                                        <img src="{{ asset('assets/images/icons8-woman-192.png') }}" alt="Female" width="24">
                                    @endif
                                </span>
                            </div></td>
                            <td>
                                <p class="mb-1 font-size-12">{{ $pendaftar->nisn }}</p>
                                <h5 class="font-size-15 mb-0 fw-bold">{{ $pendaftar->dapodik->nama }}</h5>
                            </td>
                            <td class="align-middle">{{ $pendaftar->asal_sekolah->nama }}</td>
                            <td class="align-middle"><span class="badge rounded-pill bg-light">{{ $pendaftar->jalur->nama_jalur }}</span></td>
                            <td class="align-middle">{{ $pendaftar->jenis }}</td>
                            <td class="align-middle"><a href="{{ route('operator.verval.pendaftar', $pendaftar->nisn) }}" class="btn btn-sm btn-dark">Verval</a></td>
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
</div>
