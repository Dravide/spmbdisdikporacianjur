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
                <button type="button" class="btn btn-success btn-sm ms-2" wire:click="toggleImportForm">
                    <i class="mdi mdi-file-excel"></i> Import Excel
                </button>
            </div>
        </div>

        <!-- Import Form -->
        @if($isImporting)
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card border">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Import Data Domisili</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="importExcel">
                            <div class="mb-3">
                                <label for="importFile" class="form-label">File Excel</label>
                                <input type="file" class="form-control" wire:model="importFile" accept=".xlsx, .xls">
                                <div class="form-text">Format: .xlsx, .xls (max 2MB)</div>
                                @error('importFile') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-outline-secondary btn-sm" wire:click="downloadTemplate">
                                    <i class="mdi mdi-download"></i> Download Template
                                </button>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Import</button>
                                <button type="button" class="btn btn-secondary" wire:click="toggleImportForm">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

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
                        <select class="form-select" wire:model.live="desa" id="desa" name="desa" {{ count($listDesa) == 0 ? 'disabled' : '' }}>
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
            
            // After modal is shown, update the desa select
            setTimeout(() => {
                updateDesaSelect();
            }, 300);
        });
        
        // Add event listener for desaSelected
        Livewire.on('desaSelected', (data) => {
            updateDesaSelect();
        });
        
        // Hide modal event
        Livewire.on('hideFormModal', () => {
            const modalElement = document.getElementById('formModal');
            const modal = bootstrap.Modal.getInstance(modalElement);
            if (modal) {
                modal.hide();
            }
        });
        
        // Function to update desa select
        function updateDesaSelect() {
            setTimeout(() => {
                // Try multiple selectors to find the desa select element
                const desaSelect = document.querySelector('select[wire\\:model="desa"]') || 
                                  document.querySelector('select[wire\\:model\\.live="desa"]') ||
                                  document.querySelector('select[name="desa"]');
                
                if (desaSelect && @this.selectedDesaName) {
                    console.log('Updating desa select to:', @this.selectedDesaName);
                    console.log('Available options:', Array.from(desaSelect.options).map(o => o.value));
                    
                    // First try to find an exact match
                    let found = false;
                    for (let i = 0; i < desaSelect.options.length; i++) {
                        if (desaSelect.options[i].value === @this.selectedDesaName) {
                            desaSelect.selectedIndex = i;
                            found = true;
                            break;
                        }
                    }
                    
                    // If no exact match, try case-insensitive match
                    if (!found) {
                        const lowerValue = @this.selectedDesaName.toLowerCase();
                        for (let i = 0; i < desaSelect.options.length; i++) {
                            if (desaSelect.options[i].value.toLowerCase() === lowerValue) {
                                desaSelect.selectedIndex = i;
                                found = true;
                                break;
                            }
                        }
                    }
                    
                    // Dispatch change event to update Livewire
                    if (found) {
                        desaSelect.dispatchEvent(new Event('change'));
                    }
                }
            }, 300);
        }
    });
</script>
@endpush
</div>
