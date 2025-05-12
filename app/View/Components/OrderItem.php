<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderItem extends Component
{

    public $product;
    public $orderItem;
    public $orderDetails;

    /**
     * Create a new component instance.
     */
    public function __construct($product, $orderItem, $orderDetails)
    {
        $this->product = $product;
        $this->orderItem = $orderItem;
        $this->orderDetails = $orderDetails;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.order-item');
    }
}
