<?php

namespace App\View\Components\Body\Main;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class Carousel extends Component
{
    public $carousels;

    /**
     * Create a new component instance.
     *
     * @param $carousels
     * @return void
     */
    public function __construct($carousels)
    {
        $this->carousels = $carousels;
    }

    public function getStorageUrl($path)
    {
        return Storage::disk('admin')->url($path);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.body.main.carousel');
    }
}
