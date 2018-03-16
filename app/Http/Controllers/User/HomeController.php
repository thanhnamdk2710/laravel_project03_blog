<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\posts;
use App\Model\user\tags;
use App\Model\user\categories;

class HomeController extends Controller
{
    public function index()
    {
        $posts = posts::where('status', 1)->paginate(5);

        return view('user.blog', compact('posts'));
    }

    public function tag(tags $tag)
    {
        $posts = $tag->posts()->paginate(5);

        return view('user.blog', compact('posts'));
    }

    public function category(categories $category)
    {
        $posts = $category->posts()->paginate(5);

        return view('user.blog', compact('posts'));
    }
}
