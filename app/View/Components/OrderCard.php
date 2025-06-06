<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Order;

class OrderCard extends Component
{
    public $order;

    /**
     * Create a new component instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.order-card');
    }
}
