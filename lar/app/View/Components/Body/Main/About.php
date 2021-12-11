<?php

namespace App\View\Components\Body\Main;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class About extends Component
{
    public $aboutSliders;
    public $companyIntroduce;
    public $title;
    public $description;

    /**
     * Create a new component instance.
     *
     * @param $aboutSliders
     * @param $companyIntroduce
     * @param $title
     * @param $description
     * @return void
     */
    public function __construct($aboutSliders, $companyIntroduce, $title, $description)
    {
        $this->aboutSliders = $aboutSliders;
        $this->companyIntroduce = $companyIntroduce;
        $this->title = $title;
        $this->description = $description;
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
        return view('components.body.main.about');
    }
}
