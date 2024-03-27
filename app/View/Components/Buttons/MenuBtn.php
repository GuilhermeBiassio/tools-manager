<?php

namespace App\View\Components\Buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuBtn extends Component
{
    public $route;
    public $title;
    /**
     * Create a new component instance.
     */
    public function __construct($route, $title)
    {
        $this->route = $route;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.menu-btn');
    }
}
