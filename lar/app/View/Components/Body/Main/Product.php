<?php

namespace App\View\Components\Body\Main;

use Illuminate\View\Component;

class Product extends Component
{
    public $productCategories;
    public $title;
    public $description;

    /**
     * Create a new component instance.
     *
     * @param $productCategories
     * @param string $title
     * @param string $description
     * @return void
     */
    public function __construct($productCategories, $title, $description)
    {
        $this->productCategories = $productCategories;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.body.main.product');
    }
}
