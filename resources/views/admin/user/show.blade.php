@extends('layouts.adminwindow')
@section('title','User Detail : '.$data->title)
@section('content')
    <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Detail User Data</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Detail User
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
                                                    <th>Name:</th>
                                                    <td>{{$data->name}}</td>
                                                </tr>
                                                <tr>
                                                <th style="width: 30px">Roles</th>
                                                    <td>
                                                            @foreach($data->roles as $role)
                                                                {{$role->name}}
                                                                    <a href="{{route('admin.user.destroyrole',['uid'=>$data->id,'rid'=>$role->id])}}"><button type="button" class="fa fa-times " onclick="return confirm('Are you sure to delete this role?')"></button> </a>
                                                            @endforeach 
                                                </td>
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
                                                    <th>Add Role:</th>
                                                    <td>
                                                        <form role="form" action="{{route('admin.user.addrole',['id'=>$data->id])}}" method="post">
                                                        @csrf
                                                            <select name="role_id">
                                                                @foreach($roles as $role)
                                                                    <option value="{{$role->id}}">{{$role->name}} </option>
                                                                @endforeach
                                                            </select>
                                                            <button type="submit" class="btn btn-primary ">Add Role</button>
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
                            <a href="{{route('admin.user.destroy',['id'=>$data->id])}}"><button type="button" class="btn btn-danger btn-fw" onclick="return confirm('Are you sure to delete this category?')">Delete</button> </a>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.container-fluid -->
    </div>
            <!-- /#page-wrapper -->
            
@endsection