<?php

namespace App\Livewire\Operator;

use Livewire\Component;
use App\Models\DataPendaftar;
use Illuminate\Support\Facades\Auth;

class Maps extends Component
{
    public $students;

    public function mount()
    {
        // Fetch students with coordinates
        $this->students = DataPendaftar::with(['koordinat','dapodik'])
            ->where('id_sekolah', Auth::user()->sekolah->id)
            ->whereHas('koordinat', function($query) {
                $query->whereNotNull('latitude')
                    ->whereNotNull('longitude');
            })
            ->get();

    
    }

    public function render()
    {
        return view('livewire.operator.maps');
    }
}
