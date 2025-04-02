<div>
    <div class="container-fluid">
        <!-- Page Title -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Manajemen Berita</h4>
                            <button wire:click="create" class="btn btn-primary">
                                <i class="mdi mdi-plus-circle me-1"></i> Tambah Berita
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
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari judul berita..." wire:model.live.debounce.300ms="search">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <select class="form-select" wire:model.live="statusFilter">
                    <option value="">Semua Status</option>
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                    <option value="archived">Archived</option>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select" wire:model.live="kategoriFilter">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
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
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Views</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($beritas as $berita)
                                        <tr>
                                            <td>{{ Str::limit($berita->judul, 50) }}</td>
                                            <td><span class="badge bg-primary">{{ $berita->kategori }}</span></td>
                                            <td>
                                                @if($berita->status == 'published')
                                                    <span class="badge bg-success">Published</span>
                                                @elseif($berita->status == 'draft')
                                                    <span class="badge bg-warning">Draft</span>
                                                @else
                                                    <span class="badge bg-secondary">Archived</span>
                                                @endif
                                            </td>
                                            <td>{{ $berita->views }}</td>
                                            <td>{{ $berita->created_at->format('d M Y') }}</td>
                                            <td>
                                                <button wire:click="edit({{ $berita->id }})" class="btn btn-sm btn-info">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button wire:click="confirmDelete({{ $berita->id }})" class="btn btn-sm btn-danger">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data berita</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $beritas->links() }}
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
                    <h5 class="modal-title">{{ $beritaId ? 'Edit Berita' : 'Tambah Berita Baru' }}</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" wire:model="judul">
                            @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" wire:model="kategori" list="kategoriList">
                            <datalist id="kategoriList">
                                @foreach($categories as $category)
                                    <option value="{{ $category }}">
                                @endforeach
                            </datalist>
                            @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" wire:model="status">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                                <option value="archived">Archived</option>
                            </select>
                            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <div wire:ignore>
                                <input type="file" id="gambar" wire:model="gambar" x-data
                                    x-init="
                                        FilePond.registerPlugin(FilePondPluginImagePreview);
                                        FilePond.create($refs.input, {
                                            allowMultiple: false,
                                            acceptedFileTypes: ['image/*'],
                                            server: {
                                                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                    @this.upload('gambar', file, load, error, progress)
                                                },
                                                revert: (filename, load) => {
                                                    @this.removeUpload('gambar', filename, load)
                                                }
                                            }
                                        });
                                    "
                                    x-ref="input"
                                />
                            </div>
                            @error('gambar') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten</label>
                            <div wire:ignore>
                                <div id="editor" style="height: 300px;">{!! $konten !!}</div>
                            </div>
                            @error('konten') <div class="text-danger mt-2">{{ $message }}</div> @enderror
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
                    <p>Apakah Anda yakin ingin menghapus berita ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="cancelDelete">Batal</button>
                    <button type="button" class="btn btn-danger" wire:click="delete">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade @if($confirmingDeletion) show @endif" style="@if($confirmingDeletion) display: block; @else display: none; @endif"></div>

    @push('scripts')
    <script>
        document.addEventListener('livewire:initialized', function () {
            // Initialize Quill
            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'align': [] }],
                        ['link', 'image'],
                        ['clean']
                    ]
                }
            });
            
            // Update Livewire property when Quill content changes
            quill.on('text-change', function() {
                @this.set('konten', quill.root.innerHTML);
            });
            
            // Listen for the contentUpdated event from Livewire
            Livewire.on('contentUpdated', function(content) {
                quill.root.innerHTML = content;
            });
            
            // When the modal is opened, make sure Quill is updated with the content
            Livewire.hook('element.updated', () => {
                if (@this.isOpen && @this.konten) {
                    quill.root.innerHTML = @this.konten;
                }
            });
            
            // Reset Quill content when modal is closed
            Livewire.on('resetQuill', function() {
                quill.root.innerHTML = '';
            });
        });
    </script>
    @endpush
</div>