@extends('layouts.adminwindow')
@section('title','Art Image Gallery')
@section('content')
    
    <h3>{{$art->title}}</h3>
            <hr>
            <form  role="form" action="{{route('admin.image.store',['pid'=>$art->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title">
                    <div class="input-group col-xs-12">
                        <input type="file" class="form-control file-upload-info" name="image" placeholder="Upload Image">
                        <button type="submit" class="btn btn-primary ">Upload</button>
                    </div>

                </div>

            </form>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Art Image Gallery</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Image Gallery
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Id Number</th>
                                                    <th>Title</th>
                                                    <th>Image</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($images as $rs)
                                                 <tr>
                                                    <td>{{$rs->id}}</td>
                                                    <td>{{$rs->title}}</td>
                                                    <td>@if($rs->img)
                                                        <img src="{{\Illuminate\Support\Facades\Storage::url($rs->img)}}" style="height: 80px;width:80px" >
                                                        @endif
                                                    </td>
                                                    <td><a href="{{route('admin.image.destroy',['pid'=>$art->id,'id'=>$rs->id])}}"><button type="button" class="btn btn-danger btn-fw" onclick="return confirm('Are you sure to delete this category?')">Delete</button> </a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                            
                        </div>
                        <!-- /.col-lg-12 -->
                        
                    </div>
                </div>
                <!-- /.container-fluid -->
   
            <!-- /#page-wrapper -->
@endsection