<?php

namespace App\Livewire\Nara;

use App\Models\Berita;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\LivewireFilepond\WithFilePond;

class BeritaManager extends Component
{
    use WithPagination;
    use WithFileUploads;
    use WithFilePond;

    #[Layout('components.nara.apps')]

    // Form properties
    public $beritaId;
    public $judul;
    public $konten;
    public $gambar;
    public $kategori;
    public $status = 'draft';
    
    // Filter and search properties
    public $search = '';
    public $statusFilter = '';
    public $kategoriFilter = '';
    
    // UI state
    public $isOpen = false;
    public $confirmingDeletion = false;
    public $deleteId;
    
    // Validation rules
    protected $rules = [
        'judul' => 'required|min:5|max:255',
        'konten' => 'required',
        'kategori' => 'required',
        'status' => 'required|in:draft,published,archived',
    ];

    public function render()
    {
        $query = Berita::query();
        
        if ($this->search) {
            $query->where('judul', 'like', '%' . $this->search . '%');
        }
        
        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }
        
        if ($this->kategoriFilter) {
            $query->where('kategori', $this->kategoriFilter);
        }
        
        $beritas = $query->orderBy('created_at', 'desc')->paginate(10);
        
        $categories = Berita::select('kategori')
                            ->distinct()
                            ->pluck('kategori');
        
        return view('livewire.nara.berita-manager', [
            'beritas' => $beritas,
            'categories' => $categories
        ]);
    }
    
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    
    public function openModal()
    {
        $this->isOpen = true;
    }
    
    public function closeModal()
    {
        $this->isOpen = false;
        $this->dispatch('resetQuill');
    }
    
    public function resetInputFields()
    {
        $this->beritaId = null;
        $this->judul = '';
        $this->konten = '';
        $this->gambar = null;
        $this->kategori = '';
        $this->status = 'draft';
        $this->resetValidation();
    }
    
    public function store()
    {
        $this->validate();
        
        $data = [
            'judul' => $this->judul,
            'konten' => $this->konten,
            'kategori' => $this->kategori,
            'status' => $this->status,
            'user_id' => Auth::id(),
        ];
        
        if ($this->gambar) {
            $data['gambar'] = $this->gambar->store('beritas', 'public');
        }
        
        if ($this->beritaId) {
            $berita = Berita::find($this->beritaId);
            $berita->update($data);
            session()->flash('message', 'Berita berhasil diperbarui.');
        } else {
            Berita::create($data);
            session()->flash('message', 'Berita berhasil ditambahkan.');
        }
        
        $this->closeModal();
        $this->resetInputFields();
    }
    
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $this->beritaId = $id;
        $this->judul = $berita->judul;
        $this->konten = $berita->konten;
        $this->kategori = $berita->kategori;
        $this->status = $berita->status;
        
        $this->openModal();
        
        // Dispatch an event to update Quill with the content
        $this->dispatch('contentUpdated', $berita->konten);
    }
    
    public function confirmDelete($id)
    {
        $this->confirmingDeletion = true;
        $this->deleteId = $id;
    }
    
    public function cancelDelete()
    {
        $this->confirmingDeletion = false;
        $this->deleteId = null;
    }
    
    public function delete()
    {
        Berita::find($this->deleteId)->delete();
        session()->flash('message', 'Berita berhasil dihapus.');
        $this->confirmingDeletion = false;
        $this->deleteId = null;
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function updatingStatusFilter()
    {
        $this->resetPage();
    }
    
    public function updatingKategoriFilter()
    {
        $this->resetPage();
    }
}