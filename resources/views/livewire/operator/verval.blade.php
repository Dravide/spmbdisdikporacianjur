<div>
    <div class="card">
        <h4 class="card-header bg-dark text-white">Verifikasi dan Validasi</h4>
        <div class="card-body">
            <div class="row mb-3 align-items-center">
                <div class="col-auto">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">Filter Sekolah</span>
                        <select wire:model.live="filterSekolah" class="form-select form-select-sm" style="width: 250px">
                            <option value="">Semua Sekolah</option>
                            @foreach($sekolahList as $sekolah)
                                <option value="{{ $sekolah->id }}">{{ $sekolah->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
        
                
                <div class="col-auto ms-auto d-flex align-items-center">
                    <button class="btn btn-sm btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fas fa-search"></i> Pencarian
                    </button>
                    
                    <div wire:loading wire:target="search, filterSekolah, filterJalur, applySearch" class="ms-2">
                        <div class="spinner-border spinner-border-sm text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>USERNAME</th>
                        <th>NISN</th>
                        <th>NAMA LENGKAP</th>
                        <th>ASAL SEKOLAH</th>
                        <th>JALUR</th>
                        <th>JENIS</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($datapendaftar as $pendaftar)
                        <tr>
                            <th scope="row">{{ ($datapendaftar->currentPage() - 1) * $datapendaftar->perPage() + $loop->iteration }}</th>
                            <td>{{ $pendaftar->users->username }}</td>
                            <td>{{ $pendaftar->nisn }}</td>
                            <td><strong>{{ $pendaftar->dapodik->nama }}</strong></td>
                            <td>{{ $pendaftar->asal_sekolah->nama }}</td>
                            <td>{{ $pendaftar->jalur->nama_jalur }}</td>
                            <td><span class="badge badge-soft-{{ $pendaftar->jenis == "dalam" ? 'info' : 'warning' }}">{{ $pendaftar->jenis }}</span></td>
                            <td>
                                <span class="badge bg-warning">Belum Diverifikasi</span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-dark">
                                    <i class="fas fa-check-circle"></i> Verifikasi
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data yang ditemukan.</td>
                        </tr>
                    @endforelse
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
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="resetSearch" data-bs-dismiss="modal">Reset</button>
                    <button type="button" class="btn btn-primary" wire:click="applySearch" data-bs-dismiss="modal">
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
