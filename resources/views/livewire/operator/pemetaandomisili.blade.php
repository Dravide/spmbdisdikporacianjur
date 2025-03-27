<div>
<div class="card">
    <h4 class="card-header bg-dark text-white">Pemetaan Domisili</h4>
    <div class="card-body">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row mb-3">
            <div class="col-md-12">
                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#formModal">
                    <i class="mdi mdi-plus"></i> Tambah Data Domisili
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Kecamatan</th>
                            <th>Desa / Kelurahan</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($pemetaanDomisili as $index => $item)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $item->kecamatan }}</td>
                                <td>{{ $item->kelurahan }}</td>
                                <td>{{ $item->rt }}</td>
                                <td>{{ $item->rw }}</td>
                                <td>
                                    <button wire:click="edit({{ $item->id }})" class="btn btn-sm btn-outline-dark">
                                        <i class="mdi mdi-pencil"></i> Edit
                                    </button>
                                    <!-- Delete button -->
                                    <button wire:click="confirmDelete({{ $item->id }})" class="btn btn-sm btn-dark">
                                        <i class="mdi mdi-delete"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">{{ $isEditing ? 'Edit' : 'Tambah' }} Data Domisili</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="{{ $isEditing ? 'update' : 'save' }}">
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <select class="form-select" wire:model.live="selectedKecamatanCode">
                            <option value="">Pilih Kecamatan</option>
                            @foreach($listKecamatan as $kec)
                                <option value="{{ $kec['code'] }}">{{ $kec['name'] }}</option>
                            @endforeach
                        </select>
                        @error('kecamatan') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="desa" class="form-label">Desa / Kelurahan</label>
                        <select class="form-select" wire:model="desa" {{ count($listDesa) == 0 ? 'disabled' : '' }}>
                            <option value="">Pilih Desa / Kelurahan</option>
                            @foreach($listDesa as $des)
                                <option value="{{ $des['name'] }}">{{ $des['name'] }}</option>
                            @endforeach
                        </select>
                        @error('desa') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="rt" class="form-label">RT</label>
                        <input type="text" class="form-control" wire:model="rt">
                        @error('rt') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="rw" class="form-label">RW</label>
                        <input type="text" class="form-control" wire:model="rw">
                        @error('rw') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="modal-footer px-0 pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="cancelEdit">Batal</button>
                        <button type="submit" class="btn btn-primary">{{ $isEditing ? 'Update' : 'Simpan' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 script for delete confirmation -->
@push('scripts')
<script>
    document.addEventListener('livewire:initialized', () => {
        // Delete confirmation handler
        Livewire.on('showDeleteConfirmation', () => {
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('delete');
                }
            });
        });
        
        // Form modal handler
        Livewire.on('showFormModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('formModal'));
            modal.show();
        });
        
        // Add event listener for desaSelected
        Livewire.on('desaSelected', (data) => {
            // Set the desa dropdown value
            const desaSelect = document.querySelector('select[wire\\:model="desa"]');
            if (desaSelect) {
                // Force update the select element
                setTimeout(() => {
                    // This timeout ensures the DOM has been updated with the new options
                    const options = Array.from(desaSelect.options);
                    const option = options.find(opt => opt.value === data.value);
                    if (option) {
                        option.selected = true;
                    }
                }, 100);
            }
        });
    });
</script>
@endpush
</div>
