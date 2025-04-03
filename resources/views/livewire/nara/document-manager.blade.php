<div>
    <div class="container-fluid">
        <!-- Page Title -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Manajemen Dokumen</h4>
                            <button wire:click="create" class="btn btn-primary">
                                <i class="mdi mdi-plus-circle me-1"></i> Tambah Dokumen
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
                    <input type="text" class="form-control" placeholder="Cari dokumen..." wire:model.live.debounce.300ms="search">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <select class="form-select" wire:model.live="typeFilter">
                    <option value="">Semua Tipe</option>
                    <option value="form">Formulir</option>
                    <option value="guide">Panduan</option>
                    <option value="template">Template</option>
                    <option value="info">Informasi</option>
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
                                        <th width="30%">Dokumen</th>
                                        <th>Deskripsi</th>
                                        <th>Tipe</th>
                                        <th>Ukuran</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($documents as $document)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm me-3">
                                                        <div class="avatar-title bg-soft-primary rounded">
                                                            <i class="mdi {{ $document->icon }} text-primary font-size-20"></i>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-1 font-size-15">{{ $document->title }}</h5>
                                                        <p class="text-muted mb-0 font-size-13">{{ $document->file_name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ Str::limit($document->description, 100) }}</td>
                                            <td>
                                                @if($document->type == 'form')
                                                    <span class="badge bg-primary">Formulir</span>
                                                @elseif($document->type == 'guide')
                                                    <span class="badge bg-success">Panduan</span>
                                                @elseif($document->type == 'template')
                                                    <span class="badge bg-warning">Template</span>
                                                @else
                                                    <span class="badge bg-info">Informasi</span>
                                                @endif
                                            </td>
                                            <td>{{ $document->file_size }}</td>
                                            <td>{{ $document->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ Storage::url($document->file_path) }}" class="btn btn-sm btn-success" target="_blank">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                                <button wire:click="edit({{ $document->id }})" class="btn btn-sm btn-info">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button wire:click="confirmDelete({{ $document->id }})" class="btn btn-sm btn-danger">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data dokumen</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $documents->links() }}
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
                    <h5 class="modal-title">{{ $documentId ? 'Edit Dokumen' : 'Tambah Dokumen Baru' }}</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Dokumen</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model="title">
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" wire:model="description" rows="4"></textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe Dokumen</label>
                            <select class="form-select @error('type') is-invalid @enderror" id="type" wire:model="type">
                                <option value="">Pilih Tipe</option>
                                <option value="form">Formulir</option>
                                <option value="guide">Panduan</option>
                                <option value="template">Template</option>
                                <option value="info">Informasi</option>
                            </select>
                            @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon (Material Design Icons)</label>
                            <div class="input-group">
                                <span class="input-group-text">mdi-</span>
                                <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" wire:model="icon" placeholder="file-document-outline">
                            </div>
                            <small class="form-text text-muted">Contoh: file-document-outline, book-open-variant, dll. Lihat <a href="https://materialdesignicons.com/" target="_blank">Material Design Icons</a></small>
                            @error('icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="file" class="form-label">File Dokumen</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" wire:model="file">
                            <div wire:loading wire:target="file">
                                <span class="text-primary">Uploading...</span>
                            </div>
                            @if($documentId && !$file)
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah file</small>
                            @endif
                            @error('file') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                    <p>Apakah Anda yakin ingin menghapus dokumen ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="cancelDelete">Batal</button>
                    <button type="button" class="btn btn-danger" wire:click="delete">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade @if($confirmingDeletion) show @endif" style="@if($confirmingDeletion) display: block; @else display: none; @endif"></div>

    @push('styles')
    <style>
        .avatar-sm {
            height: 3rem;
            width: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .bg-soft-primary {
            background-color: rgba(85, 110, 230, 0.15) !important;
        }
        
        .font-size-13 {
            font-size: 13px !important;
        }
        
        .font-size-15 {
            font-size: 15px !important;
        }
        
        .font-size-20 {
            font-size: 20px !important;
        }
    </style>
    @endpush
</div>