@extends('layouts.adminbase')
@section('title','Show FAQ')
@section('content')
    <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Show FAQ's</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Show
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
                                                    <th>ID</th>
                                                    <td>{{$data->id}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Question</th>
                                                    <td>{{$data->question}}</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th>Asnwer</th>
                                                    <td>{!!$data->answer!!} </td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{{$data->status}}</td>
                                                </tr>
                                                <tr>
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
                            <a href="{{route('admin.faq.edit',['id'=>$data->id])}}"><button type="button" class="btn btn-primary btn-fw">Edit</button></a>
                            <a href="{{route('admin.faq.destroy',['id'=>$data->id])}}"><button type="button" class="btn btn-danger btn-fw" onclick="return confirm('Are you sure to delete this category?')">Delete</button> </a>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.container-fluid -->
    </div>
            <!-- /#page-wrapper -->
            
@endsection