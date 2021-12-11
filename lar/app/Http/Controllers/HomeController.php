<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\BenefitRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\FrameRepositoryInterface;
use App\Repositories\Contracts\HomeRepositoryInterface;
use App\Repositories\ServiceRepository;

class HomeController extends BaseController
{
    protected FrameRepositoryInterface $frameRepository;
    protected HomeRepositoryInterface $homeRepository;
    protected CategoryRepositoryInterface $categoryRepository;
    protected BenefitRepositoryInterface $benefitRepository;
    protected ServiceRepository $serviceRepository;

    public function __construct(
        FrameRepositoryInterface $frameRepository,
        HomeRepositoryInterface $homeRepository,
        CategoryRepositoryInterface $categoryRepository,
        BenefitRepositoryInterface $benefitRepository,
        ServiceRepository $serviceRepository
    ) {
        parent::__construct();

        $this->frameRepository = $frameRepository;
        $this->homeRepository = $homeRepository;
        $this->categoryRepository = $categoryRepository;
        $this->benefitRepository = $benefitRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        $carousels = $this->homeRepository->getCarousels();
        $aboutSliders = $this->homeRepository->getForAbout();
        $companyIntroduce = $this->homeRepository->getAboutIntroduce();
        $productCategories = $this->categoryRepository->getForProduct();
        $clientBenefits = $this->benefitRepository->getClientBenefit();
        $services = $this->serviceRepository->getServices();
        $workflow = $this->homeRepository->getWorkflow();
        $news = $this->homeRepository->getNews();
        $partners = $this->homeRepository->getPartner();
        $homeSections = $this->homeRepository->getSections();

        return view('home',
            compact('carousels', 'aboutSliders', 'companyIntroduce', 'productCategories', 'clientBenefits', 'services',
                'workflow', 'news', 'partners', 'homeSections')
        );
    }
}
