<?php

namespace App\Models;

use App\Models\Traits\ShowScope;
use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsCategory extends Model
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

    public function getProductUrlAttribute()
    {
        return route('news.category', ['categorySlug' => Str::slug($this->name), 'category' => $this->id]);
    }

    public function getShow()
    {
        return $this->show()->orderBy('priority', 'ASC');
    }

    public function getShowDetail($id)
    {
        return $this->show()
            ->where('id', $id)
            ->first();
    }
}
