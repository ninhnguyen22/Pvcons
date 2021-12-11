<?php

namespace App\View\Components\Body\Main;

use Illuminate\View\Component;

class Benefit extends Component
{
    public $clientBenefits;
    public $title;
    public $description;

    /**
     * Create a new component instance.
     *
     * @param $clientBenefits
     * @param $title
     * @param $description
     * @return void
     */
    public function __construct($clientBenefits, $title, $description)
    {
        $this->clientBenefits = $clientBenefits;
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
        return view('components.body.main.benefit');
    }
}
