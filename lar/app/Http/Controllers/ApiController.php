<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ApiController extends BaseController
{
    protected ProductRepositoryInterface $productRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        parent::__construct();

        $this->productRepository = $productRepository;
    }

    public function getProductByCategory($id)
    {
        $products = $this->productRepository->getByCategory($id);

        return view('api.product',
            compact('products')
        );
    }
}
