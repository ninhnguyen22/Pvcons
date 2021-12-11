<?php

namespace App\View\Components\Head;

use App\Factories\Head\HeadMetaGraphFactory;
use Illuminate\View\Component;

class MetaGraph extends Component
{
    public HeadMetaGraphFactory $headMetaGraph;

    /**
     * Create a new component instance.
     *
     * @param HeadMetaGraphFactory $headMetaGraph
     * @return void
     */
    public function __construct(HeadMetaGraphFactory $headMetaGraph)
    {
        $this->headMetaGraph = $headMetaGraph;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.head.meta-graph');
    }
}
