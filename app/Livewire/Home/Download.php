<?php

namespace App\Livewire\Home;

use App\Models\Document;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Download extends Component
{
    #[Layout('components.home.guest')]
    
    public $documents = [];
    public $documentsByType = [];
    
    public function mount()
    {
        // Fetch documents from database
        $this->documents = Document::all()->toArray();
        
        // Group documents by type for category display
        $this->documentsByType = Document::all()->groupBy('type')->toArray();
    }
    
    public function downloadDocument($id)
    {
        $document = Document::findOrFail($id);
        
        if (Storage::exists($document->file_path)) {
            return Storage::download($document->file_path, $document->file_name);
        }
        
        session()->flash('error', 'File tidak ditemukan.');
        return null;
    }
    
    public function render()
    {
        return view('livewire.home.download');
    }
}