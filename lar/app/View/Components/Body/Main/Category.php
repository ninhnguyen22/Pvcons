<?php

namespace App\View\Components\Body\Main;

use Illuminate\View\Component;

class Category extends Component
{
    public $title;
    public $categories;
    public $category;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $categories
     * @param $category
     * @return void
     */
    public function __construct($title, $categories, $category = null)
    {
        $this->title = $title;
        $this->categories = $categories;
        $this->category = $category;
    }

    public function active($category)
    {
        if (is_null($this->category)) return '';
        return $category->id === $this->category->id ? 'active' : '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.body.main.category');
    }
}
