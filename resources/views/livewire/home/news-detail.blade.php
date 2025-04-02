<div>
    <div class="container py-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('myhome') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news') }}">Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $berita->judul }}</li>
            </ol>
        </nav>
        
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="badge bg-primary">{{ $berita->kategori }}</span>
                            <small class="text-muted">{{ $berita->created_at->format('d M Y, H:i') }}</small>
                        </div>
                        
                        <h1 class="mb-3">{{ $berita->judul }}</h1>
                        
                        @if($berita->gambar)
                            <img src="{{ asset('storage/'.$berita->gambar) }}" class="img-fluid rounded mb-4" alt="{{ $berita->judul }}">
                        @else
                            <img src="https://placehold.co/800x400?text=Berita+PPDB" class="img-fluid rounded mb-4" alt="{{ $berita->judul }}">
                        @endif
                        
                        <div class="news-content">
                            {!! $berita->konten !!}
                        </div>
                        
                        <div class="mt-4 pt-3 border-top">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="mdi mdi-eye me-1"></i> {{ $berita->views }} kali dilihat
                                </div>
                                <div class="social-share">
                                    <span class="me-2">Bagikan:</span>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="btn btn-sm btn-outline-primary me-1">
                                        <i class="mdi mdi-facebook"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $berita->judul }}" target="_blank" class="btn btn-sm btn-outline-info me-1">
                                        <i class="mdi mdi-twitter"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ $berita->judul }} {{ url()->current() }}" target="_blank" class="btn btn-sm btn-outline-success">
                                        <i class="mdi mdi-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Related News -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-dark ">
                        <h5 class="mb-0 text-white">Berita Terkait</h5>
                    </div>
                    <div class="card-body">
                        @if($relatedNews->count() > 0)
                            @foreach($relatedNews as $related)
                                <div class="d-flex mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                    <div class="flex-shrink-0">
                                        @if($related->gambar)
                                            <img src="{{ asset('storage/'.$related->gambar) }}" class="rounded" alt="{{ $related->judul }}" width="80" height="60" style="object-fit: cover;">
                                        @else
                                            <img src="https://placehold.co/80x60?text=PPDB" class="rounded" alt="{{ $related->judul }}">
                                        @endif
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1"><a href="{{ route('news.detail', $related->id) }}" class="text-dark">{{ $related->judul }}</a></h6>
                                        <small class="text-muted">{{ $related->created_at->format('d M Y') }}</small>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted mb-0">Tidak ada berita terkait.</p>
                        @endif
                    </div>
                </div>
                
                <!-- Categories -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0 text-white">Kategori</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            @php
                                $categories = \App\Models\Berita::select('kategori')
                                    ->selectRaw('COUNT(*) as count')
                                    ->where('status', 'published')
                                    ->groupBy('kategori')
                                    ->get();
                            @endphp
                            
                            @foreach($categories as $category)
                                <a href="{{ route('news', ['category' => $category->kategori]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    {{ $category->kategori }}
                                    <span class="badge bg-primary rounded-pill">{{ $category->count }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Info Card -->
                <div class="card bg-dark text-white border-0">
                    <div class="card-body">
                        <h5 class="card-title text-white">Pusat Bantuan</h5>
                        <p>Jika Anda memiliki pertanyaan seputar PPDB, silakan hubungi kami.</p>
                        <div class="mb-3">
                            <i class="mdi mdi-phone me-2"></i> (0263) 123456
                        </div>
                        <div class="mb-3">
                            <i class="mdi mdi-email-outline me-2"></i> ppdb@disdikporacijr.go.id
                        </div>
                        <div>
                            <i class="mdi mdi-whatsapp me-2"></i> 0812-3456-7890
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('styles')
    <style>
        .news-content {
            font-size: 16px;
            line-height: 1.7;
        }
        
        .news-content img {
            max-width: 100%;
            height: auto;
            margin: 1rem 0;
            border-radius: 0.25rem;
        }
        
        .news-content h2, .news-content h3, .news-content h4 {
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .news-content p {
            margin-bottom: 1rem;
        }
        
        .news-content ul, .news-content ol {
            margin-bottom: 1rem;
            padding-left: 1.5rem;
        }
    </style>
    @endpush
</div>