<?php

namespace App\Livewire\Home;

use Livewire\Component;

class AlurPendaftaran extends Component
{
    public function render()
    {
        return view('livewire.home.alur-pendaftaran')
            ->layout('components.home.guest')
            ->title('Alur Pendaftaran');
    }
}