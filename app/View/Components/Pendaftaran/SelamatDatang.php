<?php

namespace App\View\Components\Pendaftaran;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelamatDatang extends Component
{
    public function render(): View
    {
        return view('components.pendaftaran.selamat-datang');
    }
}
