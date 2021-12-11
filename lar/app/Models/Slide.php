<?php

namespace App\Models;

use App\Enums\SlideTypeEnum;
use App\Models\Traits\ShowScope;
use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
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

    public function getHomeCarousels()
    {
        return $this
            ->show()
            ->where('type', SlideTypeEnum::from('TOP')->value)
            ->orderBy('priority', 'ASC')->get();
    }

    public function getForAbout()
    {
        return $this
            ->show()
            ->where('type', SlideTypeEnum::from('ABOUT')->value)
            ->orderBy('priority', 'ASC')
            ->orderBy('updated_at', 'DESC')
            ->get();
    }

    public function getAboutLasted()
    {
        return $this
            ->show()
            ->where('type', SlideTypeEnum::from('ABOUT')->value)
            ->orderBy('priority', 'ASC')
            ->orderBy('updated_at', 'DESC')
            ->first();
    }

}
