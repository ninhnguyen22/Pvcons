<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected Category $category;

    public function __construct(Category $category)
    {
        parent::__construct();

        $this->category = $category;
    }

    public function getOne($id)
    {
        return $this->category->show()->where('id', $id)->first();
    }

    public function getNested()
    {
        return $this->category->getShowNested();
    }

    public function getForProduct()
    {
        return $this->category->getShowForProduct();
    }

    public function getForProductByCode($code)
    {
        return $this->category->getShowForProductByCode($code);
    }
}
