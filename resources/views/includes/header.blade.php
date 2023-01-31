
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>costa cofee</title>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}" />

        <!-- Animate -->
        <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
        <!-- Bootsnav -->
        <link rel="stylesheet" href="{{ asset('frontend/css/bootsnav.css') }}">
        <!-- Color style -->
        <link rel="stylesheet" href="{{ asset('frontend/css/color.css') }}">

        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" />

        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body data-spy="scroll" data-target="#navbar-menu" data-offset="100">

        <!-- Preloader --> 
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>
                    <div class="object" id="object_five"></div>
                    <div class="object" id="object_six"></div>
                    <div class="object" id="object_seven"></div>
                    <div class="object" id="object_eight"></div>
                    <div class="object" id="object_big"></div>
                </div>
            </div>
        </div>
        <!--End Preloader -->
        <!-- Navbar -->
        <nav class="navbar navbar-default bootsnav no-background navbar-fixed black">
            <div class="container">  

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                    </ul>
                </div>        
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('frontend/images/ggg.webp') }}" width="3" height="50" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->
            </div>   

            <!-- Start Side Menu -->
            <div class="side">
                <a href="" class="close-side"><i class="fa fa-times"></i></a>
                <div class="widget">
                    <h6 class="title">Our Menu</h6>
                    <ul class="link">
                        @foreach ($categorys as $category)

                        <li><a href="{{ route('category', ['id'=> $category->id]) }}">{{$category->name}}</a></li>
                            <hr>
                        @endforeach
                        
                       <li><a href="{{ route('all_product') }}">Our Menu</a></li>
                       <hr>
                       <li><a href="{{ route('about') }}">about</a></li>
                       <hr>
                       <li><a href="{{ route('cart') }}">Your Cart</a></li>
                       <hr>
                        <li><a href="{{ route('login') }}">dashboard</a></li>

                    </ul>
                </div>
            </div>
            <!-- End Side Menu -->
        </nav>