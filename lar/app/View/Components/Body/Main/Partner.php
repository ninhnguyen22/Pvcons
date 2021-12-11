<?php

namespace App\View\Components\Body\Main;

use Illuminate\View\Component;

class Partner extends Component
{
    public $partners;
    public $title;
    public $description;

    /**
     * Create a new component instance.
     *
     * @param $partners
     * @param $title
     * @param $description
     * @return void
     */
    public function __construct($partners, $title, $description)
    {
        $this->partners = $partners;
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
        return view('components.body.main.partner');
    }
}
