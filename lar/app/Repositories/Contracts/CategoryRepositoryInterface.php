<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function getOne($id);

    public function getNested();

    public function getForProduct();

    public function getForProductByCode($code);
}
