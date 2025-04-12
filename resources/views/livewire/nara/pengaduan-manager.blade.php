<div>
    <div class="container-fluid">
        <!-- Page Title -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Manajemen Pengaduan</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Flash Message -->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Filters -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari pengaduan..." wire:model.live.debounce.300ms="search">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select" wire:model.live="filterTujuan">
                    <option value="">Semua Tujuan</option>
                    <option value="dinas">Dinas</option>
                    <option value="sekolah">Sekolah</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" wire:model.live="filterStatus">
                    <option value="">Semua Status</option>
                    <option value="pending">Pending</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-light w-100" wire:click="resetFilters">
                    <i class="mdi mdi-refresh"></i> Reset
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if($pengaduan->isEmpty())
                            <div class="text-center py-5">
                                <div class="avatar-md mx-auto mb-4">
                                    <div class="avatar-title rounded-circle bg-light text-primary">
                                        <i class="mdi mdi-email-open-outline font-size-24"></i>
                                    </div>
                                </div>
                                <h5>Tidak ada pengaduan yang ditemukan</h5>
                                <p class="text-muted">Belum ada pengaduan yang masuk atau pengaduan tidak sesuai dengan filter yang diterapkan.</p>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="15%">Tanggal</th>
                                            <th width="20%">Pengirim</th>
                                            <th width="15%">Tujuan</th>
                                            <th width="20%">Subjek</th>
                                            <th width="10%">Status</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pengaduan as $index => $item)
                                            <tr>
                                                <td>{{ $pengaduan->firstItem() + $index }}</td>
                                                <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-medium">{{ $item->nama }}</span>
                                                        <small class="text-muted">{{ $item->email }}</small>
                                                        <small class="text-muted">{{ $item->no_telepon }}</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($item->tujuan_dinas)
                                                        <span class="badge bg-primary">Dinas Pendidikan</span>
                                                    @else
                                                        <span class="badge bg-info">{{ $item->sekolah->nama_sekolah ?? 'Sekolah' }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->subjek }}</td>
                                                <td>
                                                    @if($item->status == 'pending')
                                                        <span class="badge bg-warning">Pending</span>
                                                    @elseif($item->status == 'proses')
                                                        <span class="badge bg-info">Proses</span>
                                                    @elseif($item->status == 'selesai')
                                                        <span class="badge bg-success">Selesai</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button type="button" class="btn btn-sm btn-primary" wire:click="openModal({{ $item->id }})">
                                                            <i class="mdi mdi-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-danger" wire:click="confirmDelete({{ $item->id }})">
                                                            <i class="mdi mdi-trash-can"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="d-flex justify-content-end mt-4">
                                {{ $pengaduan->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Detail Pengaduan -->
        @if($showModal)
        <div class="modal fade show" style="display: block; background-color: rgba(0,0,0,0.5);" tabindex="-1" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Pengaduan</h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="text-muted mb-2">Informasi Pengirim</h6>
                                <div class="d-flex flex-column">
                                    <div class="mb-2">
                                        <span class="fw-medium">Nama:</span> {{ $currentPengaduan->nama }}
                                    </div>
                                    <div class="mb-2">
                                        <span class="fw-medium">Email:</span> {{ $currentPengaduan->email }}
                                    </div>
                                    <div class="mb-2">
                                        <span class="fw-medium">No. Telepon:</span> {{ $currentPengaduan->no_telepon }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-muted mb-2">Informasi Pengaduan</h6>
                                <div class="d-flex flex-column">
                                    <div class="mb-2">
                                        <span class="fw-medium">Tanggal:</span> {{ $currentPengaduan->created_at->format('d M Y H:i') }}
                                    </div>
                                    <div class="mb-2">
                                        <span class="fw-medium">Tujuan:</span> 
                                        @if($currentPengaduan->tujuan_dinas)
                                            <span class="badge bg-primary">Dinas Pendidikan</span>
                                        @else
                                            <span class="badge bg-info">{{ $currentPengaduan->sekolah->nama_sekolah ?? 'Sekolah' }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-2">
                                        <span class="fw-medium">Status:</span> 
                                        @if($currentPengaduan->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($currentPengaduan->status == 'proses')
                                            <span class="badge bg-info">Proses</span>
                                        @elseif($currentPengaduan->status == 'selesai')
                                            <span class="badge bg-success">Selesai</span>
                                        @endif
                                    </div>
                                    @if($currentPengaduan->tanggal_tanggapan)
                                    <div class="mb-2">
                                        <span class="fw-medium">Tanggal Tanggapan:</span> {{ \Carbon\Carbon::parse($currentPengaduan->tanggal_tanggapan)->format('d M Y H:i') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-muted mb-2">Subjek</h6>
                            <p class="fw-medium">{{ $currentPengaduan->subjek }}</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-muted mb-2">Isi Pengaduan</h6>
                            <div class="border rounded p-3 bg-light">
                                {{ $currentPengaduan->pesan }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="text-muted mb-2">Tanggapan</h6>
                            <textarea class="form-control @error('tanggapan') is-invalid @enderror" rows="5" wire:model="tanggapan" placeholder="Tulis tanggapan Anda di sini..."></textarea>
                            @error('tanggapan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" wire:click="closeModal">Tutup</button>
                        <button type="button" class="btn btn-primary" wire:click="submitTanggapan">Kirim Tanggapan</button>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Delete Confirmation Modal -->
        @if($confirmingDeletion)
        <div class="modal fade show" style="display: block; background-color: rgba(0,0,0,0.5);" tabindex="-1" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" wire:click="cancelDelete"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus pengaduan ini? Tindakan ini tidak dapat dibatalkan.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" wire:click="cancelDelete">Batal</button>
                        <button type="button" class="btn btn-danger" wire:click="deletePengaduan">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>