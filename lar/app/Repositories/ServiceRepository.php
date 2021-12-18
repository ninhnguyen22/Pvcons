<?php

namespace App\Repositories;

use App\Models\Service;
use App\Repositories\Contracts\ServiceRepositoryInterface;

class ServiceRepository extends BaseRepository implements ServiceRepositoryInterface
{
    protected Service $service;

    public function __construct(Service $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function getServices()
    {
        return $this->service->getShowServices()->get();
    }

    public function getDetail($id)
    {
        return $this->service->getShow($id);
    }

}
