<?php

namespace App\Models;

use App\Models\Traits\ShowScope;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    use ShowScope;
    use DefaultDatetimeFormat;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_show' => 'boolean',
    ];

    protected $fillable = ['news_category_id', 'title', 'preview', 'content', 'is_show', 'image', 'admin_user_id'];

    public function newsCategory()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(Administrator::class, 'admin_user_id', 'id');
    }

    public function getShowForHome()
    {
        return $this->show()
            ->orderBy('priority', 'ASC')
            ->orderBy('updated_at', 'DESC')
            ->take(3);
    }

    public function getShowForFooter()
    {
        return $this->show()
            ->orderBy('priority', 'ASC')
            ->orderBy('updated_at', 'DESC')
            ->take(4);
    }

    public function getShowByCategory($categoryId)
    {
        return $this->show()
            ->where('news_category_id', $categoryId);
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
            ->where('news_category_id', $categoryId)
            ->where('id', '<>', $id)
            ->orderBy('priority', 'ASC')
            ->orderBy('updated_at', 'DESC')
            ->first();
    }

}
