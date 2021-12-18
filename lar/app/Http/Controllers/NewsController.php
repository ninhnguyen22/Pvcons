<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\BreadcrumbRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\NewsRepositoryInterface;
use Illuminate\Support\Str;

class NewsController extends BaseController
{
    public CategoryRepositoryInterface $categoryRepository;
    public NewsRepositoryInterface $newsRepository;

    public function __construct(
        BreadcrumbRepositoryInterface $breadcrumbRepository,
        CategoryRepositoryInterface $categoryRepository,
        NewsRepositoryInterface $newsRepository
    ) {
        parent::__construct();

        $this->breadcrumbRepository = $breadcrumbRepository;
        $this->categoryRepository = $categoryRepository;
        $this->newsRepository = $newsRepository;
    }

    public function all()
    {
        $category = $this->categoryRepository->getOne(5);
        if (!$category) {
            abort(404);
        }

        $this->categoryBreadcrumbs(['name' => 'Tin Tức', 'url' => '/tin-tuc']);

        $categories = $this->newsRepository->getNewsCategories();
        $products = $this->newsRepository->getNewsPagination();

        return view('news-category', compact('category', 'categories', 'products'));
    }

    public function category($categorySlug, $categoryId)
    {
        $category = $this->newsRepository->getCategoryDetail($categoryId);
        if (!$category) {
            abort(404);
        }

        $this->categoryBreadcrumbs([
            'name' => $category->name,
            'url' => route('news.category', ['categorySlug' => Str::slug($category->name), 'category' => $categoryId])
        ]);

        $categories = $this->newsRepository->getNewsCategories();
        $products = $this->newsRepository->getNewsPaginationByCategory($category->id);

        return view('news-category', compact('category', 'categories', 'products'));
    }

    public function detail($newsSlug, $newsId)
    {
        $product = $this->newsRepository->getNewsDetail($newsId);
        if (!$product) {
            abort(404);
        }
        $category = $product->newsCategory;
        $this->detailBreadcrumbs(
            ['name' => $category->name, 'url' => route('news.category', ['categorySlug' => Str::slug($category->name), 'category' => $category->id])],
            [
                'name' => $product->name,
                'url' => route('news.detail',
                    ['news' => $product->id, 'newsSlug' => Str::slug($product->name)])
            ]);

        $categories = $this->newsRepository->getNewsCategories();
        $productRelate = $this->newsRepository->getShowRelate($category->id, $newsId);

        return view('news-detail', compact('product', 'categories', 'category', 'productRelate'));
    }

}
