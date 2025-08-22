
<!DOCTYPE html>
<html lang="en">
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>@yield("title")</title>
    <meta name="description" content=@yield("desc")>
    <meta name="keywords" content=@yield("keys")>
    <meta name="author" content="ATABERK MERCAN">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href=@yield("icon") type="image/x-icon" />
    <link rel="apple-touch-icon" href=@yield("icon")>
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets')}}/css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="{{asset('assets')}}/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('assets')}}/style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="{{asset('assets')}}/css/responsive.css" rel="stylesheet">
    
    <!-- Colors for this template -->
    <link href="{{asset('assets')}}/css/colors.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield("head")
</head>
    <body>
     @include('home.header')
     @yield('slider')
     @yield('content')
     @include('home.footer')

        <!-- Core JavaScript
        ================================================== -->
        <script src="{{asset('assets')}}/js/jquery.min.js"></script>
        <script src="{{asset('assets')}}/js/tether.min.js"></script>
        <script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
        <script src="{{asset('assets')}}/js/custom.js"></script>
    </body>
</html>