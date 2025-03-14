<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminNewUserCard extends Component
{
    public $newUser;
    /**
     * Create a new component instance.
     */
    public function __construct($newUser)
    {
        $this->newUser = $newUser;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\View\View
    {
        return view('components.admin.new-user-card');
    }
}
