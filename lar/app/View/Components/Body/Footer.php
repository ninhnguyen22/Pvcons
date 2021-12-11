<?php

namespace App\View\Components\Body;

use App\Repositories\Contracts\CompanyProfileRepositoryInterface;
use App\Repositories\Contracts\FrameRepositoryInterface;
use Illuminate\View\Component;

class Footer extends Component
{
    public $companyName;
    public $address;
    public $hotline;
    public $phone;
    public $email;
    public $website;
    public $fanpage;
    public $news;

    /**
     * Create a new component instance.
     *
     * @param CompanyProfileRepositoryInterface $companyProfileRepository
     * @param FrameRepositoryInterface $frameRepository
     * @return void
     */
    public function __construct(
        CompanyProfileRepositoryInterface $companyProfileRepository,
        FrameRepositoryInterface $frameRepository
    ) {
        $this->companyName = $companyProfileRepository->getName();
        $this->address = $companyProfileRepository->getAddress();
        $this->hotline = $companyProfileRepository->getPhone1();
        $this->phone = $companyProfileRepository->getPhone2();
        $this->email = $companyProfileRepository->getEmail();
        $this->website = $companyProfileRepository->getWebsite();
        $this->fanpage = $companyProfileRepository->getPage();
        $this->news = $frameRepository->getNewsFooter();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public
    function render()
    {
        return view('components.body.footer');
    }
}
