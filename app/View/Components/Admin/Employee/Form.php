<?php

namespace App\View\Components\Admin\Employee;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public $action;
    public $user;
    /**
     * Create a new component instance.
     */
    public function __construct($action, $user)
    {
        $this->action = $action;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.employee.form');
    }
}
