<?php

namespace App\Repositories;

use App\Factories\BreadcrumbFactory;
use App\Repositories\Contracts\BreadcrumbRepositoryInterface;

class BreadcrumbRepository extends BaseRepository implements BreadcrumbRepositoryInterface
{
    public $breadcrumbs = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function getBreadcrumbFactory($name, $url)
    {
        return new BreadcrumbFactory($name, $url);
    }

    public function getBreadcrumbs()
    {
        return $this->breadcrumbs;
    }

    public function setBreadcrumbs($name, $url = null): BreadcrumbRepositoryInterface
    {
        $this->breadcrumbs[] = $this->getBreadcrumbFactory($name, $url);
        return $this;
    }
}
