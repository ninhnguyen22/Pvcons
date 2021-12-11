<?php

namespace App\View\Components\Body\Main;

use Illuminate\View\Component;

class Service extends Component
{
    public $services;
    public $title;
    public $description;

    /**
     * Create a new component instance.
     *
     * @param $services
     * @param $title
     * @param $description
     * @return void
     */
    public function __construct($services, $title, $description)
    {
        $this->services = $services;
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
        return view('components.body.main.service');
    }
}
