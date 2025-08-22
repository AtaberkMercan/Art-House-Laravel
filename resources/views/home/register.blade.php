@extends('layouts.frontbase')
@section('title','User Registration')
@section('content')
<div class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-user-circle-o"></i>User Registration</h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">User Registration</li>
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
                                @include('auth.register')
                            </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>       
@endsection