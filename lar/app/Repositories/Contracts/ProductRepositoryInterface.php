<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function getByCategory($categoryId);

    public function getPagination();

    public function getPaginationByCategory($categoryId);

    public function getDetail($id);

    public function getRelate($categoryId, $id);
}
