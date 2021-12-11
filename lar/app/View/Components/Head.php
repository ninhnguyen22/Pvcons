<?php

namespace App\View\Components;

use App\Factories\Head\HeadFactory;
use App\Repositories\Contracts\FrameRepositoryInterface;
use Illuminate\View\Component;

class Head extends Component
{
    public HeadFactory $head;

    /**
     * Create a new component instance.
     * @param FrameRepositoryInterface $frameRepository
     * @return void
     */
    public function __construct(FrameRepositoryInterface $frameRepository)
    {
        $this->head = $frameRepository->getHeadFactory();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.head');
    }
}
