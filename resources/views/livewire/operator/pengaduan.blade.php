<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Pengaduan Masuk</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('operator.home') }}">Beranda</a></li>
                        <li class="breadcrumb-item active">Pengaduan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title">Daftar Pengaduan</h4>
                        <div class="d-flex gap-2">
                            <div class="input-group" style="width: 250px;">
                                <input type="text" class="form-control" placeholder="Cari pengaduan..." wire:model.live.debounce.300ms="search">
                                <button class="btn btn-primary" type="button">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                            </div>
                            <select class="form-select" style="width: 150px;" wire:model.live="filterStatus">
                                <option value="">Semua Status</option>
                                <option value="pending">Pending</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                            </select>
                            <button class="btn btn-light" wire:click="resetFilters">
                                <i class="mdi mdi-refresh"></i> Reset
                            </button>
                        </div>
                    </div>

                    @if($pengaduan->isEmpty())
                        <div class="text-center py-5">
                            <div class="avatar-md mx-auto mb-4">
                                <div class="avatar-title rounded-circle bg-light text-primary">
                                    <i class="mdi mdi-email-open-outline font-size-24"></i>
                                </div>
                            </div>
                            <h5>Tidak ada pengaduan yang ditemukan</h5>
                            <p class="text-muted">Belum ada pengaduan yang masuk ke sekolah Anda atau pengaduan tidak sesuai dengan filter yang diterapkan.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 50px">No</th>
                                        <th style="width: 150px">Tanggal</th>
                                        <th style="width: 200px">Pengirim</th>
                                        <th style="width: 250px">Subjek</th>
                                        <th style="width: 120px">Status</th>
                                        <th style="width: 100px">Aksi</th>
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
                                                <button type="button" class="btn btn-sm btn-primary" wire:click="openModal({{ $item->id }})">
                                                    <i class="mdi mdi-eye"></i> Detail
                                                </button>
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

    <script>
        document.addEventListener('livewire:initialized', function () {
            Livewire.on('alert', function(data) {
                Swal.fire({
                    icon: data.type,
                    title: data.type === 'success' ? 'Berhasil!' : 'Perhatian!',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        });
    </script>
</div>