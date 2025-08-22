@php
    $mainCategories = \App\Http\Controllers\HomeController::maincategorylist()
@endphp
    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="{{asset('assets')}}/images/loader.gif" alt="">
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">
        <div class="collapse top-search" id="collapseExample">
            <div class="card card-block">
                <div class="newsletter-widget text-center">
                    <form class="form-inline">
                        <input type="text" class="form-control" placeholder="What you are looking for?">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </form>
                </div><!-- end newsletter -->
            </div>
        </div><!-- end top-search -->


        <div class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <a href="{{route('home')}}"><img src="{{asset('assets')}}/images/ArtHouseLogo.png" alt=""></a>
                        </div><!-- end logo -->
                    </div>
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end header -->

        <header class="header">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link color-pink-hover" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item dropdown has-submenu">
    <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
    <ul class="dropdown-menu" aria-labelledby="dropdown02">
        @foreach($mainCategories as $rs)
        <li class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="javascript:void(0);" aria-expanded="false">{{$rs->title}}</a>
            <ul class="dropdown-menu">
                @if(count($rs->children))
                @include('home.categorytree',['children'=>$rs->children])
                @endif
            </ul>
        </li>
        @endforeach
    </ul>
</li>

<script>
    // Add touch event handling for mobile devices
    document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(function(element) {
        element.addEventListener('click', function(event) {
            var parentLi = this.parentNode;
            if (parentLi.classList.contains('show')) {
                parentLi.classList.remove('show');
            } else {
                // Close other open dropdowns
                document.querySelectorAll('.dropdown-submenu.show').forEach(function(openDropdown) {
                    openDropdown.classList.remove('show');
                });
                parentLi.classList.add('show');
            }
            event.stopPropagation(); // Prevent default anchor behavior
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        document.querySelectorAll('.dropdown-submenu.show').forEach(function(openDropdown) {
            openDropdown.classList.remove('show');
        });
    });
</script>


                            <li class="nav-item">
                                <a class="nav-link color-pink-hover" href="{{route('about')}}">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-red-hover" href="{{route('contact')}}">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-aqua-hover" href="{{route('references')}}">References</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="{{route('faq')}}">FAQ</a>
                            </li>  
                            @guest
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle color-yellow-hover" href="/loginuser" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle-o"></i> Login
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/loginuser">Login</a>
                                    <a class="dropdown-item" href="/registeruser"><i class="fa fa-user-plus-o"></i> Register</a>
                                </div>
                            </li>
                        @endguest
                            @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle color-yellow-hover" href="/loginuser" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle-o"></i> {{Auth::user()->name}}'s Profile
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('artuser',['id'=>Auth::user()->id])}}">My Profile</a>
                                    <a class="dropdown-item" href="{{route('userpanel.index')}}">My Account</a>
                                    <a class="dropdown-item" href="{{route('artt.index')}}">Add New Art</a>
                                    <a class="dropdown-item" href="/logoutuser">Logout</a>
                                </div>
                            </li>
                            @endauth
                          
                        </ul>
                    </div>
                </nav>
            </div><!-- end container -->
        </header><!-- end header -->