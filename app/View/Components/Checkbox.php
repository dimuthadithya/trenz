<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    public $id;
    public $value;
    public $label;
    public $checked;

    public function __construct($id, $value, $label, $checked = false)
    {
        $this->id = $id;
        $this->value = $value;
        $this->label = $label;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.checkbox');
    }
}
