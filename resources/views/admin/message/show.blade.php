@extends('layouts.adminwindow')
@section('title','Show Message : '.$data->title)
@section('content')
    <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Detail Contact Messages</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Contact Messages
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
                                                    <th>Name & Surname:</th>
                                                    <td>{{$data->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone Number:</th>
                                                    <td>{{$data->phone}}</td>
                                                </tr>
                                                <tr>
                                                <th style="width: 30px">E-mail</th>
                                                    <td>{{$data->email}} </td>
                                                </tr>
                                                <tr>
                                                <th style="width: 30px">Subject</th>
                                                    <td>{{$data->subject}} </td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                    <th>Message</th>
                                                    <td>{{$data->message}}</td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                    <th>IP Number:</th>
                                                    <td>{{$data->ip}}</td>
                                                </tr>
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
                                                <tr>
                                                    <th>Admin Note:</th>
                                                    <td>
                                                        <form role="form" action="{{route('admin.message.update',['id'=>$data->id])}}" method="post">
                                                            @csrf   
                                                            <textarea  class="form-control" id="note" name="note">
                                                                {{$data->note}}
                                                            </textarea>
                                                            <button type="submit" class="btn btn-primary ">Update Note</button>
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
                            <a href="{{route('admin.message.destroy',['id'=>$data->id])}}"><button type="button" class="btn btn-danger btn-fw" onclick="return confirm('Are you sure to delete this category?')">Delete</button> </a>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.container-fluid -->
    </div>
            <!-- /#page-wrapper -->
            
@endsection