<?php

namespace App\Livewire\Home;

use App\Models\Berita;
use Livewire\Attributes\Layout;
use Livewire\Component;

class NewsDetail extends Component
{
    #[Layout('components.home.guest')]
    public $berita;
    public $relatedNews;
    
    public function mount($id)
    {
        $this->berita = Berita::findOrFail($id);
        
        // Increment view count
        $this->berita->increment('views');
        
        // Get related news based on category
        $this->relatedNews = Berita::where('id', '!=', $id)
                                  ->where('kategori', $this->berita->kategori)
                                  ->where('status', 'published')
                                  ->orderBy('created_at', 'desc')
                                  ->limit(3)
                                  ->get();
    }
    
    public function render()
    {
        return view('livewire.home.news-detail');
    }
}