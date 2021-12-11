<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected Product $product;

    public function __construct(Product $product)
    {
        parent::__construct();

        $this->product = $product;
    }

    public function getByCategory($categoryId)
    {
        return $this->product->getShowLimitByCategory($categoryId)->get();
    }

    public function getPagination()
    {
        return $this->product->getShowPagination();
    }

    public function getPaginationByCategory($categoryId)
    {
        return $this->product->getShowPaginationByCategory($categoryId);
    }

    public function getDetail($id)
    {
        return $this->product->getShowDetail($id);
    }

    public function getRelate($categoryId, $id)
    {
        return $this->product->getShowRelate($categoryId, $id);
    }

}
