<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPivot extends Model
{
    protected $guarded = [];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    }
}
