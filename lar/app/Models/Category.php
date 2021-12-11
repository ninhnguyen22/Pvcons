<?php

namespace App\Models;

use App\Models\Traits\ShowScope;
use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
        return '/du-an/' . $this->url;
    }

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getParent()
    {
        return $this->where('parent_id', 0);
    }

    public function getChildByParent($parentId)
    {
        return $this->where('parent_id', $parentId);
    }

    public function getForProduct()
    {
        return $this->where('parent_id', 2)
            ->orderBy('priority', 'ASC')->get();
    }

    public function getShowParent()
    {
        return $this->show()
            ->where('parent_id', 0)
            ->orderBy('priority', 'ASC');
    }

    public function getShowNested()
    {
        return $this->getShowParent()
            ->with('child')
            ->get();
    }

    public function getShowForProduct()
    {
        return $this->show()->where('parent_id', 2)
            ->orderBy('priority', 'ASC')->get();
    }

    public function getShowForProductByCode($code)
    {
        return $this->show()
            ->where('parent_id', 2)
            ->where('url', $code)
            ->first();
    }
}
