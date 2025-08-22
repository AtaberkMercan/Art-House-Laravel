<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title')</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{asset('assets')}}/admin/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('assets')}}/admin/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('assets')}}/admin/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{asset('assets')}}/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        @yield('head')
     </head>
        <body>
        <div id="wrapper">
            @include('admin.header')
            @include('admin.sidebar')
            @yield('content')
        </div>
        <!-- jQuery -->
        <script src="{{asset('assets')}}/admin/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('assets')}}/admin/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{asset('assets')}}/admin/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{asset('assets')}}/admin/js/startmin.js"></script>
        </body>
    </html>