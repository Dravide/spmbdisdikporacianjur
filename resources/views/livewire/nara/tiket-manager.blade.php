<div>
    <div class="container-fluid">
        <!-- Page Title -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Manajemen Tiket</h4>
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
            <div class="col-md-4 mb-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari NISN, nama siswa..." wire:model.live.debounce.300ms="search">
                    <button class="btn btn-primary" type="button">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <select class="form-select" wire:model.live="filterJenis">
                    <option value="">Semua Jenis</option>
                    <option value="reset_password">Reset Password</option>
                    <option value="delete_account">Hapus Akun</option>
                    <option value="change_registration">Ubah Pendaftaran</option>
                </select>
            </div>
            <div class="col-md-3 mb-2">
                <select class="form-select" wire:model.live="filterStatus">
                    <option value="">Semua Status</option>
                    <option value="pending">Pending</option>
                    <option value="process">Diproses</option>
                    <option value="completed">Selesai</option>
                    <option value="rejected">Ditolak</option>
                </select>
            </div>
            <div class="col-md-2 mb-2">
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
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Sekolah</th>
                                        <th>Jenis Tiket</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($tikets as $index => $tiket)
                                        <tr>
                                            <td>{{ $tikets->firstItem() + $index }}</td>
                                            <td>{{ $tiket->nisn }}</td>
                                            <td>{{ $tiket->nama_siswa }}</td>
                                            <td>{{ $tiket->sekolah->nama_sekolah }}</td>
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
                                            <td>{{ $tiket->created_at->format('d M Y H:i') }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <button type="button" class="btn btn-primary btn-sm" wire:click="viewTiket({{ $tiket->id }})">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data tiket</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="d-flex justify-content-end mt-4">
                            {{ $tikets->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Detail Tiket -->
        @if($showModal)
        <div class="modal fade show" style="display: block; background-color: rgba(0,0,0,0.5);" tabindex="-1" aria-modal="true" role="dialog" id="detailTicketModal">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Tiket</h5>
                        <button type="button" class="btn-close" wire:click="$set('showModal', false)"></button>
                    </div>
                    <div class="modal-body">
                        @if($currentTiket)
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-muted mb-3">Informasi Pemohon</h6>
                                <div class="d-flex flex-column">
                                    <div class="mb-2">
                                        <span class="fw-medium">NISN:</span> {{ $currentTiket->nisn }}
                                    </div>
                                    <div class="mb-2">
                                        <span class="fw-medium">Nama Siswa:</span> {{ $currentTiket->nama_siswa }}
                                    </div>
                                    <div class="mb-2">
                                        <span class="fw-medium">Sekolah:</span> {{ $currentTiket->sekolah->nama_sekolah }}
                                    </div>
                                    <div class="mb-2">
                                        <span class="fw-medium">Operator:</span> {{ $currentTiket->operator->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-muted mb-3">Informasi Tiket</h6>
                                <div class="d-flex flex-column">
                                    <div class="mb-2">
                                        <span class="fw-medium">Jenis Tiket:</span> 
                                        @if($currentTiket->jenis_tiket == 'reset_password')
                                            <span class="badge bg-info">Reset Password</span>
                                        @elseif($currentTiket->jenis_tiket == 'delete_account')
                                            <span class="badge bg-danger">Hapus Akun</span>
                                        @elseif($currentTiket->jenis_tiket == 'change_registration')
                                            <span class="badge bg-warning">Ubah Pendaftaran</span>
                                        @endif
                                    </div>
                                    <div class="mb-2">
                                        <span class="fw-medium">Status:</span> 
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
                                    <div class="mb-2">
                                        <span class="fw-medium">Tanggal Dibuat:</span> {{ $currentTiket->created_at->format('d M Y H:i') }}
                                    </div>
                                    @if($currentTiket->processed_at)
                                    <div class="mb-2">
                                        <span class="fw-medium">Tanggal Diproses:</span> {{ \Carbon\Carbon::parse($currentTiket->processed_at)->format('d M Y H:i') }}
                                    </div>
                                    @endif
                                    @if($currentTiket->completed_at)
                                    <div class="mb-2">
                                        <span class="fw-medium">Tanggal Selesai:</span> {{ \Carbon\Carbon::parse($currentTiket->completed_at)->format('d M Y H:i') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-12">
                                <h6 class="text-muted mb-3">Deskripsi</h6>
                                <div class="border rounded p-3 bg-light">
                                    {{ $currentTiket->deskripsi }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-12">
                                <h6 class="text-muted mb-3">Catatan Admin</h6>
                                <textarea class="form-control @error('catatan_admin') is-invalid @enderror" wire:model="catatan_admin" rows="4" placeholder="Masukkan catatan untuk tiket ini..." {{ $currentTiket->status == 'completed' || $currentTiket->status == 'rejected' ? 'disabled' : '' }}></textarea>
                                @error('catatan_admin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="$set('showModal', false)">Tutup</button>
                        @if($currentTiket && $currentTiket->status == 'pending')
                            <button type="button" class="btn btn-info" wire:click="processTiket">Proses Tiket</button>
                            <button type="button" class="btn btn-danger" wire:click="rejectTiket">Tolak Tiket</button>
                        @endif
                        @if($currentTiket && $currentTiket->status == 'process')
                            <button type="button" class="btn btn-success" wire:click="completeTiket">Selesaikan Tiket</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
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
            
            Livewire.on('closeDetailModal', () => {
                document.getElementById('detailTicketModal').style.display = 'none';
            });
            
            Livewire.on('openDetailModal', () => {
                document.getElementById('detailTicketModal').style.display = 'block';
            });
        });
    </script>
    @endpush
</div>