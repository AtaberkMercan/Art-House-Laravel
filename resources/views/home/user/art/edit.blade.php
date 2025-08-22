@extends('layouts.frontbase')

@section('title', $setting->title)
@section('desc', $setting->desc)
@section('keys', $setting->keys)
@section('icon', \Illuminate\Support\Facades\Storage::url($setting->icon))

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-user"></i> EDIT ARTS <small class="hidden-xs-down hidden-sm-down"> Everything About you: </small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Arts</li>
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
                <div class="page-content">
                    <div class="portfolio row">
                        <div class="blog-box">
                            <h4 class="card-title">Edit Art</h4>
                            <p class="card-description">Edit {{ $data->title }}</p>

                            <form role="form" action="{{ route('artt.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleSelectGender">Parent Category</label>
                                    <select class="form-control select2" name="category_id">
                                        @foreach($datalist as $rs)
                                            <option value="{{ $rs->id }}" {{ $rs->id == $data->category_id ? 'selected' : '' }}>
                                                {{ \App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $data->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail2">Keywords</label>
                                    <input type="text" class="form-control" name="keywords" value="{{ $data->keywords }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail3">Description</label>
                                    <input type="text" class="form-control" name="description" value="{{ $data->description }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Detail Info</label>
                                    <textarea class="form-control" id="detail" name="detail">{!! $data->detail !!}</textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#detail'))
                                            .then(editor => { console.log(editor); })
                                            .catch(error => { console.error(error); })
                                    </script>
                                </div>

                                <div class="form-group">
                                    <label for="exampleSelectGender">Status</label>
                                    <select class="form-control" name="status">
                                        <option {{ $data->status == 'True' ? 'selected' : '' }}>True</option>
                                        <option {{ $data->status == 'False' ? 'selected' : '' }}>False</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="custom-file-input-label" for="video"> Select Video</label>
                                    <input type="file" class="custom-file-input" id="video" name="video">
                                </div>

                                <div class="form-group">
                                        <label class="custom-file-input-label" for="image" >Select Image</label>
                                        <input type="file" class="custom-file-input" id="image"  name="image">
                                </div>


                                <button type="submit" class="btn btn-primary">Update Data</button>
                                <button class="btn btn-danger">Cancel</button>
                            </form>
                        </div><!-- end blog-box -->
                    </div><!-- end portfolio -->
                </div><!-- end page-content -->
                <hr class="invis">
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

@endsection
