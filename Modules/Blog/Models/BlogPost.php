<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'published_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
