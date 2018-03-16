<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\posts;

class PostController extends Controller
{
    public function post(posts $post)
    {
        return view('user.post', compact('post'));
    }
}
