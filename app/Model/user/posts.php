<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Model\user\tags', 'post_tags', 'post_id', 'tag_id')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Model\user\categories', 'category_posts', 'post_id', 'category_id')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
