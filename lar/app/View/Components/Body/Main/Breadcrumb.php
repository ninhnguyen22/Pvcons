<?php

namespace App\View\Components\Body\Main;

use App\Repositories\Contracts\BreadcrumbRepositoryInterface;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $breadcrumbs;

    /**
     * Create a new component instance.
     *
     * @param BreadcrumbRepositoryInterface $breadcrumbRepository
     * @return void
     */
    public function __construct(BreadcrumbRepositoryInterface $breadcrumbRepository)
    {
        $this->breadcrumbs = $breadcrumbRepository->getBreadcrumbs();
    }

    public function getUrl($url)
    {
        return $url ?: '/';
    }

    public function active($key)
    {
        return ($key + 1) === count($this->breadcrumbs) ? 'active' : '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.body.main.breadcrumb');
    }
}
