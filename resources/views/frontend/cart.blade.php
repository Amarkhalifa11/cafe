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
                            <h1>FATTY BURGER</h1>

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










  <section class="cart container mt-2 my-3 py-5">
    <div class="container mt-2 text-center">
      <h4>Your Cart</h4>
       <hr class="mx-auto">
    </div>




    <table class="pt-5">
      <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
      </tr>

@if (Session::has('cart'))
    @foreach (Session::get('cart') as $product)
        
   
          <tr>
            <td>
              <div class="product-info">
                <img style="width: 100px; height: 75px;"
                src="{{ asset('frontend/images/' . $product['image']) }}">

            <div>
                <div>
                  <p>{{$product['name']}}</p>
                  <p>{{$product['category']}} - {{$product['type']}}</p>
                  <small><span>$</span>{{$product['price']}}</small>
                  <br>


                  <form method="post" action="{{ route('remove') }}"> 
                    @csrf
                    <input type="hidden" name="id" value="{{$product['id']}}">
                    <input type="submit" name="remove_btn" class="remove-btn" value="remove">
                  </form>


                </div>
              </div>
            </td>

            <td>
              <form method="post" action="{{ route('edit_quantity') }}">
               @csrf
                <input type="submit" value="+" class="edit-btn" name="add_one">

                <input type="hidden" name="id" value="{{$product['id']}}">
                <input type="" readonly name="quantity" value="{{$product['quantity']}}">

                <input type="submit" value="-" class="edit-btn" name="minus_one">
              </form>
            </td>

            <td>
              <span class="product-price">${{$product['price'] * $product['quantity'] }}</span>
            </td>
          </tr>


          @endforeach
          @endif

    </table>


    <div class="cart-total">
      <table>
        @if (Session::has('cart'))
            
        <tr>
          <td>Total</td>
             @if (Session::has('total'))
               <td>${{Session::get('total')}}</td>
             @endif
        </tr>
        @endif

      </table>
    </div>
    
    
    <div class="checkout-container">

@if (Session::has('total'))
@if (Session::get('total') != 0)
      <form method="get" action="{{ route('checkout') }}">
        @csrf
        <input type="submit" class="btn checkout-btn" value="Checkout" name="">
      </form>
@endif
@endif
    </div>





  </section>






@endsection