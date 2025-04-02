<?php

namespace App\Livewire\Home;

use App\Models\Schedule as ScheduleModel;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Schedule extends Component
{
    #[Layout('components.home.guest')]
    
    public $schedules = [];
    
    public function mount()
    {
        // Update all statuses before fetching
        ScheduleModel::updateAllStatuses();
        
        // Get all schedules ordered by start date
        $this->schedules = ScheduleModel::orderBy('start_date')->get()->toArray();
        
        // Alternatively, you can use scopes to get schedules by status
        // $active = ScheduleModel::active()->orderBy('start_date')->get();
        // $upcoming = ScheduleModel::upcoming()->orderBy('start_date')->get();
        // $completed = ScheduleModel::completed()->orderBy('start_date', 'desc')->get();
    }
    
    public function render()
    {
        return view('livewire.home.schedule');
    }
}