@extends('layouts.frontbase')
@section('title','Contact Us | '.$setting->title)
@section('desc',$setting->desc)
@section('keys',$setting->keys)
@section('icon',\Illuminate\Support\Facades\Storage::url($setting->icon))
@section('content')
<div class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-envelope-o"></i>Contact Us</h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Contact Us</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>Who we are</h4>
                                    <p>At ArtHouse, our mission is to cultivate a global community that appreciates and supports the diverse spectrum of artistic expression. We strive to break down barriers and make art accessible to everyone, fostering an environment where creators feel empowered to share their unique perspectives.</p>
                                </div>

                                <div class="col-lg-6">
                                    <h4>How we help?</h4>
                                    <p>If you’d like to write for us, <a href="#">advertise with us</a> or just say hello, fill out the form below and we’ll get back to you as soon as possible.</p>
                                </div>
                            </div><!-- end row -->


                            <div class="row">
                                <div class="col-lg-12">
                                    <form  action="{{route('storemessage')}}" class="form-wrapper" method="post">
                                        @csrf
                                    <h4>Contact form</h4>
                                    @include('home.messages')
                                        <input type="text" name="name" class="form-control" placeholder="Your name">
                                        <input type="email" name="email" class="form-control" placeholder="Email address">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                                        <textarea class="form-control" name="message" placeholder="Your message" required="required"></textarea>
                                        <button type="submit" class="btn btn-primary">Send<i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
@endsection