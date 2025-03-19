<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TitleNara extends Component
{


    public function render(): View
    {
        return view('components.nara.title-nara');
    }
}
