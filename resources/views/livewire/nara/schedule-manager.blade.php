<div>
    <div class="container-fluid">
        <!-- Page Title -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Manajemen Jadwal PPDB</h4>
                            <button wire:click="create" class="btn btn-primary">
                                <i class="mdi mdi-plus-circle me-1"></i> Tambah Jadwal
                            </button>
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
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari jadwal..." wire:model.live.debounce.300ms="search">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                </div>
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
                                        <th>Judul</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Status</th>
                                        <th>Icon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($schedules as $schedule)
                                        <tr>
                                            <td>{{ $schedule->title }}</td>
                                            <td>{{ $schedule->start_date->format('d M Y') }}</td>
                                            <td>{{ $schedule->end_date->format('d M Y') }}</td>
                                            <td>
                                                @if($schedule->status == 'active')
                                                    <span class="badge bg-success">Sedang Berlangsung</span>
                                                @elseif($schedule->status == 'completed')
                                                    <span class="badge bg-secondary">Selesai</span>
                                                @else
                                                    <span class="badge bg-info">Akan Datang</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($schedule->icon)
                                                    <i class="mdi {{ $schedule->icon }}"></i>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                <button wire:click="edit({{ $schedule->id }})" class="btn btn-sm btn-info">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button wire:click="confirmDelete({{ $schedule->id }})" class="btn btn-sm btn-danger">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data jadwal</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $schedules->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create/Edit Modal -->
    <div class="modal fade @if($isOpen) show @endif" tabindex="-1" role="dialog" style="@if($isOpen) display: block; @else display: none; @endif">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $scheduleId ? 'Edit Jadwal' : 'Tambah Jadwal Baru' }}</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Jadwal</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model="title">
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="start_date" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" wire:model="start_date">
                                @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="end_date" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" wire:model="end_date">
                                @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" wire:model="description" rows="4"></textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon (Material Design Icons)</label>
                            <div class="input-group">
                                <span class="input-group-text">mdi-</span>
                                <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" wire:model="icon" placeholder="calendar-check">
                            </div>
                            <small class="form-text text-muted">Contoh: mdi-calendar-check, mdi-account-plus, dll. Lihat <a href="https://materialdesignicons.com/" target="_blank">Material Design Icons</a></small>
                            @error('icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade @if($isOpen) show @endif" style="@if($isOpen) display: block; @else display: none; @endif"></div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade @if($confirmingDeletion) show @endif" tabindex="-1" role="dialog" style="@if($confirmingDeletion) display: block; @else display: none; @endif">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" wire:click="cancelDelete" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus jadwal ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="cancelDelete">Batal</button>
                    <button type="button" class="btn btn-danger" wire:click="delete">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade @if($confirmingDeletion) show @endif" style="@if($confirmingDeletion) display: block; @else display: none; @endif"></div>
</div>
