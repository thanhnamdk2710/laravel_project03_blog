<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\posts;
use App\Model\user\tags;
use App\Model\user\categories;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = posts::all();

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = tags::all();

        $categories = categories::all();

        return view('admin.post.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required'
        ]);
        
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public');
        }


        $post = new posts;

        $post->image = $imageName;

        $post->title = $request->title;

        $post->subtitle = $request->subtitle;

        $post->slug = $request->slug;

        $post->body = $request->body;

        $post->status = $request->status;

        $post->save();

        $post->tags()->sync($request->tags);

        $post->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = posts::with('tags', 'categories')->where('id', $id)->first();

        $tags = tags::all();

        $categories = categories::all();

        return view('admin.post.edit', compact('post', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
        ]);

        $post = posts::find($id);

        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public');

            $post->image = $imageName;
        }

        $post->title = $request->title;

        $post->subtitle = $request->subtitle;

        $post->slug = $request->slug;

        $post->body = $request->body;

        $post->status = $request->status;

        $post->save();

        $post->tags()->sync($request->tags);

        $post->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        posts::where('id', $id)->delete();

        return redirect()->back();
    }
}
