<?php

namespace App\Repositories\Contracts;

interface ContactRepositoryInterface extends BaseRepositoryInterface
{
    public function getCompanyImg();

    public function saveContact($input);
}
