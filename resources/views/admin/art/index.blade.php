@extends('layouts.adminbase')
@section('title','Arts List')
@section('content')
    <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Arts List</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    List of Arts
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                            <thead>
                                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 136px;">ID</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 174px;">Category</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 159px;">Title</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 83px;">Image</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 83px;">Image Gallery</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 83px;">Status</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 83px;">Edit</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 83px;">Show</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 83px;">Delete</th></tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $rs)
                                            <tr class="gradeA odd" role="row">
                                                    <td class="sorting_1">{{$rs->id}}</td>
                                                    <td> {{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs->category,$rs->category->title)}}</td> 
                                                    <td>{{$rs->title}}</td>
                                                    <td class="center">
                                                        @if($rs->image)
                                                            <img src="{{Storage::url($rs->image)}}"  style="height: 80px;width:80px">
                                                        @endif
                                                    </td>
                                                    <td class="center">
                                                    <a 
                                                        href="{{route('admin.image.index',['pid'=>$rs->id])}}"
                                                        onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')">
                                                        <img src="{{asset('assets')}}/admin/images/3158176.png" style="height: 80px;width:80px">
                                                    </a>
                                                    </td>
                                                    <td class="center">{{$rs->status}}</td>
                                                    <td><a href="{{route('admin.art.edit',['id'=>$rs->id])}}"><button type="button" class="btn btn-success btn-fw">Edit</button> </a> </td>
                                                    <td><a href="{{route('admin.art.show',['id'=>$rs->id])}}"><button type="button" class="btn btn-primary btn-fw">Show</button></a></td>
                                                    <td><a href="{{route('admin.art.destroy',['id'=>$rs->id])}}"><button type="button" class="btn btn-danger btn-fw" onclick="return confirm('Are you sure to delete this Art?')">Delete</button> </a></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                    </div>
                                    <!-- /.table-responsive -->
                                   
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                            <a href="{{route('admin.art.create')}}"><button  class="btn btn-success btn-fw">Add Art</button></a>
                        </div>
                        <!-- /.col-lg-12 -->
                        
                    </div>
                </div>
                <!-- /.container-fluid -->
    </div>
            <!-- /#page-wrapper -->
@endsection