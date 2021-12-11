<?php

namespace App\Repositories;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Product;
use App\Repositories\Contracts\NewsRepositoryInterface;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface
{
    protected NewsCategory $newsCategory;
    protected News $news;

    public function __construct(NewsCategory $newsCategory, News $news)
    {
        parent::__construct();

        $this->newsCategory = $newsCategory;
        $this->news = $news;
    }

    public function getCategoryDetail($categoryId)
    {
        return $this->newsCategory->getShowDetail($categoryId);
    }

    public function getNewsCategories()
    {
        return $this->newsCategory->getShow()->get();
    }

    public function getNewsPagination()
    {
        return $this->news->getShowPagination();
    }

    public function getNewsPaginationByCategory($category)
    {
        return $this->news->getShowPaginationByCategory($category);
    }

    public function getNewsDetail($newsId)
    {
        return $this->news->getShowDetail($newsId);
    }

    public function getShowRelate($categoryId, $newsId)
    {
        return $this->news->getShowRelate($categoryId, $newsId);
    }
}
