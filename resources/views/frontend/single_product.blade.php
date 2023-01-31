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
                            <h1>details </h1>

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



  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          costa cafe
        </h2>
      </div>


      <div class="filters-content">
        <div class="row grid">
          <div class="col-sm-6 col-lg-12 all">
            <div class="box">
              <div>
                <div class="img-box">
                  <img style="width:250px" src="{{ asset('frontend/images/' . $products['image']) }}" alt="">
                </div>
                <div class="detail-box text-center">
                  <h5>
                    {{$products['name']}}
                  </h5>
                  <br>
                  <p>
                    {{$products['description']}}
                  </p>

                  <p>
                    {{$products['category']}} - 
                    {{$products['type']}}
                  </p>

                  <br>
                  <div class="options text-center">
                    @if ($products['sale_price'] != null)
                      $ {{$products['sale_price']}}
                    @else
                      $ {{$products['price']}} 
                    @endif
                    <form action="{{ route('add_to_cart') }}" method="post">
                      @csrf
                      <input type="hidden" name="id"          value="{{$products->id}}">
                      <input type="hidden" name="name"        value="{{$products->name}}">
                      <input type="hidden" name="image"       value="{{$products->image}}">
                      <input type="hidden" name="category"    value="{{$products->category}}">
                      <input type="hidden" name="type"        value="{{$products->type}}">
                      <input type="hidden" name="price"       value="{{$products->price}}">
                      <input type="hidden" name="sale_price"  value="{{$products->sale_price}}">
                      <input type="hidden" name="quantity"    value="1">


                    <button type="submit" style="background: none; border: none">

                    <a >
                      <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                        <g>
                          <g>
                            <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                          </g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                      </svg>
                    </a>

                  </button>

                </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
       
        </div>
      </div>

    </div>
  </section>

  <!-- end food section -->


@endsection