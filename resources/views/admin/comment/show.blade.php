@extends('layouts.adminwindow')
@section('title','Show Comment & Review:'.$data->title)
@section('content')
    <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Comment & Review Messages</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Comment & Review Messages
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
                                                    <td> {{$data->id}} </td>
                                                </tr>
                                                <tr>
                                                    <th>Art</th>
                                                    <td> {{$data->art->title}}</td>
                                                </tr>
                                                <tr>
                                                    <th>User Name</th>
                                                    <td>{{$data->user->name}}</td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                <th style="width: 30px">Subject</th>
                                                    <td>{{$data->subject}} </td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                    <th>Comment</th>
                                                    <td> {{$data->review }}</td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                    <th>Rate</th>
                                                    <td>{{$data->rate}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status:</th>
                                                    <td>{{$data->status}}</td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                    <th>IP Number</th>
                                                    <td>{{$data->IP}}</td>
                                                </tr>
                                                    <th>Created Date:</th>
                                                    <td>{{$data->created_at}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Update Date:</th>
                                                    <td>{{$data->updated_at}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admin Note:</th>
                                                    <td>
                                                        <form role="form" action="{{route('admin.comment.update',['id'=>$data->id])}}" method="post">
                                                            @csrf   
                                                            <select name="status">
                                                                <option selected> {{$data->status}} </option>
                                                                <option>True</option>
                                                                <option>False</option>
                                                            </select>
                                                            <button type="submit" class="btn btn-primary ">Update Comment</button>
                                                        </form>    
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                            <a href="{{route('admin.comment.destroy',['id'=>$data->id])}}"><button type="button" class="btn btn-danger btn-fw" onclick="return confirm('Are you sure to delete this category?')">Delete</button> </a>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.container-fluid -->
    </div>
            <!-- /#page-wrapper -->
            
@endsection