@extends('layouts.frontbase')
@section('title',$setting->title)
@section('desc',$setting->desc)
@section('keys',$setting->keys)
@section('icon',\Illuminate\Support\Facades\Storage::url($setting->icon))
@section('slider')
   @include('home.slider')
@endsection
@section('content')
<div class="page-title wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-calendar"></i> Feed <small class="hidden-xs-down hidden-sm-down"> What's New? </small></h2>
                    </div><!-- end col -->                  
                </div><!-- end row -->
            </div><!-- end container -->
</div>
<section class="section">
            <div class="container">
            <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                        <div class="blog-grid-system">
                                <div class="row"  >
                                @foreach($artlist1 as $rs)
                                    <div class="col-md-4">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="{{route('art',['id'=>$rs->id])}}" title="">
                                                    <img src="{{Storage::url($rs->image)}}" style="height: 250px;" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta big-meta">
                                                <h4><a href="{{route('art',['id'=>$rs->id])}}" title="">{{$rs->title}}</a></h4>
                                                <p>{{$rs->description}}</p>
                                                <a href="{{route('categoryarts',['id'=>$rs->category->id,'slug'=>$rs->category->title])}}"title="">{{$rs->category->title}} /</a>
                                                <a  title="">
                                                        @php
                                                        $average=$rs->comment->average('rate')
                                                        @endphp
                                                        <i class="fa fa-star @if ($average<1)  fa fa-star-o @endif"></i>
                                                        <i class="fa fa-star @if ($average<2)  fa fa-star-o @endif"></i>
                                                        <i class="fa fa-star @if ($average<3)  fa fa-star-o @endif"></i>
                                                        <i class="fa fa-star @if ($average<4)  fa fa-star-o @endif"></i>
                                                        <i class="fa fa-star @if ($average<5)  fa fa-star-o @endif"></i> /
                                                 </a>
                                                <small><a href="{{route('artuser',['id'=>$rs->user->id])}}" title="">{{$rs->user->name}}</a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                    @endforeach
                                </div><!-- end row -->
                            </div>
                        </div><!-- end page-wrapper -->
                        
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Recent Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                    @foreach($artlist2 as $rs)
                                        <a href="{{route('art',['id'=>$rs->id])}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="{{Storage::url($rs->image)}}"  alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">{{$rs->title}}</h5>
                                                <small>{{$rs->created_at}}</small>
                                            </div>
                                        </a>
                                    @endforeach
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            

                            <div class="widget">
                                <h2 class="widget-title">Random Posts</h2>
                                <div class="instagram-wrapper clearfix">
                                @foreach($artlist3 as $rs)
                                    <a class="" href="{{route('art',['id'=>$rs->id])}}"><img src="{{Storage::url($rs->image)}}"  alt="" class="img-fluidd"></a>
                                @endforeach    
                                </div><!-- end Instagram wrapper -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div>
        </section>       
@endsection
