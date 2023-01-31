@extends('includes.index')
@section('content')
       <!-- Header -->
   <header id="hello">
    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="banner">


                    <div class="inner_banner">
                        <div class="banner_content">
                            <p>A double layer of sear-sizzled 100% pure beef mingled with special sauce on a sesame seed bun and topped with melty American cheese, crisp lettuce, minced onions and tangy pickles.</p>
                            <p>*Based on pre-cooked patty weight.</p>             
                        </div>
                        <div class="stamp">
                            <img src="images/stamp.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Container end -->
    <p class="caption">*Limited Time Only</p>
</header><!-- Header end -->


<section class="container mt-2 my-5 py-5">
    <div class="container mt-2 text-center" >
        
        <h3 class="text-center mt-5">thank you</h3>
        <h3 class="text-center mt-5">order_id : {{Session::get('order_id')}}</h3>
        <h4 style="color: blue; margin-top: 20px ;" class="text-center">your order is takn 30 min</h4>

    </div>

</section>

@endsection