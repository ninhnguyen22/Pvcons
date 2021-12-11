<?php

namespace App\View\Components\Body\Main;

use Illuminate\View\Component;

class Workflow extends Component
{
    public $workflow;
    public $title;
    public $description;

    /**
     * Create a new component instance.
     *
     * @param $workflow
     * @param $title
     * @param $description
     * @return void
     */
    public function __construct($workflow, $title, $description)
    {
        $this->workflow = $workflow;
        $this->title = $title;
        $this->description = $description;
    }

    public function getDescription($description)
    {
        $descriptions = explode(PHP_EOL, $description);
        return '<li>' . implode('</li><li>', $descriptions) . '</li>';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.body.main.workflow');
    }
}
