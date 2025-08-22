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
                    <h2><i class="fa fa-user"></i> SHOW ARTS <small class="hidden-xs-down hidden-sm-down"> Everything About you: </small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Show Arts</li>
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
                                    <h4 class="card-title">{{$data->title}}</h4>
                <p class="card-description">  <code>DETAILS</code>
                </p>
                <div class="table-responsive">
                    <td><a href="{{route('artt.edit',['id'=>$data->id])}}"><button type="button" class="btn btn-primary btn-fw">Edit</button></a></td>
                    <td><a href="{{route('artt.destroy',['id'=>$data->id])}}"><button type="button" class="btn btn-danger btn-fw" onclick="return confirm('Are you sure to delete this category?')">Delete</button> </a></td>
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 30px">Id</th>
                            <td> {{$data->id}} </td>
                        </tr>
                        <tr>
                            <th style="width: 30px">Category</th>
                            <td>
                                {{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($data->category,$data->category->title)}}

                            </td>
                        </tr>
                        <tr>
                            <th style="width: 30px">Title</th>
                            <td> {{$data->title}} </td>
                        </tr>
                        <tr>
                            <th style="width: 30px">Keywords</th>
                            <td> {{$data->keywords}} </td>
                        </tr>
                        <tr>
                            <th style="width: 30px">Description</th>
                            <td> {{$data->description}} </td>
                        </tr>
                        <tr>
                               <th>Video</th>
                                    <td>  <Video style="width: 700px"  controls="controls"> 
                                            <source  src="{{asset('upload')}}/{{$data->video}}"   type="video/mp4" >
                                        </video>
                                    </td>
                               </tr>
                   
                        <tr>
                            <th style="width: 30px">Image</th>
                            <td>@if($data->image)
                                    <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel owl-loaded owl-drag" >
                                        <div class="owl-stage-outer"><div class="owl-stage" ><div class="owl-item cloned" ><div class="item">
                                                        <img src="{{\Illuminate\Support\Facades\Storage::url($data->image)}}" style="height: 80px;width:80px">
                                    </div></div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 30px">Status</th>
                            <td> {{$data->status}} </td>
                        </tr>
                        <tr>
                            <th style="width: 30px">Created Date</th>
                            <td> {{$data->created_at}} </td>
                        </tr>
                        <tr>
                            <th style="width: 30px">Update Date</th>
                            <td> {{$data->updated_at}} </td>
                        </tr>
                        <tr>
                            <th style="width: 30px">Detail Info</th>
                            <td>{!!$data->detail!!}  </td>
                        </tr>
                    </table>
                                    </div><!-- end blog-box -->
                            </div><!-- end portfolio -->
                        </div><!-- end page-wrapper -->
                        <hr class="invis">
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

@endsection