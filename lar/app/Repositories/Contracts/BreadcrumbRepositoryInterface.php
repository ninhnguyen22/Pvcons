<?php

namespace App\Repositories\Contracts;

interface BreadcrumbRepositoryInterface extends BaseRepositoryInterface
{
    public function getBreadcrumbs();

    public function setBreadcrumbs($name, $url = null): BreadcrumbRepositoryInterface;
}
