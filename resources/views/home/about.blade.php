@extends('layouts.frontbase')
@section('title','About Us | '.$setting->title)
@section('desc',$setting->desc)
@section('keys',$setting->keys)
@section('icon',\Illuminate\Support\Facades\Storage::url($setting->icon))
@section('content')
<div class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2>About Us</h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">About Us</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-wrapper">

                            <div class="pp">
                                <h3><strong>Our Mission and History</strong></h3>
                                <p>{!!$setting->aboutus!!}</p>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        
@endsection