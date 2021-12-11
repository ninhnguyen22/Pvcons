<?php

namespace App\Models;

use App\Models\Traits\ShowScope;
use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use DefaultDatetimeFormat;
    use ShowScope;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_show' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getShowByCategory($categoryId)
    {
        return $this->show()
            ->where('category_id', $categoryId);
    }

    public function getShowLimitByCategory($categoryId)
    {
        return $this->getShowByCategory($categoryId)
            ->orderBy('priority', 'ASC')
            ->orderBy('updated_at', 'DESC')
            ->take(9);
    }

    public function getShowPagination()
    {
        return $this->show()
            ->orderBy('priority', 'ASC')
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);
    }

    public function getShowPaginationByCategory($categoryId)
    {
        return $this->getShowByCategory($categoryId)
            ->orderBy('priority', 'ASC')
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);
    }

    public function getShowDetail($id)
    {
        return $this->show()
            ->where('id', $id)
            ->first();
    }

    public function getShowRelate($categoryId, $id)
    {
        return $this->show()
            ->where('category_id', $categoryId)
            ->where('id', '<>', $id)
            ->orderBy('priority', 'ASC')
            ->orderBy('updated_at', 'DESC')
            ->first();
    }

}
