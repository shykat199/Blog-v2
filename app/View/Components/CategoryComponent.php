<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryComponent extends Component
{
    public $action;
    public $post;
    public $categories;
    public $subCategory;

    /**
     * Create a new component instance.
     */
    public function __construct($action = null, $categories = null, $post = null, $subCategory=null)
    {
        $this->action = $action;
        $this->post = $post;
        $this->categories = $categories;
        $this->subCategory = $subCategory;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-component');
    }
}
