@extends('layouts.adminbase')
@section('title','Edit Art : '.$data->title)
@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
@endsection
@section('content')
    <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Edit Art</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit: {{$data->title}}
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form role="form" action="{{route('admin.art.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Parent Category</label>
                                                    <select name="category_id" class="form-control">
                                        
                                                             @foreach($datalist as $rs)
                                                                <option value ="{{$rs->id}}" @if($rs->id==$data->category_id) selected="selected"@endif>{{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs,$rs->title)}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" value="{{$data->title}}" class="form-control" id="title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="keywords">Keywords</label>
                                                    <input type="text" name="keywords" value="{{$data->keywords}}" class="form-control" id="keywords">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input type="text" name="description" value="{{$data->description}}" class="form-control" id="description">
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <input type="file" id="image" name="image">
                                                </div>
                                                <div class="form-group">
                                                    <label for="video">Video</label>
                                                    <input type="file"  id="video"  name="video">
                                                </div>
                                                <div class="form-group">
                                                    <label for="detail">Code</label>
                                                    <textarea class="form-control" id="code" name="code">
                                                    {!! $data->code !!}
                                                    </textarea>
                                                    <script>
                                                        ClassicEditor
                                                                .create( document.querySelector( '#code' ) )
                                                                .then( editor => {
                                                                        console.log( editor );
                                                                } )
                                                                .catch( error => {
                                                                        console.error( error );
                                                                } );
                                                    </script>
                                                </div>
                                                <div class="form-group">
                                                    <label for="detail">Detail</label>
                                                    <textarea  class="form-control" id="detail" name="detail">
                                                      {!! $data->detail !!}
                                                    </textarea>
                                                    <script>
                                                        ClassicEditor
                                                                .create( document.querySelector( '#detail' ) )
                                                                .then( editor => {
                                                                        console.log( editor );
                                                                } )
                                                                .catch( error => {
                                                                        console.error( error );
                                                                } );
                                                    </script>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status">
                                                        <option selected>{{$data->status}}</option>
                                                        <option>True</option>
                                                        <option>False</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.container-fluid -->
    </div>
            <!-- /#page-wrapper -->
@endsection