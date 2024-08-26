<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    protected $fillable = [
        'name',
    ];
    use HasFactory;
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'attribute_category');
    }
}
