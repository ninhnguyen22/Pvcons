<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\BreadcrumbRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\NewsRepositoryInterface;
use App\Repositories\Contracts\ServiceRepositoryInterface;
use Illuminate\Support\Str;

class ServiceController extends BaseController
{
    public CategoryRepositoryInterface $categoryRepository;
    public ServiceRepositoryInterface $serviceRepository;

    public function __construct(
        BreadcrumbRepositoryInterface $breadcrumbRepository,
        CategoryRepositoryInterface $categoryRepository,
        ServiceRepositoryInterface $serviceRepository
    ) {
        parent::__construct();

        $this->breadcrumbRepository = $breadcrumbRepository;
        $this->categoryRepository = $categoryRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function detail($serviceSlug, $serviceId)
    {
        $service = $this->serviceRepository->getDetail($serviceId);
        if (!$service) {
            abort(404);
        }
        $this->detailBreadcrumbs(
            ['name' => 'Dịch Vụ', 'url' => '/'],
            [
                'name' => $service->name,
                'url' => ''
            ]);


        return view('service-detail', compact('service'));
    }

}
