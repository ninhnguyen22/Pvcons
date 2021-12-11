<?php

namespace App\Models;

use App\Models\Traits\ShowScope;
use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientBenefit extends Model
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

    public function getShow()
    {
        return $this->show();
    }
}
