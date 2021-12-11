<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Nin\DataMapper\Traits\DataMapper;

class Post extends Model
{
    use HasFactory;
    use Searchable;
    use DataMapper;

    /**
     * The columns of the full text index
     */
    public $searchable = [
        'title',
        'description'
    ];

    protected $entity = PostEntity::class;


}
