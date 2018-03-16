@extends('admin/layouts/app') 

@section('headSection')

<link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">

@endsection

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Text Editors
            <small>Advanced form element</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li>
                <a href="#">Forms</a>
            </li>
            <li class="active">Editors</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Titles</h3>
                    </div>
                    <!-- /.box-header -->

                    @include('includes.message')
                    
                    <!-- form start -->
                    <form role="form" action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="box-body">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text" class="form-control" value="{{ $post->title }}" id="title" name="title" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <label for="subtitle">Post Sub Title</label>
                                    <input type="text" class="form-control" value="{{ $post->subtitle }}" id="subtitle" name="subtitle" placeholder="Sub Title">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Post Slug</label>
                                    <input type="text" class="form-control" value="{{ $post->slug }}" id="slug" name="slug" placeholder="Slug">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image">
                                </div>

                                <div class="form-group" style="margin-top:30px">
                                    <label>Select Tags</label>
                                    <select class="form-control select2" multiple="" 
                                    data-placeholder="Select a State" style="width: 100%;" 
                                    aria-hidden="true" name="tags[]">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                @foreach ($post->tags as $postTag)
                                                    @if ($postTag->id == $tag->id)
                                                        selected
                                                    @endif
                                                @endforeach
                                            >{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                    <label>Select Categories</label>
                                    <select class="form-control select2" multiple="" 
                                    data-placeholder="Select a State" style="width: 100%;" 
                                    aria-hidden="true" name="categories[]">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @foreach ($post->categories as $postCategory)
                                                    @if ($postCategory->id == $category->id)
                                                        selected
                                                    @endif
                                                @endforeach
                                            >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <!-- /.box -->
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Write Post Body Here
                                    <small>Simple and fast</small>
                                </h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                                <textarea id="editor1" name="body" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    {{ $post->body }}
                                </textarea>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="status" value="1" @if($post->status == 1) checked @endif> Publish
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                            <a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
                
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('footerSection')

<script src="{{ asset('admin/plugins/select2/select2.full.min.js')}}"></script>

<script src="//cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>

<script>
    $(document).ready(function(){
        //Initialize Select2 Elements
        $(".select2").select2();

        CKEDITOR.replace('editor1');

    })
</script>

@endsection