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
                    <h2><i class="fa fa-comment-o"></i> USER REVİEWS <small class="hidden-xs-down hidden-sm-down"> Everything About you: </small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">User Reviews</li>
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
                                    <div class="col-lg-9 col-md-12">
                                            <table id="example1" class="table table-responsive">
                                                <thead>
                                                <tr>
                                                    <th> Id </th>
                                                    <th> Art </th>
                                                    <th> Subject </th>
                                                    <th> Review </th>
                                                    <th> Rate </th>
                                                    <th> Status </th>
                                                    <th> Date </th>
                                                    <th> Delete </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @include('home.messages')
                                                @foreach($datalist as $rs)
                                                    <tr>
                                                        <td>{{$rs->id}}</td>
                                                        <td> <a href="{{route('art',['id'=>$rs->art->id,'slug'=>$rs->art->slug])}}"target="_blank">
                                                                {{$rs->art->title}} </a>
                                                        </td>
                                                        <td>{{$rs->subject}}</td>
                                                        <td>{{$rs->review}}</td>
                                                        <td>{{$rs->rate}}</td>
                                                        <td>{{$rs->status}}</td>
                                                        <td>{{$rs->created_at}}</td>
                                                        <td><a href="{{route('userpanel.destroyreview',['id'=>$rs->id])}}"><button type="button" class="btn btn-danger btn-fw" onclick="return confirm('Are you sure to delete this Message?')">Delete</button> </a></td>
                                                    </tr>
                                                </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div><!-- end blog-box -->
                                
                            </div><!-- end portfolio -->
                        </div><!-- end page-wrapper -->
                        <hr class="invis">
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

@endsection