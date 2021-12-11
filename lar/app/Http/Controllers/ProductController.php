<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\BreadcrumbRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Str;

class ProductController extends BaseController
{
    public CategoryRepositoryInterface $categoryRepository;
    public ProductRepositoryInterface $productRepository;

    public function __construct(
        BreadcrumbRepositoryInterface $breadcrumbRepository,
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository
    ) {
        parent::__construct();

        $this->breadcrumbRepository = $breadcrumbRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function all()
    {
        $category = $this->categoryRepository->getOne(2);
        if (!$category) {
            abort(404);
        }

        $this->categoryBreadcrumbs(['name' => 'Dự Án', 'url' => '/du-an']);

        $categories = $this->categoryRepository->getForProduct();
        $products = $this->productRepository->getPagination();
        $categoryTitle = 'Danh Mục Dự Án';

        return view('product-category', compact('category', 'categories', 'products', 'categoryTitle'));
    }

    public function category($productCategory)
    {
        $category = $this->categoryRepository->getForProductByCode($productCategory);
        if (!$category) {
            abort(404);
        }

        $this->categoryBreadcrumbs(['name' => $category->name, 'url' => route('product.category', [$category->url])]);

        $categories = $this->categoryRepository->getForProduct();
        $products = $this->productRepository->getPaginationByCategory($category->id);
        $categoryTitle = 'Danh Mục Dự Án';

        return view('product-category', compact('category', 'categories', 'products', 'categoryTitle'));
    }

    public function detail($productSlug, $productId)
    {
        $product = $this->productRepository->getDetail($productId);
        if (!$product) {
            abort(404);
        }
        $category = $product->category;
        $this->detailBreadcrumbs(
            ['name' => $category->name, 'url' => route('product.category', [$category->url])],
            [
                'name' => $product->name,
                'url' => route('product.detail',
                    ['product' => $product->id, 'productSlug' => Str::slug($product->name)])
            ]);

        $categories = $this->categoryRepository->getForProduct();
        $productRelate = $this->productRepository->getRelate($category->id, $productId);
        $categoryTitle = 'Danh Mục Dự Án';

        return view('product-detail', compact('product', 'categories', 'category', 'productRelate', 'categoryTitle'));
    }


}
