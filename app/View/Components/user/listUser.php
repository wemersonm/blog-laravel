<?php

namespace App\View\Components\user;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class listUser extends Component
{
    /**
     * Create a new component instance.
     */

     public $type;
    public function __construct($type)
    {
        //
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.list-user');
    }

    public function callFunction()
    {
        return "TEXTO VINDO DE UMA FUNÇÃO";
    }
}
