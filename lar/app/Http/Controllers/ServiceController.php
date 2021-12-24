<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\BreadcrumbRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\FrameRepositoryInterface;
use App\Repositories\Contracts\ServiceRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ServiceController extends BaseController
{
    public CategoryRepositoryInterface $categoryRepository;
    public ServiceRepositoryInterface $serviceRepository;
    public FrameRepositoryInterface $frameRepository;

    public function __construct(
        FrameRepositoryInterface $frameRepository,
        BreadcrumbRepositoryInterface $breadcrumbRepository,
        CategoryRepositoryInterface $categoryRepository,
        ServiceRepositoryInterface $serviceRepository
    )
    {
        parent::__construct();

        $this->breadcrumbRepository = $breadcrumbRepository;
        $this->categoryRepository = $categoryRepository;
        $this->serviceRepository = $serviceRepository;
        $this->frameRepository = $frameRepository;
    }

    public function detail($serviceSlug, $serviceId)
    {
        $service = $this->serviceRepository->getDetail($serviceId);
        if (!$service) {
            abort(404);
        }
        $this->setMetaHead(
            'PvCons -  ' . $service->name,
            'PvCons - dịch vụ: '. $service->name,
            ['Dịch vụ', $service->name],
            Storage::disk('admin')->url($service->image)
        );

        $this->detailBreadcrumbs(
            ['name' => 'Dịch Vụ', 'url' => '/'],
            [
                'name' => $service->name,
                'url' => ''
            ]);


        return view('service-detail', compact('service'));
    }

}
