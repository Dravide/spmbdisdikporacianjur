<div>
    <div class="container py-4">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-1">Berita & Informasi</h2>
                        <p class="text-muted">Informasi terbaru seputar PPDB Disdikpora Cianjur</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Search and Filter -->
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari berita..." wire:model.live.debounce.300ms="search">
                    <button class="btn btn-dark" type="button">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <select class="form-select" wire:model.live="category">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}">{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <!-- News List -->
        <div class="row">
            @if($berita->count() > 0)
                @foreach($berita as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 news-card shadow-sm">
                        <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/600x400?text=Berita+PPDB' }}" class="card-img-top" alt="{{ $item->judul }}">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge bg-primary">{{ $item->kategori }}</span>
                                <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                            </div>
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text text-muted">{{ Str::limit(strip_tags($item->konten), 100) }}</p>
                            <a href="{{ route('news.detail', $item->id) }}" class="btn btn-sm btn-dark mt-auto">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-info">
                        Tidak ada berita yang ditemukan.
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Pagination -->
        <div class="row mt-4">
            <div class="col-12">
                {{ $berita->links() }}
            </div>
        </div>
    </div>
    
    @push('styles')
    <style>
        .news-card {
            transition: all 0.3s ease;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        
        .news-card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
    @endpush
</div>