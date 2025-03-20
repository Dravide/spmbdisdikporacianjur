<?php

namespace App\View\Components\home;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class App extends Component
{
    public function render(): View
    {
        return view('components.home.app');
    }
}
