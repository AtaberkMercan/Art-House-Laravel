@extends('layouts.adminbase')
@section('title','Insert FAQ')
@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
@endsection
@section('content')
    <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Insert FAQ</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Insert Faq's
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form role="form" action="{{route('admin.faq.store')}}" method="post" enctype="multipart/form-data">
                                                @csrf                                               
                                                <div class="form-group">
                                                    <label for="title">Question</label>
                                                    <input type="text" name="question" class="form-control" id="question">
                                                </div>
                                                <div class="form-group">
                                                <label for="answer">Answer</label>
                                                    <textarea class="form-control" id="answer" name="answer">
                                                    </textarea>
                                                    <script>
                                                        ClassicEditor
                                                        .create(document.querySelector('#answer'))
                                                        .then(editor=>{console.log(editor);})
                                                        .catch(error=>{console.error(error);})
                                                    </script>
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleSelectGender">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option>True</option>
                                                        <option>False</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-success">Save</button>
                                                <button type="reset" class="btn btn-warning">Cancel</button>
                                            </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.container-fluid -->
    </div>
            <!-- /#page-wrapper -->
@endsection