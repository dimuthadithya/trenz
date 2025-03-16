<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductRow extends Component
{

    public $product;
    public $indexVal;
    /**
     * Create a new component instance.
     */
    public function __construct($product, $indexVal)
    {
        $this->product = $product;
        $this->indexVal = $indexVal;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.product-row');
    }
}
