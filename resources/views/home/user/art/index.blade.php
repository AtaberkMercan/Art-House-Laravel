@extends('layouts.frontbase')
@section('title',$setting->title)
@section('desc',$setting->desc)
@section('keys',$setting->keys)
@section('icon',\Illuminate\Support\Facades\Storage::url($setting->icon))
@section('content')
<div class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-paint-brush"></i> MY ARTS <small class="hidden-xs-down hidden-sm-down"> Everything About you: </small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">My Arts</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div>
<section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                              @include('home.user.usermenu')
                        </div><!-- end sidebar -->
                    </div><!-- end col -->

                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">

                            <hr class="invis">

                    <div class="portfolio row">
                    <div class="blog-box">
                        <table id="example1" class="table table-responsive ">
                    <thead>
                    <tr>
                        <th> Id </th>
                        <th> Category </th>
                        <th> Title </th>
                        <th> Image </th>
                        <th> Image Gallery</th>
                        <th> Show </th>
                        <th> Edit </th>
                        <th> Delete </th>
                    </tr>
                    </thead>
                    <tbody>
                    @include('home.messages')
                    @foreach($data as $rs)
                        <tr>
                            <td>{{$rs->id}}</td>
                            <td>{{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs->category,$rs->category->title)}}</td>
                            <td>{{$rs->title}}</td>
                            <td>    @if($rs->image)
                                        <img src="{{Storage::url($rs->image)}}"  style="height: 80px;width:80px">
                                    @endif
                            </td>
                            <td><a 
                                   href="{{route('image.index',['pid'=>$rs->id])}}"
                                    onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')">
                                    <img src="{{asset('assets')}}/admin/images/3158176.png" style="height: 80px;width:80px">
                               </a></td>
                            <td><a href="{{route('artt.edit',['id'=>$rs->id])}}"><button type="button" class="btn btn-success">Edit</button> </a> </td>
                            <td><a href="{{route('artt.show',['id'=>$rs->id])}}"><button type="button" class="btn btn-primary">Show</button></a></td>
                             <td><a href="{{route('artt.destroy',['id'=>$rs->id])}}"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure to delete this Art?')">Delete</button> </a></td>
                            </tbody>
                    @endforeach
                </table>
                                    </div><!-- end blog-box -->
                                    <a href="{{route('artt.create')}}"><button  class="btn btn-success btn-fw">Add Art</button></a>
                            </div><!-- end portfolio -->
                        </div><!-- end page-wrapper -->
                        <hr class="invis">
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

@endsection