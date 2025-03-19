<?php

namespace App\View\Components\Operator;

use App\Models\Jalur;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $jalurs = Jalur::all();
        return view('components.operator.sidebar')->with(compact('jalurs'));
    }
}
