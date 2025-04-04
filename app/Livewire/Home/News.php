<?php

namespace App\Livewire\Home;

use App\Models\Berita;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class News extends Component
{
    use WithPagination;
    use WithoutUrlPagination;
    #[Layout('components.home.guest')]
    #[Title('Berita')]
    
    
    public $search = '';
    public $category = '';
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function updatingCategory()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $query = Berita::query()->where('status', 'published');
        
        if ($this->search) {
            $query->where('judul', 'like', '%' . $this->search . '%')
                  ->orWhere('konten', 'like', '%' . $this->search . '%');
        }
        
        if ($this->category) {
            $query->where('kategori', $this->category);
        }
        
        $berita = $query->orderBy('created_at', 'desc')
                        ->paginate(9);
        
        $categories = Berita::select('kategori')
                            ->distinct()
                            ->where('status', 'published')
                            ->pluck('kategori');
        
        return view('livewire.home.news', [
            'berita' => $berita,
            'categories' => $categories
        ]);
    }
}