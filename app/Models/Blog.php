<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(BlogPivot::class, 'blog_id', 'id');
    }
}
