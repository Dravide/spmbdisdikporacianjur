<?php

namespace App\Livewire\Nara;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;

class DocumentManager extends Component
{
    use WithPagination, WithFileUploads;

    #[Layout('components.nara.apps')]
    
    public $title;
    public $description;
    public $type;
    public $icon;
    public $file;
    public $documentId;
    public $isOpen = false;
    public $confirmingDeletion = false;
    public $deleteId;
    public $search = '';
    public $typeFilter = '';
    
    protected $listeners = ['fileUploaded' => 'handleFileUpload'];
    
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|in:form,guide,template,info',
            'icon' => 'required|string',
            'file' => $this->documentId ? 'nullable|file|max:10240' : 'required|file|max:10240',
        ];
    }
    
    public function render()
    {
        $documents = Document::query()
            ->when($this->search, function($query) {
                return $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->typeFilter, function($query) {
                return $query->where('type', $this->typeFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('livewire.nara.document-manager', [
            'documents' => $documents,
            'documentTypes' => [
                'form' => 'Formulir',
                'guide' => 'Panduan',
                'template' => 'Template',
                'info' => 'Informasi'
            ]
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
    }
    
    public function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->type = '';
        $this->icon = '';
        $this->file = null;
        $this->documentId = null;
        $this->resetErrorBag();
    }
    
    public function store()
    {
        $this->validate();
        
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'icon' => 'mdi-' . $this->icon,
        ];
        
        if ($this->file) {
            // Get file details
            $fileName = $this->file->getClientOriginalName();
            $fileSize = $this->formatBytes($this->file->getSize());
            $filePath = $this->file->store('documents', 'public');
            
            $data['file_name'] = $fileName;
            $data['file_size'] = $fileSize;
            $data['file_path'] = $filePath;
        }
        
        if ($this->documentId) {
            $document = Document::find($this->documentId);
            
            // If a new file is uploaded, delete the old one
            if ($this->file && $document->file_path) {
                Storage::disk('public')->delete($document->file_path);
            }
            
            // If no new file is uploaded, keep the old file details
            if (!$this->file) {
                unset($data['file_name']);
                unset($data['file_size']);
                unset($data['file_path']);
            }
            
            $document->update($data);
            session()->flash('message', 'Dokumen berhasil diperbarui.');
        } else {
            Document::create($data);
            session()->flash('message', 'Dokumen berhasil ditambahkan.');
        }
        
        $this->closeModal();
        $this->resetInputFields();
    }
    
    public function edit($id)
    {
        $document = Document::findOrFail($id);
        $this->documentId = $id;
        $this->title = $document->title;
        $this->description = $document->description;
        $this->type = $document->type;
        $this->icon = str_replace('mdi-', '', $document->icon);
        
        $this->openModal();
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
        $document = Document::find($this->deleteId);
        
        // Delete the file from storage
        if ($document->file_path) {
            Storage::disk('public')->delete($document->file_path);
        }
        
        $document->delete();
        session()->flash('message', 'Dokumen berhasil dihapus.');
        $this->confirmingDeletion = false;
        $this->deleteId = null;
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function updatingTypeFilter()
    {
        $this->resetPage();
    }
    
    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        
        $bytes /= (1 << (10 * $pow));
        
        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}