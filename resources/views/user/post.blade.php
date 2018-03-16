@extends('user/layouts/app')

@section('bg-img', Storage::disk('local')->url($post->image))

@section('title', $post->title)

@section('sub-heading', $post->subtitle)

@section('main-content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12&appId=2170439122985036&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <small>Creat at {{ $post->created_at->diffForHumans() }}</small>

                    @foreach ($post->categories as $category)
                        <small class="pull-right" style="margin-right: 10px">
                            <a href="{{ route('category', $category->slug ) }}">{{ $category->name }}</a>
                        </small>
                    @endforeach

                    {!! htmlspecialchars_decode($post->body) !!}

                    <h3>Tag Clouds</h3>

                    @foreach ($post->tags as $tag)
                        <a href="{{ route('tag', $tag->slug ) }}" class="pull-left" style="margin-right: 10px; border-radius:5px; border: 1px solid gray; padding: 5px">{{ $tag->name }}</a>
                    @endforeach

                    <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10"></div>
                </div>
            </div>
        </div>
    </article>

    <hr>
@endsection