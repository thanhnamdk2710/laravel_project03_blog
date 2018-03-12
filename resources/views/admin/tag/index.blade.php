@extends('admin/layouts/app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}"> 
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
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tags</h3>

                <a href="{{ route('tag.create') }}" class="col-lg-offset-5 btn btn-success">Add New</a>

                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" type="button" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button class="btn btn-box-tool" type="button" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>

        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Tag Name</th>
                            <th>Slug</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->slug }}</td>
                                <td> 4</td>
                                <td>X</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>Tag Name</th>
                            <th>Slug</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('footerSection')

<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<script>
    $(function () {
        $("#example1").DataTable();
    });
</script>

@endsection