@extends('layouts.adminbase')
@section('title','Settings')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <div id="page-wrapper">
        <form role="form" action="{{route('admin.setting.update')}}" method="post" enctype="multipart/form-data" class="forms-sample">
                <div class="container-fluid">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Settings</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Settings
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills">
                                        <li class="active"><a href="#general-pills" data-toggle="tab" aria-expanded="true">General</a>
                                        </li>
                                        <li class=""><a href="#server-pills" data-toggle="tab" aria-expanded="false">Smpt-Server</a>
                                        </li>
                                        <li class=""><a href="#social-pills" data-toggle="tab" aria-expanded="false">Social Media</a>
                                        </li>
                                        <li class=""><a href="#about-pills" data-toggle="tab" aria-expanded="false">About us</a>
                                        </li>
                                        <li class=""><a href="#contact-pills" data-toggle="tab" aria-expanded="false">Contact Page</a>
                                        </li>
                                        <li class=""><a href="#references-pills" data-toggle="tab" aria-expanded="false">References</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="general-pills">
                                            <h4>General Info</h4>
                                            <input type="hidden" name="id" value="{{$data->id}}" class="form-control">
                                            <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" value="{{$data->title}}"  class="form-control"  name="title" id="title">    
                                            </div>
                                            <div class="form-group">
                                                    <label>Keywords</label>
                                                    <input type="text" class="form-control"  id="keys" value="{{$data->keys}}" name="keys" >    
                                            </div>
                                            <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" class="form-control"  value="{{$data->desc}}" name="desc" id="desc" >    
                                            </div>
                                            <div class="form-group">
                                                    <label>Company</label>
                                                    <input type="text" class="form-control"  value="{{$data->company}}" name="company" id="company"  >    
                                            </div>
                                            <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control"  value="{{$data->adress}}" name="adress" id="adress"  >    
                                            </div>
                                            <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input type="text" class="form-control"  value="{{$data->phone}}" name="phone" id="phone"  >    
                                            </div>
                                            <div class="form-group">
                                                    <label>E-mail</label>
                                                    <input type="text" class="form-control"  value="{{$data->email}}" name="email" id="email" >    
                                            </div>
                                            <div class="form-group">
                                                    <label>Icon</label>
                                                    <input type="file" class="form-control" value="{{$data->icon}}"  name="icon" id="icon" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleSelectGender">Status</label>
                                                <select class="form-control" name="status" id="status" value="{{$data->status}}" >
                                                    <option>True</option>
                                                    <option>False</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="server-pills">
                                            <h4>Smtp-Server Info</h4>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Smtp-Server</label>
                                                <input type="text" class="form-control" name="smtpserver" id="smtpserver"  value="{{$data->smtpserver}}">
                                            </div>
                                            <div class="form-group">
                                            <label for="exampleInputEmail2">Smtp-Email</label>
                                            <input type="text" class="form-control" id="smtpemail" value="{{$data->smtpemail}}" name="smtpemail" >
                                        </div>
                                        <div class="form-group">
                                            <label for="ExampleInputPassword4">Smtp-Password</label>
                                            <input type="password" class="form-control" value="{{$data->smtppassword}}" name="smtppassword" id="smtppassword">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail4">Smtp-Port</label>
                                            <input type="number" class="form-control" value="{{$data->smtpport}}" name="smtpport" id="smtpport">
                                        </div>
                                        </div>
                                        <div class="tab-pane fade" id="social-pills">
                                            <h4>Social Media Info</h4>
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Fax</label>
                                            <input type="text" class="form-control" name="fax" id="fax"  value="{{$data->fax}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">Facebook</label>
                                            <input type="text" class="form-control" id="facebook" value="{{$data->facebook}}" name="facebook" >
                                        </div>
                                        <div class="form-group">
                                            <label for="ExampleInputPassword4">Twitter</label>
                                            <input type="text" class="form-control" value="{{$data->twitter}}" name="twitter" id="twitter">
                                        </div>
                                        <div class="form-group">
                                            <label for="ExampleInputPassword4">Instagram</label>
                                            <input type="text" class="form-control" value="{{$data->instagram}}" name="instagram" id="instagram" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail4">Youtube</label>
                                            <input type="text" class="form-control" value="{{$data->youtube}}" name="youtube" id="youtube" >
                                        </div>
                                        </div>
                                        <div class="tab-pane fade" id="about-pills">
                                            <h4>About Us Info</h4>
                                            <div class="form-group">
                                            <textarea class="form-control" id="aboutus" name="aboutus">
                                            {!!$data->aboutus!!}
                                            </textarea>
                                            <script>
                                                ClassicEditor
                                                    .create(document.querySelector('#aboutus'))
                                                    .then(editor=>{console.log(editor);})
                                                    .catch(error=>{console.error(error);})
                                            </script>
                                        </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact-pills">
                                            <h4>Contact Us Info</h4>
                                            <div class="form-group">
                                            <textarea class="form-control" id="contact" name="contact">
                                                {!!$data->contact!!}
                                           </textarea>
                                            <script>
                                                ClassicEditor
                                                        .create(document.querySelector('#contact'))
                                                    .then(editor=>{console.log(editor);})
                                                    .catch(error=>{console.error(error);})
                                            </script>
                                        </div>
                                        </div>
                                        <div class="tab-pane fade" id="references-pills">
                                            <h4>References Info</h4>
                                            <div class="form-group">
                                            <textarea class="form-control" id="references" name="references">
                                                {!!$data->references!!}
                                            </textarea>
                                            <script>
                                                ClassicEditor
                                                    .create(document.querySelector('#references'))
                                                    .then(editor=>{console.log(editor);})
                                                    .catch(error=>{console.error(error);})
                                            </script>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                            <button type="submit" class="btn btn-primary me-2">Update Setting</button>
                            <button class="btn btn-dark">Cancel</button>
                        </div>
                </div>
                <!-- /.container-fluid -->
            </form>   
    </div>
            <!-- /#page-wrapper -->
@endsection