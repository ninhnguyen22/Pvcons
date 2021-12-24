<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\BreadcrumbRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\FrameRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ProductController extends BaseController
{
    public CategoryRepositoryInterface $categoryRepository;
    public ProductRepositoryInterface $productRepository;
    public FrameRepositoryInterface $frameRepository;

    public function __construct(
        FrameRepositoryInterface $frameRepository,
        BreadcrumbRepositoryInterface $breadcrumbRepository,
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository
    ) {
        parent::__construct();

        $this->breadcrumbRepository = $breadcrumbRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->frameRepository = $frameRepository;
    }

    public function all()
    {
        $category = $this->categoryRepository->getOne(2);
        if (!$category) {
            abort(404);
        }

        /* Meta setting */
        $this->setMetaHead('Dự án PvCons', 'Tất cả dự án của PvCons', ['Dự án']);
        /* Breadcrumb */
        $this->categoryBreadcrumbs(['name' => 'Dự Án', 'url' => '/du-an']);

        $categories = $this->categoryRepository->getForProduct();
        $products = $this->productRepository->getPagination();

        return view('product-category', compact('category', 'categories', 'products'));
    }

    public function category($productCategory)
    {
        $category = $this->categoryRepository->getForProductByCode($productCategory);
        if (!$category) {
            abort(404);
        }

        /* Meta setting */
        $this->setMetaHead(
            'PvCons - danh mục ' . $category->name,
            'PvCons - danh mục dự án: ' . $category->name,
            ['Danh mục dự án', $category->name]
        );
        $this->categoryBreadcrumbs(['name' => $category->name, 'url' => route('product.category', [$category->url])]);

        $categories = $this->categoryRepository->getForProduct();
        $products = $this->productRepository->getPaginationByCategory($category->id);

        return view('product-category', compact('category', 'categories', 'products'));
    }

    public function detail($productSlug, $productId)
    {
        $product = $this->productRepository->getDetail($productId);
        if (!$product) {
            abort(404);
        }
        $category = $product->category;
        /* Meta setting */
        $this->setMetaHead(
            'PvCons -  ' . $product->name,
            'PvCons - dự án: '. $product->name,
            ['Dự án', $product->name],
            Storage::disk('admin')->url($product->image)
        );

        /* Breadcrumb */
        $this->detailBreadcrumbs(
            ['name' => $category->name, 'url' => route('product.category', [$category->url])],
            [
                'name' => $product->name,
                'url' => ''
            ]);

        $categories = $this->categoryRepository->getForProduct();
        $productRelate = $this->productRepository->getRelate($category->id, $productId);

        return view('product-detail', compact('product', 'categories', 'category', 'productRelate'));
    }


}
