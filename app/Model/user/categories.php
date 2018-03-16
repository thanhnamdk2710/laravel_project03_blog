<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Model\user\posts', 'category_posts', 'post_id', 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
