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
                    <h2><i class="fa fa-user"></i> USER Profile <small class="hidden-xs-down hidden-sm-down"> Everything About you: </small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
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
                                <div class="pitem item-w1 item-h1">
                                    <div class="blog-box">
                                        @include('profile.show')
                                    </div><!-- end blog-box -->
                                </div><!-- end col -->
                            </div><!-- end portfolio -->
                        </div><!-- end page-wrapper -->
                        <hr class="invis">
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

@endsection