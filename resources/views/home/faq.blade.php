@extends('layouts.frontbase')
@section('title','FAQ | '.$setting->title)
@section('desc',$setting->desc)
@section('keys',$setting->keys)
@section('icon',\Illuminate\Support\Facades\Storage::url($setting->icon))
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
<div class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-bullhorn"></i>Frequently Asked Questions</h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">FAQ</li>
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
                            <h3><strong>GENERAL QUESTIONS</strong></h3>
                            @foreach($datalist as $rs)
                            <div clss="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapse{{$loop->iteration}}">
                                             <h3>{{$rs->question}}</h3>
                                        </a>
                                    </div>
                                    <div id="collapse{{$loop->iteration}}" class="collapse " data-parent="#accordion">
                                        <div class="card-body">
                                            <p>{!!$rs->answer!!}</p>
                                        </div>
                            </div>
                            @endforeach
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        
@endsection