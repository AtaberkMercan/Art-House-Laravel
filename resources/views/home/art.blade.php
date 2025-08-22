@extends('layouts.frontbase')

@section('title', $data->title)

@section('icon', \Illuminate\Support\Facades\Storage::url($setting->icon))

@section('content')
<div class="container-fluid bg-secondary py-5">
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">{{$data->title}}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent m-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Art detail page</li>
            </ol>
        </nav>
    </div>
</div>

<link href="{{asset('assets')}}/css/style.min1.css" rel="stylesheet">
<link href="{{asset('assets')}}/css/style1.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
@include('home.messages')
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-6 pb-5">
            <div id="image-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{\Illuminate\Support\Facades\Storage::url($data->image)}}" alt="First slide">
                    </div>
                    @foreach($images as $key => $rs)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{\Illuminate\Support\Facades\Storage::url($rs->img)}}" alt="Slide {{$key + 2}}">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#image-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#image-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">{{$data->title}}</h5>
                    <div class="rate-display">
                        @php
                        $average=$data->comment->average('rate')
                        @endphp
                        {{number_format($average,2)}}
                        <small class="fas fa-star @if ($average<1)  fa fa-star-o @endif"></small>
                        <small class="fas fa-star @if ($average<2)  fa fa-star-o @endif"></small>
                        <small class="fas fa-star @if ($average<3)  fa fa-star-o @endif"></small>
                        <small class="fas fa-star @if ($average<4)  fa fa-star-o @endif"></small>
                        <small class="fas fa-star @if ($average<5)  fa fa-star-o @endif"></small>
                        <small class="pt-1">({{$data->comment->count('id')}} Reviews)</small>
                    </div>
                    <p class="card-text">{{$data->description}}</p>
                    <a href="{{route('artuser',['id'=>$data->user->id])}}" class="btn btn-primaryy">Show {{$data->user->name}}'s Profile</a>
                    <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" target="_blank" href="https://www.facebook.com/">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" target="_blank" href="https://www.twitter.com/">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" target="_blank" href="https://www.instagram.com/">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5">
    <ul class="nav nav-tabs justify-content-center border-secondary mb-4" role="tablist">
        <li class="nav-item">
            <a class="nav-link " data-toggle="tab" href="#tab-pane-1">Detail</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab-pane-2">Video</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tab-pane-3">Reviews ({{$data->comment->count()}})</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade" id="tab-pane-1">
            <div class="container">
                <p class="lead">{!!$data->detail!!}</p>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-pane-2">
            <div class="container">
                <div class="embed-responsive embed-responsive-16by9">
                    <video class="embed-responsive-item" controls>
                        <source src="{{asset('upload')}}/{{$data->video}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show active" id="tab-pane-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        @foreach($reviews as $rs)
                        <div class="card-reviews">
                            <div class="card-reviews-body">
                                <h6 class="card-reviews-title">{{$rs->user->name}} - <small>{{$rs->created_at}}</small></h6>
                                <div class="text-primary">
                                    @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $rs->rate)
                                    <i class="fas fa-star"></i>
                                    @else
                                    <i class="far fa-star"></i>
                                    @endif
                                    @endfor
                                </div>
                                <p class="card-reviews-text">{{$rs->review}}</p>
                            </div>
                        </div>
                        @endforeach
                        {!! $reviews->links() !!}
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card-reviews">
                            <div class="card-reviews-body">
                                <h5 class="card-reviews-title">Leave a Review</h5>
                                <form action="{{route('storecomment')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="art_id" value="{{$data->id}}" />
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <textarea class="form-control" id="subject" name="subject" required rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="review">Review</label>
                                        <textarea class="form-control" id="review" name="review" required rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="rate">Rate</label>
                                        <div class="rate">
                                            <input type="radio" id="star5" name="rate" value="5" />
                                            <label for="star5" title="text"></label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text"></label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text"></label>
                                            <input type="radio" id="star2" name="rate" value="2" />
                                            <label for="star2" title="text"></label>
                                            <input type="radio" id="star1" name="rate" value="1" />
                                            <label for="star1" title="text"></label>
                                        </div>
                                    </div>
                                       @auth()
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                        @else
                                            <a href="/login" class="btn btn-primary px-3" >Please login for submit</a>
                                        @endauth
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
