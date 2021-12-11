<?php

namespace App\View\Components\Body\Main;

use Illuminate\View\Component;

class News extends Component
{
    public $news;
    public $title;
    public $description;

    /**
     * Create a new component instance.
     *
     * @param $news
     * @param $title
     * @param $description
     * @return void
     */
    public function __construct($news, $title, $description)
    {
        $this->news = $news;
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
        return view('components.body.main.news');
    }
}
