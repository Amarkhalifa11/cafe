@extends('includes.index')
@section('content')
            <!-- Header -->
            <header id="hello">
                <!-- Container -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="banner">
                                <h3>-introducing-</h3>
                                <h1>Costa Cofee</h1>
    
                                <div class="inner_banner">
                                    <div class="banner_content">
                                        <p>A double layer of sear-sizzled 100% pure beef mingled with special sauce on a sesame seed bun and topped with melty American cheese, crisp lettuce, minced onions and tangy pickles.</p>
                                        <p>*Based on pre-cooked patty weight.</p>							
                                    </div>
                                    <div class="stamp">
                                        <img src="{{ asset('frontend/images/stamp.png') }}" alt="" />
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div><!-- Container end -->
                <p class="caption">*Limited Time Only</p>
            </header><!-- Header end -->
    
            <!-- Block Content -->
            <section id="block">
                <div class="container">
    
                    <!-- First section -->
                    <div class="row">
    
    
                        
                        <div class="col-sm-8">
                            <div class="feature">
                                <div class="shack_burger">
                                    <div class="chicken">
                                        <img src="{{ asset('frontend/images/4.jpg') }}" alt="Chicken" />
                                    </div>
    
                                    <h2>Shack cofee </h2>
                                    <p>Black Angus beef patty topped with American cheese, tomato, lettuce, and “Shack Sauce,” served in a grilled potato bun</p>
                                </div>
                                <p class="caption">*Limited Time Only</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="signature">
                                <div class="shape">
                                    <span class="flaticon flaticon-burger"></span>
                                    <p>signature</p>
                                </div>
                                <div class="signature_content">
                                    <p>It used to be a Secret but not any more! Our tribute to the King is a Cheddar Beef Patty,</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- first section end -->
    
            
                    <!-- Third section -->
                    <!-- Carousel -->
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel" data-slide-to="1"></li>
                            <li data-target="#carousel" data-slide-to="2"></li>
                        </ol>
    
                   
                    <!-- Forth section -->
                    <div class="row forth_sec">
                        <div class="col-sm-4">
                            <div class="menu">
                                <div class="inner_content">
                                    <span class="flaticon flaticon-burger"></span>
                                    <h2 >
                                        <a href="{{ route('all_product') }}" style="color: white">menu</a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="drinks">
                                <div class="inner_content">
                                    <span class="flaticon flaticon-drink"></span>
                                    <h2 >
                                        <a href="{{ route('category', ['id'=> '1']) }}" style="color: white">drinks</a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="sides">
                                <div class="inner_content">
                                    <span class="flaticon flaticon-food"></span>
                                    <h2 >
                                        <a href="{{ route('category', ['id'=> '2']) }}" style="color: white">sides</a>
                                    </h2>

                                </div>
                            </div>
                        </div>
                    </div><!-- forth section end -->
                </div>
            </section><!-- Block Content end-->
    
            <!-- Lock -->
            <section id="lock">
                <h2>SERVING MORE THAN JUST BURGERS SINCE 1998</h2>
                <p>Check out our opening hours and location address below.</p>
            </section>
@endsection 