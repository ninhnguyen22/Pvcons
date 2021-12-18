<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\BreadcrumbRepositoryInterface;

class BaseController extends Controller
{
    public BreadcrumbRepositoryInterface $breadcrumbRepository;

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

}
