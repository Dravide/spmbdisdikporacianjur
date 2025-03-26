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

        <div class="row">
            <div class="col-md-3">
                <form wire:submit.prevent="{{ $isEditing ? 'update' : 'save' }}">
                    <div class="mb-3">
                        <label class="form-label">Kecamatan</label>
                        <select wire:model.live.debounce="selectedKecamatanCode"
                                class="form-select @error('kecamatan') is-invalid @enderror">
                            <option value="">Pilih Kecamatan</option>
                            @foreach($listKecamatan as $kec)
                                <option value="{{ $kec['code'] }}">{{ $kec['name'] }}</option>
                            @endforeach
                        </select>
                        @error('kecamatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Desa / Kelurahan</label>
                        <select wire:model.live.debounce="desa" class="form-select @error('desa') is-invalid @enderror">
                            <option value="">Pilih Desa/Kelurahan</option>
                            @foreach($listDesa as $des)
                                <option value="{{ $des['name'] }}">{{ $des['name'] }}</option>
                            @endforeach
                        </select>
                        @error('desa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">RT</label>
                                <input wire:model.live.debounce="rt" type="text"
                                       class="form-control @error('rt') is-invalid @enderror" placeholder="RT">
                                @error('rt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">RW</label>
                                <input wire:model.live.debounce="rw" type="text"
                                       class="form-control @error('rw') is-invalid @enderror"
                                       placeholder="RW">
                                @error('rw')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark">
                            <i class="mdi mdi-content-save"></i> {{ $isEditing ? 'Update' : 'Simpan' }}
                        </button>
                        @if($isEditing)
                            <button type="button" wire:click="cancelEdit" class="btn btn-secondary">
                                <i class="mdi mdi-cancel"></i> Batal
                            </button>
                        @endif
                    </div>
                </form>
            </div>

            <div class="col-md-9">
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
                                    <button wire:click="edit({{ $item->id }})" class="btn btn-sm btn-info">
                                        <i class="mdi mdi-pencil"></i> Edit
                                    </button>
                                    <!-- Replace the delete button in your table with this -->
                                    <button wire:click="confirmDelete({{ $item->id }})" class="btn btn-sm btn-danger">
                                        <i class="mdi mdi-delete"></i> Hapus
                                    </button>
                                    
                                    <!-- Remove the Bootstrap modal completely -->
                                    
                                    <!-- Add this script at the end of your file -->
                                    @push('scripts')
                                    <script>
                                        document.addEventListener('livewire:initialized', () => {
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
                                        });
                                    </script>
                                    @endpush
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

<!-- Remove the Bootstrap modal and replace with SweetAlert2 script -->
@push('scripts')
<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('confirmDelete', (id) => {
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
                    Livewire.dispatch('deleteConfirmed', { id: id });
                }
            });
        });
    });
</script>
@endpush
</div>
