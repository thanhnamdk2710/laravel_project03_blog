<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Model\user\posts', 'post_tags', 'post_id', 'tag_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
