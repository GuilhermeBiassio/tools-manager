<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public $action;
    public $title;
    public $btnTitle;
    /**
     * Create a new component instance.
     */

    public function __construct($action, $title, $btnTitle)
    {
        $this->route = $action;
        $this->title = $title;
        $this->btnTitle = $btnTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
