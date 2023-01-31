@extends('inc_backend.index')
@section('content')
<h4 class="text-center">THE USER IS : {{Auth::User()->name}}</h4>
<hr>
<h1 class="text-center">ALL ORDERS ITEMS</h1>
<br>
<div class="col-lg-12">
    <div class="card card-default">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">order_id</th>
                        <th scope="col">product_id</th>
                        <th scope="col">product_name</th>
                        <th scope="col">product_image</th>
                        <th scope="col">product_category</th>
                        <th scope="col">product_type</th>
                        <th scope="col">product_quantity</th>
                        <th scope="col">product_price</th>
                        <th scope="col">product_date</th>
                        <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
                        @php
                            $i=1;
                        @endphp


                    @foreach ($Orderss_items as $order) 
                    <tr>
                        <td scope="row">{{$order->order_id}}</td>
                        <td>{{$order->product_id}}</td>
                        <td>{{$order->product_name}}</td>
                        <td><img src="{{ asset('frontend/images/' . $order->product_image) }}" width="50" height="50" alt=""></td>
                        <td>{{$order->product_category}}</td>
                        <td>{{$order->product_type}}</td>
                        <td>{{$order->product_quantity}}</td>
                        <td>{{$order->product_price}}</td>
                        <td>{{$order->product_date}}</td>
                        <td><a href="{{ route('all_orders_items.destroy', ['id'=>$order->id]) }}" class="btn btn-danger text-center">delete</a></td>
                    </tr>

                    @endforeach 

                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection