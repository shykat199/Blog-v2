<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostComponent extends Component
{
    public $categories;
    public mixed $posts;

    /**
     * Create a new component instance.
     */
    public function __construct($categories, $posts = null)
    {
        $this->categories = $categories;
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post-component');
    }
}
