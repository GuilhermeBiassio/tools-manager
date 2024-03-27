<?php

namespace App\View\Components\Buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReturnedBtn extends Component
{
    public $tool;
    /**
     * Create a new component instance.
     */
    public function __construct($tool)
    {
        $this->tool = $tool;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.returned-btn');
    }
}
