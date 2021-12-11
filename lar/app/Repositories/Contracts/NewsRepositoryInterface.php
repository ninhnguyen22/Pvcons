<?php

namespace App\Repositories\Contracts;

interface NewsRepositoryInterface extends BaseRepositoryInterface
{
    public function getNewsCategories();

    public function getNewsPagination();

    public function getNewsPaginationByCategory($category);

    public function getNewsDetail($newsId);

    public function getShowRelate($categoryId, $newsId);

}
