<?php

namespace App\View\Components\Body;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\CompanyProfileRepositoryInterface;
use Illuminate\View\Component;

class Header extends Component
{
    public string $hotLine;

    public string $email;

    public $categories;

    /**
     * Create a new component instance.
     * @param CompanyProfileRepositoryInterface $companyProfileRepository
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        CompanyProfileRepositoryInterface $companyProfileRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->hotLine = $companyProfileRepository->getPhone1();
        $this->email = $companyProfileRepository->getEmail();
        $this->categories = $categoryRepository->getNested();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.body.header');
    }
}
