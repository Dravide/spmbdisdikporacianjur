<?php

namespace App\Livewire\Nara;

use App\Models\Schedule;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use Livewire\Attributes\Layout;

class ScheduleManager extends Component
{
    use WithPagination;
    #[Layout('components.nara.apps')]
    public $title;
    public $start_date;
    public $end_date;
    public $description;
    public $icon;
    public $scheduleId;
    
    public $isOpen = false;
    public $confirmingDeletion = false;
    public $deleteId = null;
    public $search = '';
    
    protected $rules = [
        'title' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'description' => 'required|string',
        'icon' => 'nullable|string|max:100',
    ];
    
    public function render()
    {
        $schedules = Schedule::where('title', 'like', '%' . $this->search . '%')
            ->orderBy('start_date')
            ->paginate(10);
            
        return view('livewire.nara.schedule-manager', [
            'schedules' => $schedules
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
        $this->scheduleId = null;
        $this->title = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->description = '';
        $this->icon = '';
    }
    
    public function store()
    {
        $this->validate();
        
        $data = [
            'title' => $this->title,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'description' => $this->description,
            'icon' => $this->icon,
        ];
        
        if ($this->scheduleId) {
            $schedule = Schedule::find($this->scheduleId);
            $schedule->update($data);
            session()->flash('message', 'Jadwal berhasil diperbarui.');
        } else {
            Schedule::create($data);
            session()->flash('message', 'Jadwal berhasil ditambahkan.');
        }
        
        $this->closeModal();
        $this->resetInputFields();
    }
    
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $this->scheduleId = $id;
        $this->title = $schedule->title;
        $this->start_date = $schedule->start_date->format('Y-m-d');
        $this->end_date = $schedule->end_date->format('Y-m-d');
        $this->description = $schedule->description;
        $this->icon = $schedule->icon;
        
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
        Schedule::find($this->deleteId)->delete();
        session()->flash('message', 'Jadwal berhasil dihapus.');
        $this->confirmingDeletion = false;
        $this->deleteId = null;
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
