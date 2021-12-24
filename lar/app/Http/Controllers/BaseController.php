<?php

namespace App\Http\Controllers;

use App\Factories\Head\HeadMetaGraphFactory;
use App\Repositories\Contracts\BreadcrumbRepositoryInterface;
use App\Repositories\Contracts\FrameRepositoryInterface;

class BaseController extends Controller
{
    public BreadcrumbRepositoryInterface $breadcrumbRepository;
    protected FrameRepositoryInterface $frameRepository;

    public function __construct()
    {
    }

    protected function categoryBreadcrumbs($category)
    {
        $this->breadcrumbRepository
            ->setBreadcrumbs('Trang Chủ', '/')
            ->setBreadcrumbs($category['name'], $category['url']);
    }

    protected function detailBreadcrumbs($category, $detail)
    {
        $this->breadcrumbRepository
            ->setBreadcrumbs('Trang Chủ', '/')
            ->setBreadcrumbs($category['name'], $category['url'])
            ->setBreadcrumbs($detail['name'], $detail['url']);
    }

    protected function setMetaHead($title, $description, $keywords = [], $image = null)
    {
        $this->frameRepository->setHeadTitle($title);
        $this->frameRepository->setHeadDescription($description);
        $this->frameRepository->setHeadKeywords($keywords);

        // Meta
        $headMetaGraphFactory = new HeadMetaGraphFactory();
        $headMetaGraphFactory->setOgTitle($title)
            ->setOgUrl(request()->url())
            ->setDescription($description)
            ->setOgDescription($description)
            ->setKeywords($keywords);
        if ($image) {
            $headMetaGraphFactory->setOgImage($image);
        }
        $this->frameRepository->setHeadMetaGraph($headMetaGraphFactory);
    }

}
