<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Tiket Permintaan</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 col-sm-6 mb-2">
                            <div class="search-box me-2 d-inline-block w-100">
                                <div class="position-relative">
                                    <input type="text" class="form-control" wire:model.live="search" placeholder="Cari NISN, nama siswa...">
                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-2">
                            <select class="form-select" wire:model.live="filterStatus">
                                <option value="">Semua Status</option>
                                <option value="pending">Pending</option>
                                <option value="process">Diproses</option>
                                <option value="completed">Selesai</option>
                                <option value="rejected">Ditolak</option>
                            </select>
                        </div>
                        <div class="col-md-5 col-sm-12 mb-2">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#createTicketModal">
                                    <i class="mdi mdi-plus me-1"></i> Buat Tiket
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;" class="align-middle">No</th>
                                    <th class="align-middle">NISN</th>
                                    <th class="align-middle">Nama Siswa</th>
                                    <th class="align-middle">Jenis Tiket</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Tanggal</th>
                                    <th class="align-middle text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tikets as $tiket)
                                <tr>
                                    <td>{{ ($tikets->currentPage() - 1) * $tikets->perPage() + $loop->iteration }}</td>
                                    <td>{{ $tiket->nisn }}</td>
                                    <td>{{ $tiket->nama_siswa }}</td>
                                    <td>
                                        @if($tiket->jenis_tiket == 'reset_password')
                                            <span class="badge bg-info">Reset Password</span>
                                        @elseif($tiket->jenis_tiket == 'delete_account')
                                            <span class="badge bg-danger">Hapus Akun</span>
                                        @elseif($tiket->jenis_tiket == 'change_registration')
                                            <span class="badge bg-warning">Ubah Pendaftaran</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($tiket->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($tiket->status == 'process')
                                            <span class="badge bg-info">Diproses</span>
                                        @elseif($tiket->status == 'completed')
                                            <span class="badge bg-success">Selesai</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>{{ $tiket->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <button type="button" class="btn btn-primary btn-sm" wire:click="viewTiket({{ $tiket->id }})">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                            @if($tiket->status == 'pending')
                                            <button type="button" class="btn btn-danger btn-sm" wire:click="cancelTiket({{ $tiket->id }})" onclick="return confirm('Apakah Anda yakin ingin membatalkan tiket ini?')">
                                                <i class="mdi mdi-close"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data tiket</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            {{ $tikets->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Buat Tiket -->
    <div class="modal fade" id="createTicketModal" tabindex="-1" aria-labelledby="createTicketModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTicketModalLabel">Buat Tiket Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="createTiket">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Jenis Tiket</label>
                            <select class="form-select @error('jenis_tiket') is-invalid @enderror" wire:model="jenis_tiket">
                                <option value="">Pilih Jenis Tiket</option>
                                <option value="reset_password">Reset Password</option>
                                <option value="delete_account">Hapus Akun</option>
                                <option value="change_registration">Ubah Jenis Pendaftaran</option>
                            </select>
                            @error('jenis_tiket') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">NISN</label>
                            <input type="text" class="form-control @error('nisn') is-invalid @enderror" wire:model="nisn" placeholder="Masukkan NISN">
                            @error('nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" wire:model="nama_siswa" placeholder="Masukkan Nama Siswa">
                            @error('nama_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" wire:model="deskripsi" rows="4" placeholder="Jelaskan detail permintaan..."></textarea>
                            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim Tiket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Detail Tiket -->
    <div class="modal fade" id="detailTicketModal" tabindex="-1" aria-labelledby="detailTicketModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailTicketModalLabel">Detail Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($currentTiket)
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row mb-3">
                                <div class="col-5 text-muted">Jenis Tiket</div>
                                <div class="col-7">
                                    @if($currentTiket->jenis_tiket == 'reset_password')
                                        <span class="badge bg-info">Reset Password</span>
                                    @elseif($currentTiket->jenis_tiket == 'delete_account')
                                        <span class="badge bg-danger">Hapus Akun</span>
                                    @elseif($currentTiket->jenis_tiket == 'change_registration')
                                        <span class="badge bg-warning">Ubah Pendaftaran</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-5 text-muted">Status</div>
                                <div class="col-7">
                                    @if($currentTiket->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($currentTiket->status == 'process')
                                        <span class="badge bg-info">Diproses</span>
                                    @elseif($currentTiket->status == 'completed')
                                        <span class="badge bg-success">Selesai</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-5 text-muted">NISN</div>
                                <div class="col-7">{{ $currentTiket->nisn }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-5 text-muted">Nama Siswa</div>
                                <div class="col-7">{{ $currentTiket->nama_siswa }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-5 text-muted">Tanggal Dibuat</div>
                                <div class="col-7">{{ $currentTiket->created_at->format('d/m/Y H:i') }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-5 text-muted">Deskripsi</div>
                                <div class="col-7">{{ $currentTiket->deskripsi }}</div>
                            </div>
                            @if($currentTiket->processed_at)
                            <div class="row mb-3">
                                <div class="col-5 text-muted">Tanggal Diproses</div>
                                <div class="col-7">{{ \Carbon\Carbon::parse($currentTiket->processed_at)->format('d/m/Y H:i') }}</div>
                            </div>
                            @endif
                            @if($currentTiket->catatan_admin)
                            <div class="row mb-3">
                                <div class="col-5 text-muted">Catatan Admin</div>
                                <div class="col-7">{{ $currentTiket->catatan_admin }}</div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    @if($currentTiket && $currentTiket->status == 'pending')
                    <button type="button" class="btn btn-danger" wire:click="cancelTiket({{ $currentTiket->id }})" onclick="return confirm('Apakah Anda yakin ingin membatalkan tiket ini?')" data-bs-dismiss="modal">Batalkan Tiket</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('alert', (data) => {
                Swal.fire({
                    icon: data[0].type,
                    title: 'Notifikasi',
                    text: data[0].message,
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        });

        window.addEventListener('livewire:initialized', function() {
            const createTicketModal = new bootstrap.Modal(document.getElementById('createTicketModal'));
            const detailTicketModal = new bootstrap.Modal(document.getElementById('detailTicketModal'));
            
            Livewire.on('openModal', () => {
                createTicketModal.show();
            });
            
            Livewire.on('openDetailModal', () => {
                detailTicketModal.show();
            });
        });
    </script>
    @endpush
</div>