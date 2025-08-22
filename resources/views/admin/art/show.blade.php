@extends('layouts.adminbase')
@section('title','Show Art : '.$data->title)
@section('content')
    <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Show Art</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Show: {{$data->title}}
                                </div>
                                <div class="panel-body">
                                <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>ID:</th>
                                                    <td>{{$data->id}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Category</th>
                                                    <td>
                                                    {{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($data->category,$data->category->title)}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Title:</th>
                                                    <td>{{$data->title}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Keywords:</th>
                                                    <td>{{$data->keywords}}</td>
                                                </tr>
                                                <tr>
                                                <th style="width: 30px">Description</th>
                                                    <td>{{$data->description}} </td>
                                                </tr>
        
                                                <th>Video</th>
                                                    <td> <Video style="width: 700px"  controls="controls"> 
                                                            <source  src="{{asset('upload')}}/{{$data->video}}"   type="video/mp4" >
                                                        </video>
                                                     </td>
                                                </tr>
                                               
                                                
                                                <tr>
                                                    <th>Image:</th>
                                                    <td> @if($data->image)
                                                            <img src="{{Storage::url($data->image)}}"  style="height: 80px;width:80px">
                                                        @endif</td>
                                                </tr>
                                                <tr>
                                                    <th>Detail</th>
                                                    <td>{!! $data->detail !!}</td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                    <th>Status:</th>
                                                    <td>{{$data->status}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Created Date:</th>
                                                    <td>{{$data->created_at}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Update Date:</th>
                                                    <td>{{$data->updated_at}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                            <a href="{{route('admin.category.edit',['id'=>$data->id])}}"><button type="button" class="btn btn-primary btn-fw">Edit</button></a>
                            <a href="{{route('admin.category.destroy',['id'=>$data->id])}}"><button type="button" class="btn btn-danger btn-fw" onclick="return confirm('Are you sure to delete this category?')">Delete</button> </a>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.container-fluid -->
    </div>
            <!-- /#page-wrapper -->
            
@endsection