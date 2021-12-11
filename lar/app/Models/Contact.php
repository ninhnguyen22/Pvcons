<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    use DefaultDatetimeFormat;

    protected $fillable = [
        'name', 'phone', 'mail', 'content'
    ];

    public function reply()
    {
        return $this->hasMany(ContactReplay::class);
    }
}
