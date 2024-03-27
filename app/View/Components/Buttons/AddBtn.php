<?php

namespace App\View\Components\Buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddBtn extends Component
{
    public $route;
    public $name;
    /**
     * Create a new component instance.
     */
    public function __construct($route, $name)
    {
        $this->route = $route;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.add-btn');
    }
}
